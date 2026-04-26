<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-form {
    max-width: 750px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    font-family: Arial;
}

h3 {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 10px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

.row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.btn-group {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 8px;
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
</style>

<div class="container-form">

<h3>📚 Tambah Buku</h3>

<form method="post" action="<?= base_url('buku/store') ?>" enctype="multipart/form-data">

    <!-- JUDUL + ISBN -->
    <div class="row">
        <div>
            <label>Judul</label>
            <input type="text" name="judul" required>
        </div>

        <div>
            <label>ISBN</label>
            <input type="text" name="isbn">
        </div>
    </div>

    <!-- KATEGORI -->
    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori'] ?>">
                <?= $k['nama_kategori'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- PENULIS -->
    <label>Penulis</label>
    <select name="id_penulis" required>
        <option value="">Pilih Penulis</option>
        <?php foreach ($penulis as $p): ?>
            <option value="<?= $p['id_penulis'] ?>">
                <?= $p['nama_penulis'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- PENERBIT -->
    <label>Penerbit</label>
    <select name="id_penerbit" required>
        <option value="">Pilih Penerbit</option>
        <?php foreach ($penerbit as $p): ?>
            <option value="<?= $p['id_penerbit'] ?>">
                <?= $p['nama_penerbit'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- RAK -->
    <label>Rak</label>
    <select name="id_rak" required>
        <option value="">Pilih Rak</option>
        <?php foreach ($rak as $r): ?>
            <option value="<?= $r['id_rak'] ?>">
                <?= $r['nama_rak'] ?> - <?= $r['lokasi'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- TAHUN + STOK -->
    <div class="row">
        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit">
        </div>

        <div>
            <label>Jumlah (Stok)</label>
            <input type="number" name="jumlah">
        </div>
    </div>

    <!-- TERSEDIA -->
    <label>Tersedia</label>
    <input type="number" name="tersedia">

    <!-- DESKRIPSI -->
    <label>Deskripsi</label>
    <textarea name="deskripsi"></textarea>

    <!-- COVER -->
    <label>Cover Buku</label>
    <input type="file" name="cover">

    <!-- BUTTON -->
    <div class="btn-group">
        <button type="submit" class="btn btn-save">💾 Simpan</button>
        <a href="<?= base_url('buku') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>