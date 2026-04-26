<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 950px;
    margin: auto;
    padding: 20px;
    font-family: Arial;
}

h3 {
    margin-bottom: 15px;
}

.form-box {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

input[type="date"], select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 15px;
}

.buku-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 12px;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #eee;
    max-height: 360px;
    overflow-y: auto;
}

.buku-item {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    transition: 0.2s;
}

.buku-item:hover {
    transform: scale(1.02);
    border-color: #007bff;
}

.buku-item img {
    width: 70px;
    height: 95px;
    object-fit: cover;
    border-radius: 8px;
}

.buku-title {
    font-size: 13px;
    margin-top: 6px;
    font-weight: bold;
}

.actions {
    margin-top: 15px;
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

<div class="container">

<h3>📚 Tambah Peminjaman</h3>

<form method="post" action="<?= base_url('peminjaman/store') ?>" class="form-box">

    <!-- ================= BUKU ================= -->
    <label>📖 Pilih Buku (bisa lebih dari 1)</label>

    <div class="buku-grid">

        <?php foreach ($buku as $b): ?>
        <label class="buku-item">

            <input type="checkbox" name="id_buku[]" value="<?= $b['id_buku'] ?>">

            <div style="margin-top:8px;">
                <?php if (!empty($b['cover'])): ?>
                    <img src="<?= base_url('uploads/buku/' . $b['cover']) ?>">
                <?php else: ?>
                    <div style="width:70px;height:95px;background:#ddd;
                        display:flex;align-items:center;justify-content:center;
                        border-radius:8px;font-size:11px;margin:auto;">
                        No Cover
                    </div>
                <?php endif; ?>
            </div>

            <div class="buku-title">
                <?= esc($b['judul']) ?>
            </div>

        </label>
        <?php endforeach; ?>

    </div>

    <br>

    <!-- ================= TANGGAL ================= -->
    <label>📅 Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required>

    <!-- ================= ANGGOTA ================= -->
    <label>👤 Anggota</label>
    <select name="id_anggota" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
            <option value="<?= $a['id'] ?>">
                <?= $a['username'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- ================= PETUGAS ================= -->
    <input type="hidden" name="id_petugas" value="<?= session()->get('id') ?>">

    <!-- ================= BUTTON ================= -->
    <div class="actions">
        <button type="submit" class="btn btn-save">💾 Simpan</button>
        <a href="<?= base_url('peminjaman') ?>" class="btn btn-back">⬅ Kembali</a>
    </div>

</form>

</div>

<?= $this->endSection() ?>