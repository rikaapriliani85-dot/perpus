<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 600px;
    margin: 40px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
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

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #3498db;
}

textarea {
    resize: vertical;
    min-height: 80px;
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

.btn-save {
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

        <div class="title">⭐ Tambah Ulasan</div>

        <form action="<?= base_url('ulasan/store') ?>" method="post">

            <div class="form-group">
                <label>Buku</label>
                <select name="id_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach ($buku as $b): ?>
                        <option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Anggota</label>
                <select name="id_anggota" required>
                    <option value="">-- Pilih Anggota --</option>
                    <?php foreach ($anggota as $a): ?>
                        <option value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Rating (1 - 5)</label>
                <input type="number" name="rating" min="1" max="5" required>
            </div>

            <div class="form-group">
                <label>Komentar</label>
                <textarea name="komentar" placeholder="Tulis ulasan..."></textarea>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </div>

            <div class="btn-group">
                <a href="<?= base_url('ulasan') ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>