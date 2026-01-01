<?php

namespace App\Libraries;

use App\Modules\Menu\Models\ModuleModel;
use App\Modules\Menu\Models\MenuModel;
use App\Modules\Auth\Models\UserRoleModel;
use App\Modules\Menu\Models\PermissionModel;

class MenuService
{
    protected $moduleModel;
    protected $menuModel;
    protected $userRoleModel;
    protected $permissionModel;

    public function __construct()
    {
        $this->moduleModel = new ModuleModel();
        $this->menuModel = new MenuModel();
        $this->userRoleModel = new UserRoleModel();
        $this->permissionModel = new PermissionModel();
    }

    /**
     * Get accessible modules for a given user
     */
    public function getModules($userId)
    {
        // 1. Get UserGroupID from user_roles
        $role = $this->userRoleModel->where('UID', $userId)->where('Active', 1)->first();
        
        $groupId = $role ? $role['UserGroupID'] : 0;

        // 2. Fetch all active modules
        $modules = $this->moduleModel->where('Active', 1)->orderBy('SortOrder', 'ASC')->findAll();

        $accessibleModules = [];

        foreach ($modules as $module) {
            if ($this->hasModuleAccess($module['ModuleID'], $groupId)) {
                $accessibleModules[] = $module;
            }
        }

        return $accessibleModules;
    }

    /**
     * Get side menu for a module
     */
    public function getSideMenus($moduleId, $userId)
    {
        $role = $this->userRoleModel->where('UID', $userId)->where('Active', 1)->first();
        $groupId = $role ? $role['UserGroupID'] : 0;

        // Fetch menus for this module
        $menus = $this->menuModel->where('ModuleID', $moduleId)->where('Active', 1)->orderBy('SortOrder', 'ASC')->findAll();
        
        $accessibleMenus = [];
        
        foreach ($menus as $menu) {
            if ($this->canViewMenu($menu['MenuID'], $groupId)) {
                $accessibleMenus[] = $menu;
            }
        }
        
        return $this->buildTree($accessibleMenus);
    }

    private function hasModuleAccess($moduleId, $groupId)
    {
        // If it's the "Home" module (ID 1 in seed), always allow
        if ($moduleId == 1) return true;

        $db = \Config\Database::connect();
        $builder = $db->table('user_access_permissions p');
        $builder->join('ui_menus m', 'p.MenuID = m.MenuID');
        $builder->where('m.ModuleID', $moduleId);
        $builder->where('p.UserGroupID', $groupId);
        $builder->where('p.CanView', 1);
        
        return $builder->countAllResults() > 0;
    }

    private function canViewMenu($menuId, $groupId)
    {
        $permission = $this->permissionModel
            ->where('UserGroupID', $groupId)
            ->where('MenuID', $menuId)
            ->first();

        return $permission && $permission['CanView'] == 1;
    }

    private function buildTree(array $menus, $parentId = null)
    {
        $branch = [];
        foreach ($menus as $menu) {
            if ($menu['ParentMenuID'] == $parentId) {
                $children = $this->buildTree($menus, $menu['MenuID']);
                if ($children) {
                    $menu['children'] = $children;
                }
                $branch[] = $menu;
            }
        }
        return $branch;
    }
}
