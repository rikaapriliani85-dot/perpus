<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-box {
    max-width: 700px;
    margin: 30px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.title {
    margin-bottom: 20px;
    color: #2c3e50;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.btn {
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-save {
    background: #27ae60;
    color: white;
}

.btn-save:hover {
    background: #219150;
}

.btn-back {
    background: #95a5a6;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 6px;
    margin-left: 10px;
}

.btn-back:hover {
    background: #7f8c8d;
}
</style>

<div class="container-box">
    <div class="card">

        <h3 class="title">➕ Tambah Penarikan</h3>

        <form action="<?= base_url('penarikan/store') ?>" method="post">

            <div class="form-group">
                <label>ID Peminjaman</label>
                <select name="id_peminjaman" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($peminjaman as $p): ?>
                        <option value="<?= $p['id_peminjaman'] ?>">
                            <?= $p['id_peminjaman'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukkan alamat">
            </div>

            <div class="form-group">
                <label>Biaya</label>
                <input type="number" name="biaya" placeholder="Masukkan biaya">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Ambil</label>
                <input type="date" name="tanggal_ambil">
            </div>

            <div class="form-group">
                <label>Petugas</label>
                <select name="petugas_id">
                    <option value="">-- Pilih Petugas --</option>
                    <?php foreach ($petugas as $pt): ?>
                        <option value="<?= $pt['id_petugas'] ?>">
                            <?= $pt['nama_petugas'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <a href="<?= base_url('penarikan') ?>" class="btn-back">⬅ Kembali</a>

        </form>

    </div>
</div>

<?= $this->endSection() ?>