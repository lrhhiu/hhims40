<!-- Left Menu (Side Navigation) -->
<div class="sidebar">
    <div class="sidebar-header">
        <h3><?= $moduleName ?></h3>
    </div>
    <ul class="menu-list">
        <?php foreach ($menus as $menu): ?>
            <li class="menu-item">
                <?php 
                    // Check for Children
                    $hasChildren = !empty($menu['children']);
                    $route = ($menu['MenuRoute'] == '#') ? 'javascript:void(0);' : site_url($menu['MenuRoute']);
                ?>
                <a href="<?= $route ?>" class="menu-link <?= $hasChildren ? 'has-submenu' : '' ?>">
                    <span class="menu-text"><?= $menu['MenuName'] ?></span>
                    <?php if ($hasChildren): ?>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    <?php endif; ?>
                </a>

                <?php if ($hasChildren): ?>
                    <ul class="submenu">
                        <?php foreach ($menu['children'] as $child): ?>
                            <li class="submenu-item">
                                <a href="<?= site_url($child['MenuRoute']) ?>" class="submenu-link">
                                    <?= $child['MenuName'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
