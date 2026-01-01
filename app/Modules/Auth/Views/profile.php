<?= $this->extend('App\Views\layouts\main') ?>

<?= $this->section('title') ?>User Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card">
        <h1>Welcome, <?= esc($user['FirstName']) ?>!</h1>
        <h2>User Profile</h2>
        
        <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Name:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Title'] . ' ' . $user['FirstName'] . ' ' . $user['OtherName']) ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Username:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Username']) ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Email:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['EmailAddress']) ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">NIC:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['NIC'] ?? '') ?></td></tr> <!-- Added Null Coalesce check if column missing -->
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Date of Birth:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['DateOfBirth'] ?? '') ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Gender:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Gender'] ?? '') ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Designation:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Designation'] ?? '') ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Telephone:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Telephone'] ?? '') ?></td></tr>
            <tr><th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd;">Status:</th><td style="padding: 10px; border-bottom: 1px solid #ddd;"><?= esc($user['Status'] ?? 'Active') ?></td></tr>
        </table>
        
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-primary" style="margin-top:20px;">Logout</a>
    </div>
<?= $this->endSection() ?>