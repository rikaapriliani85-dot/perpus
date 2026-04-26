<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 1000px;
    margin: 30px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.title {
    font-size: 20px;
    font-weight: bold;
}

.form-inline {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 15px;
}

input, select {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    padding: 8px 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-primary { background: #3498db; color: white; }
.btn-success { background: #2ecc71; color: white; }
.btn-warning { background: #f39c12; color: white; }
.btn-danger { background: #e74c3c; color: white; }
.btn-secondary { background: #7f8c8d; color: white; }

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th {
    background: #f5f5f5;
    padding: 10px;
    text-align: left;
}

.table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.table tr:hover {
    background: #fafafa;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    color: white;
}

.badge-admin { background: #e74c3c; }
.badge-petugas { background: #3498db; }
.badge-anggota { background: #2ecc71; }

img {
    border-radius: 6px;
}

.actions a {
    text-decoration: none;
    font-size: 12px;
    margin-right: 5px;
    padding: 5px 8px;
    border-radius: 5px;
    color: white;
}

.action-detail { background: #3498db; }
.action-edit { background: #f39c12; }
.action-wa { background: #2ecc71; }
.action-delete { background: #e74c3c; }

.empty {
    text-align: center;
    padding: 20px;
    color: #888;
}
</style>

<div class="container">
    <div class="card">

        <div class="header">
            <div class="title">👤 Data Users</div>
            <a href="<?= base_url('users/create') ?>" class="btn-success">+ Tambah</a>
        </div>

        <!-- FILTER -->
        <form method="get" class="form-inline">

            <input type="text" name="keyword"
                   placeholder="Cari nama..."
                   value="<?= $_GET['keyword'] ?? '' ?>">

            <select name="role">
                <option value="">Semua Role</option>
                <option value="admin" <?= (($_GET['role'] ?? '') == 'admin') ? 'selected' : '' ?>>Admin</option>
                <option value="petugas" <?= (($_GET['role'] ?? '') == 'petugas') ? 'selected' : '' ?>>Petugas</option>
                <option value="anggota" <?= (($_GET['role'] ?? '') == 'anggota') ? 'selected' : '' ?>>Anggota</option>
            </select>

            <button class="btn-primary">Cari</button>
            <a href="<?= base_url('users') ?>" class="btn-secondary">Reset</a>

            <a href="<?= base_url('users/print?' . http_build_query($_GET)) ?>" target="_blank" class="btn-warning">
                Print
            </a>

        </form>

        <!-- TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($users)): ?>
                <?php $no = 1; foreach ($users as $u): ?>
                <?php $id = $u['id_user'] ?? $u['id']; ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $u['nama'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['username'] ?></td>

                    <td>
                        <?php if($u['role'] == 'admin'): ?>
                            <span class="badge badge-admin">Admin</span>
                        <?php elseif($u['role'] == 'petugas'): ?>
                            <span class="badge badge-petugas">Petugas</span>
                        <?php else: ?>
                            <span class="badge badge-anggota">Anggota</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if (!empty($u['foto'])): ?>
                            <img src="<?= base_url('uploads/users/' . $u['foto']) ?>" width="45">
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>

                    <td class="actions">
                        <a href="<?= base_url('users/detail/' . $id) ?>" class="action-detail">Detail</a>
                        <a href="<?= base_url('users/edit/' . $id) ?>" class="action-edit">Edit</a>
                        <a href="<?= base_url('users/wa/' . $id) ?>" class="action-wa">WA</a>
                        <a href="<?= base_url('users/delete/' . $id) ?>"
                           class="action-delete"
                           onclick="return confirm('Hapus user ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>

                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="empty">Belum ada data user</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>