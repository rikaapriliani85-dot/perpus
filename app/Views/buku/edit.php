<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-form {
    max-width: 800px;
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

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 8px;
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
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-save {
    background: #28a745;
    color: white;
}

.btn-back {
    background: #6c757d;
    color: white;
}

.preview {
    margin-top: 10px;
}

.preview img {
    width: 100px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
</style>

<div class="container-form">

<h3>✏️ Edit Buku</h3>

<form method="post"
      action="<?= base_url('buku/update/' . $buku['id_buku']) ?>"
      enctype="multipart/form-data">

    <!-- JUDUL -->
    <label>Judul</label>
    <input type="text" name="judul" value="<?= esc($buku['judul']) ?>">

    <!-- KATEGORI -->
    <label>Kategori</label>
    <select name="id_kategori">
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori'] ?>"
                <?= $buku['id_kategori'] == $k['id_kategori'] ? 'selected' : '' ?>>
                <?= $k['nama_kategori'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- PENULIS -->
    <label>Penulis</label>
    <select name="id_penulis">
        <?php foreach ($penulis as $p): ?>
            <option value="<?= $p['id_penulis'] ?>"
                <?= $buku['id_penulis'] == $p['id_penulis'] ? 'selected' : '' ?>>
                <?= $p['nama_penulis'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- PENERBIT -->
    <label>Penerbit</label>
    <select name="id_penerbit">
        <?php foreach ($penerbit as $p): ?>
            <option value="<?= $p['id_penerbit'] ?>"
                <?= $buku['id_penerbit'] == $p['id_penerbit'] ? 'selected' : '' ?>>
                <?= $p['nama_penerbit'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- RAK -->
    <label>Rak</label>
    <select name="id_rak">
        <?php foreach ($rak as $r): ?>
            <option value="<?= $r['id_rak'] ?>"
                <?= $buku['id_rak'] == $r['id_rak'] ? 'selected' : '' ?>>
                <?= $r['nama_rak'] ?> - <?= $r['lokasi'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- TAHUN + STOK -->
    <div class="row">

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="<?= esc($buku['tahun_terbit']) ?>">
        </div>

        <div>
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?= esc($buku['jumlah']) ?>">
        </div>

    </div>

    <!-- TERSEDIA + STOK -->
    <div class="row">

        <div>
            <label>Tersedia</label>
            <input type="number" name="tersedia" value="<?= esc($buku['tersedia']) ?>">
        </div>

        <div>
            <label>Stok</label>
            <input type="number" name="stok" value="<?= esc($buku['stok'] ?? 0) ?>">
        </div>

    </div>

    <!-- COVER -->
    <label>Cover</label>
    <input type="file" name="cover">

    <div class="preview">
        <?php if (!empty($buku['cover'])): ?>
            <img src="<?= base_url('uploads/buku/' . $buku['cover']) ?>">
        <?php else: ?>
            <img src="<?= base_url('img/default.jpg') ?>">
        <?php endif; ?>
    </div>

    <!-- BUTTON -->
    <div class="btn-group">
        <button type="submit" class="btn btn-save">💾 Update</button>
        <a href="<?= base_url('buku') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>