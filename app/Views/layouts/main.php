<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HHIMS 4.0 - <?= $this->renderSection('title') ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    
    <?= $this->renderSection('styles') ?>
</head>
<body>

    <div class="app-container">
        
        <!-- Top Navigation -->
        <?= view_cell('App\Modules\Menu\Cells\MenuCell::renderTopMenu') ?>
        
        <!-- Left Navigation -->
        <?= view_cell('App\Modules\Menu\Cells\MenuCell::renderLeftMenu') ?>
        
        <!-- Main Content Area -->
        <main class="main-content">
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>
        
    </div>

    <!-- Scripts -->
    <script>
        // Simple script to handle active class on click for demo purposes
        // Real app would rely on URL matching done in PHP
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function() {
                // If it has submenu, toggle it
                if (this.nextElementSibling && this.nextElementSibling.classList.contains('submenu')) {
                    // e.preventDefault();
                    this.nextElementSibling.style.display = 
                        this.nextElementSibling.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
