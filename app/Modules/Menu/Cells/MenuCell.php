<?php

namespace App\Modules\Menu\Cells;

use App\Libraries\MenuService;

class MenuCell
{
    protected $menuService;
    protected $uid;

    public function __construct()
    {
        $this->menuService = new MenuService();
        // Assuming session is available globally. 
        // Logic to get current user ID. 
        // In real app, might inject User or get from Session service.
        $this->uid = session()->get('uid'); 
    }

    /**
     * Render the Top Navigation Bar (Modules)
     */
    public function renderTopMenu()
    {
        if (!$this->uid) return '';

        $modules = $this->menuService->getModules($this->uid);
        
        // Determine active module from URL or Session
        // For now, let's assume valid module ID logic or default
        // Simple heuristic: Segment 1 of URI matches ModuleName (normalized) 
        // Or we can rely on Session 'active_module_id' if we set it on click.
        
        $currentModule = $this->detectActiveModule($modules);

        return view('App\Modules\Menu\Views\top_menu', [
            'modules' => $modules,
            'activeModuleId' => $currentModule ? $currentModule['ModuleID'] : null
        ]);
    }

    /**
     * Render the Left Navigation Bar (Menus)
     */
    public function renderLeftMenu()
    {
        if (!$this->uid) return '';

        // We need to know which module is active to show the correct side menu
        // Re-use detection logic
        $modules = $this->menuService->getModules($this->uid);
        $currentModule = $this->detectActiveModule($modules);

        if (!$currentModule) return '';

        $menus = $this->menuService->getSideMenus($currentModule['ModuleID'], $this->uid);

        return view('App\Modules\Menu\Views\left_menu', [
            'menus' => $menus,
            'moduleName' => $currentModule['ModuleName']
        ]);
    }

    private function detectActiveModule($modules)
    {
        // Simple detection based on URL
        $uri = service('uri');
        $segment = $uri->getSegment(1); // e.g. 'admission', 'clinic'

        foreach ($modules as $module) {
            // Check if ModuleName matches segment (case insensitive)
            // e.g. "Admissions" -> "admission" (simple check)
            // Or cleaner: Add a 'ModuleSlug' column to DB? 
            // For now, simple strtolower comparison or partial match
            // "Admissions" vs "admission" -> contains?
            
            if (stripos($module['ModuleName'], $segment) !== false) {
                return $module;
            }
            
            // Fallback for "Home"
            if ($segment == 'home' && $module['ModuleName'] == 'Home') {
                return $module;
            }
        }
        
        // Default to Home or First Module
        return $modules[0] ?? null;
    }
}
