<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 600px;
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

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 14px;
    font-weight: bold;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input:focus, select:focus {
    outline: none;
    border-color: #3498db;
}

.preview {
    margin-top: 10px;
}

.preview img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-update {
    background: #2ecc71;
    color: white;
}

.btn-back {
    background: #7f8c8d;
    color: white;
}
</style>

<div class="container">
    <div class="card">

        <div class="title">✏️ Edit User</div>

        <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $user['nama'] ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= $user['email'] ?>" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" required>
            </div>

            <div class="form-group">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role">
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="petugas" <?= $user['role'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                    <option value="anggota" <?= $user['role'] == 'anggota' ? 'selected' : '' ?>>Anggota</option>
                </select>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">

                <div class="preview">
                    <p style="font-size:13px; color:#666;">Foto sekarang:</p>

                    <?php if ($user['foto']): ?>
                        <img src="<?= base_url('uploads/users/' . $user['foto']) ?>">
                    <?php else: ?>
                        <span>-</span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="btn-group">
                <a href="<?= base_url('users') ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-update">Update</button>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>