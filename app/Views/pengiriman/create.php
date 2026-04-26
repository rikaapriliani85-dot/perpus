<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.page {
    max-width: 700px;
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
    background: #28a745;
    color: white;
}

.btn-save:hover {
    background: #1e7e34;
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

<a href="<?= base_url('pengiriman') ?>" class="back-link">
    ← Kembali
</a>

<div class="card">

    <div class="title">🚚 Tambah Pengiriman</div>
    <div class="subtitle">Isi data pengiriman dengan benar</div>

    <form action="<?= base_url('pengiriman/store') ?>" method="post">

        <label>Anggota</label>
        <select name="anggota_id" required>
            <option value="">Pilih Anggota</option>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['id_anggota'] ?>">
                    <?= $a['nama_anggota'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Buku</label>
        <select name="buku_id" required>
            <option value="">Pilih Buku</option>
            <?php foreach ($buku as $b): ?>
                <option value="<?= $b['id_buku'] ?>">
                    <?= $b['judul'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Masukkan alamat lengkap" required>

        <div class="row">
            <div>
                <label>Biaya</label>
                <input type="number" name="biaya" placeholder="0" required>
            </div>

            <div>
                <label>Status</label>
                <input type="text" name="status" placeholder="pending / dikirim">
            </div>
        </div>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Petugas</label>
        <select name="petugas_id" required>
            <option value="">Pilih Petugas</option>
            <?php foreach ($petugas as $p): ?>
                <option value="<?= $p['id_petugas'] ?>">
                    <?= $p['nama_petugas'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="btn-group">
            <button type="submit" class="btn btn-save">💾 Simpan</button>
            <a href="<?= base_url('pengiriman') ?>" class="btn btn-back">⬅ Batal</a>
        </div>

    </form>

</div>

</div>

<?= $this->endSection() ?>