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
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #2c3e50;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

input, select {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input:focus, select:focus {
    border-color: #3498db;
    outline: none;
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

        <div class="title">📅 Tambah Reservasi</div>

        <form action="<?= base_url('reservasi/store') ?>" method="post">

            <div class="form-group">
                <label>Anggota</label>
                <select name="id_anggota" required>
                    <option value="">-- Pilih Anggota --</option>
                    <?php foreach ($anggota as $a): ?>
                        <option value="<?= $a['id_anggota'] ?>">
                            <?= esc($a['nama_anggota']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Buku</label>
                <select name="id_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach ($buku as $b): ?>
                        <option value="<?= $b['id_buku'] ?>">
                            <?= esc($b['judul']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Reservasi</label>
                <input type="date" name="tanggal_reservasi" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="menunggu">Menunggu</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <a href="<?= base_url('reservasi') ?>" class="btn-back">⬅ Kembali</a>

        </form>

    </div>
</div>

<?= $this->endSection() ?>