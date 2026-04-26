<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.page {
    max-width: 650px;
    margin: 30px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}

.title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 5px;
}

.subtitle {
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

label {
    font-weight: 600;
    font-size: 13px;
    display: block;
    margin-top: 12px;
}

input, select {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ddd;
    margin-top: 5px;
    font-size: 14px;
}

input:focus, select:focus {
    border-color: #4a90e2;
    outline: none;
}

.row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.btn-group {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 14px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
}

.btn-save {
    background: #f39c12;
    color: white;
}

.btn-save:hover {
    background: #d68910;
}

.btn-back {
    background: #6c757d;
    color: white;
}

.btn-back:hover {
    background: #5a6268;
}

.back-link {
    display: inline-block;
    margin-bottom: 12px;
    color: #4a90e2;
    text-decoration: none;
    font-size: 13px;
}
</style>

<div class="page">

<a href="<?= base_url('transaksi') ?>" class="back-link">
    ← Kembali
</a>

<div class="card">

    <div class="title">✏️ Edit Transaksi</div>
    <div class="subtitle">Perbarui data transaksi</div>

    <form action="<?= base_url('transaksi/update/' . $transaksi['id_transaksi']) ?>" method="post">

        <label>ID Peminjaman</label>
        <input type="text" name="id_peminjaman"
               value="<?= $transaksi['id_peminjaman'] ?>" readonly>

        <div class="row">
            <div>
                <label>Jenis</label>
                <input type="text" name="jenis"
                       value="<?= $transaksi['jenis'] ?>">
            </div>

            <div>
                <label>Jumlah</label>
                <input type="number" name="jumlah"
                       value="<?= $transaksi['jumlah'] ?>">
            </div>
        </div>

        <label>Status</label>
        <select name="status">
            <option value="pending" <?= $transaksi['status']=='pending'?'selected':'' ?>>Pending</option>
            <option value="berhasil" <?= $transaksi['status']=='berhasil'?'selected':'' ?>>Berhasil</option>
            <option value="gagal" <?= $transaksi['status']=='gagal'?'selected':'' ?>>Gagal</option>
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal"
               value="<?= $transaksi['tanggal'] ?>">

        <div class="btn-group">
            <button type="submit" class="btn btn-save">💾 Update</button>
            <a href="<?= base_url('transaksi') ?>" class="btn btn-back">⬅ Kembali</a>
        </div>

    </form>

</div>

</div>

<?= $this->endSection() ?>