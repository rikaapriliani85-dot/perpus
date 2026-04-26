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
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    font-size: 14px;
}

input, select {
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.btn {
    padding: 10px 15px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.btn-save {
    background: #27ae60;
    color: white;
}

.btn-back {
    background: #95a5a6;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 6px;
    margin-left: 10px;
}
</style>

<div class="container-box">
    <div class="card">

        <div class="title">✏️ Edit Reservasi</div>

        <form action="<?= base_url('reservasi/update/'.$reservasi['id_reservasi']) ?>" method="post">

            <div class="form-group">
                <label>Anggota</label>
                <select name="id_anggota">
                    <?php foreach ($anggota as $a): ?>
                        <option value="<?= $a['id_anggota'] ?>"
                            <?= $reservasi['id_anggota'] == $a['id_anggota'] ? 'selected' : '' ?>>
                            <?= esc($a['nama_anggota']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Buku</label>
                <select name="id_buku">
                    <?php foreach ($buku as $b): ?>
                        <option value="<?= $b['id_buku'] ?>"
                            <?= $reservasi['id_buku'] == $b['id_buku'] ? 'selected' : '' ?>>
                            <?= esc($b['judul']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Reservasi</label>
                <input type="date" name="tanggal_reservasi"
                       value="<?= $reservasi['tanggal_reservasi'] ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="menunggu" <?= $reservasi['status']=='menunggu'?'selected':'' ?>>Menunggu</option>
                    <option value="diproses" <?= $reservasi['status']=='diproses'?'selected':'' ?>>Diproses</option>
                    <option value="selesai" <?= $reservasi['status']=='selesai'?'selected':'' ?>>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-save">💾 Update</button>
            <a href="<?= base_url('reservasi') ?>" class="btn-back">⬅ Kembali</a>

        </form>

    </div>
</div>

<?= $this->endSection() ?>