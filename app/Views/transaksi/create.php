<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-form {
    max-width: 600px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    font-family: Arial;
}

h3 {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 12px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

input:focus, select:focus {
    border-color: #3498db;
    outline: none;
}

.btn-group {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 15px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
}

.btn-save {
    background: #28a745;
    color: white;
}

.btn-save:hover {
    background: #218838;
}

.btn-back {
    background: #6c757d;
    color: white;
}

.btn-back:hover {
    background: #5a6268;
}

.link-back {
    display: inline-block;
    margin-bottom: 15px;
    text-decoration: none;
    color: #3498db;
}
</style>

<div class="container-form">

<h3>💰 Tambah Transaksi</h3>

<a href="<?= base_url('transaksi') ?>" class="link-back">
    ← Kembali
</a>

<form action="<?= base_url('transaksi/store') ?>" method="post">

    <label>ID Peminjaman</label>
    <select name="id_peminjaman" required>
        <option value="">-- Pilih Peminjaman --</option>
        <?php foreach ($peminjaman as $p): ?>
            <option value="<?= $p['id_peminjaman'] ?>">
                <?= $p['id_peminjaman'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Jenis</label>
    <input type="text" name="jenis" placeholder="Contoh: denda / pembayaran">

    <label>Jumlah</label>
    <input type="number" name="jumlah">

    <label>Status</label>
    <input type="text" name="status" placeholder="lunas / belum">

    <label>Tanggal</label>
    <input type="date" name="tanggal">

    <div class="btn-group">
        <button type="submit" class="btn btn-save">💾 Simpan</button>
        <a href="<?= base_url('transaksi') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>