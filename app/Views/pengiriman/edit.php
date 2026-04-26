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

.btn-update {
    background: #f39c12;
    color: white;
}

.btn-update:hover {
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

<a href="<?= base_url('pengiriman') ?>" class="back-link">
    ← Kembali
</a>

<div class="card">

    <div class="title">✏️ Edit Pengiriman</div>
    <div class="subtitle">Perbarui data pengiriman</div>

    <form action="<?= base_url('pengiriman/update/'.$pengiriman['id_pengiriman']) ?>" method="post">

        <label>Alamat</label>
        <input type="text" name="alamat"
               value="<?= esc($pengiriman['alamat']) ?>">

        <div class="row">
            <div>
                <label>Biaya</label>
                <input type="number" name="biaya"
                       value="<?= esc($pengiriman['biaya']) ?>">
            </div>

            <div>
                <label>Tanggal Kirim</label>
                <input type="date" name="tanggal_kirim"
                       value="<?= esc($pengiriman['tanggal_kirim'] ?? '') ?>">
            </div>
        </div>

        <label>Status</label>
        <select name="status">
            <option value="dikirim" <?= $pengiriman['status']=='dikirim'?'selected':'' ?>>Dikirim</option>
            <option value="sampai" <?= $pengiriman['status']=='sampai'?'selected':'' ?>>Sampai</option>
        </select>

        <label>Petugas ID</label>
        <input type="text" name="petugas_id"
               value="<?= esc($pengiriman['petugas_id'] ?? '') ?>">

        <div class="btn-group">
            <button type="submit" class="btn btn-update">💾 Update</button>
            <a href="<?= base_url('pengiriman') ?>" class="btn btn-back">⬅ Batal</a>
        </div>

    </form>

</div>

</div>

<?= $this->endSection() ?>