<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-form {
    max-width: 500px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    font-family: Arial;
}

h2 {
    margin-bottom: 20px;
    text-align: center;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
    outline: none;
}

input:focus {
    border-color: #2ecc71;
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
    text-align: center;
}

.btn-save {
    background: #2ecc71;
    color: white;
}

.btn-save:hover {
    background: #27ae60;
}

.btn-back {
    background: #6c757d;
    color: white;
}

.btn-back:hover {
    background: #5a6268;
}
</style>

<div class="container-form">

<h2>✍️ Tambah Penulis</h2>

<form action="<?= base_url('penulis/store') ?>" method="post">

    <label>Nama Penulis</label>
    <input type="text" name="nama_penulis" placeholder="Masukkan nama penulis">

    <div class="btn-group">
        <button type="submit" class="btn btn-save">💾 Simpan</button>
        <a href="<?= base_url('penulis') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>