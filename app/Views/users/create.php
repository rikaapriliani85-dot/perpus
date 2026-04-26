<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 500px;
    margin: 40px auto;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    font-family: Arial;
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

.btn-submit {
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

        <div class="title">➕ Tambah Users</div>

        <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="anggota">Anggota</option>
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>

            <div class="btn-group">
                <a href="<?= base_url('users') ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>