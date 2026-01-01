<?= $this->extend('App\Views\layouts\main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <h2>Welcome to HHIMS 4.0</h2>
    <p>This is the main dashboard. Select a module from the top menu to get started.</p>
</div>

<div class="row" style="display: flex; gap: 20px;">
    <div class="card" style="flex: 1;">
        <h3>Module Status</h3>
        <p>Admissions: Active</p>
        <p>Clinic: Active</p>
        <p>Pharmacy: Active</p>
    </div>
    
    <div class="card" style="flex: 1;">
        <h3>Recent Activity</h3>
        <p>No recent activity.</p>
    </div>
</div>
<?= $this->endSection() ?>
