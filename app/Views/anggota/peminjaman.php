<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 900px;
    margin: auto;
    padding: 20px;
    font-family: Arial;
}

.box {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
}

h3 {
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #007bff;
    color: white;
    padding: 10px;
    text-align: left;
}

td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.status-dipinjam {
    color: red;
    font-weight: bold;
}

.status-kembali {
    color: green;
    font-weight: bold;
}
</style>

<div class="container">
<table border="1" cellpadding="10">
<h3>📚 Peminjaman Saya</h3>
<div style="margin-bottom:10px;">
    <a href="<?= base_url('anggota/buku') ?>"
       style="background:blue;color:white;padding:8px 12px;border-radius:6px;text-decoration:none;">
        📖 Lihat Buku
    </a>
</div>

<table border="1" cellpadding="10">
    <tr>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>

    <?php if (!empty($peminjaman)): ?>
        <?php foreach ($peminjaman as $p): ?>
            <tr>
                <td><?= $p['judul_buku'] ?></td>
                <td><?= $p['tanggal_pinjam'] ?></td>
                <td><?= $p['tanggal_kembali'] ?? '-' ?></td>
                <td><?= $p['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Belum ada peminjaman</td>
        </tr>
    <?php endif; ?>
</table>
</div>

</div>

<?= $this->endSection() ?>