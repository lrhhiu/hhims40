<!-- Top Menu (Modules) -->
<nav class="top-nav">
    <div class="logo-area">
        <span class="logo-text">HHIMS 4.0</span>
    </div>
    <ul class="module-list">
        <?php foreach ($modules as $module): ?>
            <?php 
                $isActive = ($module['ModuleID'] == $activeModuleId) ? 'active' : '';
                // Generate URL - Assuming Module Name maps to a route prefix or specific landing
                // For "Home", route is /home. For "Admissions", maybe /admission?
                // We might need a 'ModuleRoute' in DB later. For now, lower case name.
                $route = strtolower($module['ModuleName']);
                if ($route == 'admissions') $route = 'admission'; // simple fix for plural
            ?>
            <li class="module-item <?= $isActive ?>">
                <a href="<?= site_url($route) ?>" class="module-link" title="<?= $module['ModuleName'] ?>">
                    <i class="fas <?= $module['ModuleIcon'] ?>"></i>
                    <span class="module-name"><?= $module['ModuleName'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="user-profile">
        <!-- User Dropdown could go here -->
        <a href="<?= site_url('auth/logout') ?>" class="logout-btn"><i class="fas fa-sign-out-alt"></i></a>
    </div>
</nav>
