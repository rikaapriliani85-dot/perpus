<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 700px;
    margin: 40px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

.profile {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}

.profile img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.info table {
    width: 100%;
}

.info td {
    padding: 8px 0;
    font-size: 14px;
}

.label {
    font-weight: bold;
    width: 120px;
    color: #555;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    color: white;
    font-size: 12px;
}

.admin { background: #e74c3c; }
.petugas { background: #3498db; }
.anggota { background: #2ecc71; }

.actions {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    color: white;
}

.btn-back { background: #7f8c8d; }
.btn-edit { background: #f39c12; }
</style>

<div class="container">
    <div class="card">

        <div class="title">👤 Detail User</div>

        <!-- PROFILE -->
        <div class="profile">
            <?php if ($user['foto']): ?>
                <img src="<?= base_url('uploads/users/' . $user['foto']) ?>">
            <?php else: ?>
                <img src="https://via.placeholder.com/100">
            <?php endif; ?>

            <div>
                <h4><?= $user['nama'] ?></h4>
                <span class="badge <?= $user['role'] ?>">
                    <?= ucfirst($user['role']) ?>
                </span>
            </div>
        </div>

        <!-- INFO -->
        <div class="info">
            <table>
                <tr>
                    <td class="label">Email</td>
                    <td><?= $user['email'] ?></td>
                </tr>
                <tr>
                    <td class="label">Username</td>
                    <td><?= $user['username'] ?></td>
                </tr>
                <tr>
                    <td class="label">Password</td>
                    <td>***</td>
                </tr>
            </table>
        </div>

        <!-- ACTION -->
        <div class="actions">
            <a href="<?= base_url('users') ?>" class="btn btn-back">Kembali</a>

            <?php if (session()->get('role') == 'admin') : ?>
                <a href="<?= base_url('users/edit/' . $user['id']) ?>" class="btn btn-edit">Edit</a>
            <?php endif; ?>
        </div>

    </div>
</div>

<?= $this->endSection() ?>