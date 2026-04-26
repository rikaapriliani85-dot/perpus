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

h2 {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 8px;
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
</style>

<div class="container-form">

<h2>📚 Tambah Penerbit</h2>

<form action="<?= base_url('penerbit/store') ?>" method="post">

    <label>Nama Penerbit</label>
    <input type="text" name="nama_penerbit" placeholder="Masukkan nama penerbit">

    <label>Alamat</label>
    <input type="text" name="alamat" placeholder="Masukkan alamat">

    <div class="btn-group">
        <button type="submit" class="btn btn-save">💾 Simpan</button>
        <a href="<?= base_url('penerbit') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>