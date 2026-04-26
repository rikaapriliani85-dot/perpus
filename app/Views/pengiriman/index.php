<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.page {
    max-width: 1100px;
    margin: 25px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.title {
    font-size: 20px;
    font-weight: bold;
}

.btn {
    padding: 8px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
}

.btn-add {
    background: #007bff;
    color: white;
}

.btn-add:hover {
    background: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
}

th {
    background: #3498db;
    color: white;
    padding: 10px;
    font-size: 13px;
    text-align: left;
}

td {
    padding: 10px;
    border-bottom: 1px solid #eee;
    font-size: 13px;
}

tr:hover {
    background: #f9f9f9;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    color: white;
}

.pending { background: #f39c12; }
.dikirim { background: #3498db; }
.selesai { background: #2ecc71; }

.action a {
    margin-right: 8px;
    text-decoration: none;
    font-weight: bold;
    font-size: 12px;
}

.edit { color: #f39c12; }
.delete { color: #e74c3c; }
</style>

<div class="page">

<div class="card">

    <div class="header">
        <div class="title">🚚 Data Pengiriman</div>
        <a href="<?= base_url('pengiriman/create') ?>" class="btn btn-add">+ Tambah Data</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Alamat</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($pengiriman as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['nama_anggota'] ?? '-') ?></td>
                <td><?= esc($row['judul'] ?? '-') ?></td>
                <td><?= esc($row['alamat'] ?? '-') ?></td>
                <td>Rp <?= number_format($row['biaya'] ?? 0, 0, ',', '.') ?></td>

                <td>
                    <?php
                        $status = strtolower($row['status'] ?? '');
                    ?>
                    <span class="badge <?= $status ?>">
                        <?= esc($row['status'] ?? '-') ?>
                    </span>
                </td>

                <td><?= esc($row['tanggal'] ?? '-') ?></td>

                <td class="action">
                    <a class="edit" href="<?= base_url('pengiriman/edit/'.$row['id_pengiriman']) ?>">Edit</a>
                    <a class="delete"
                       onclick="return confirm('Hapus data ini?')"
                       href="<?= base_url('pengiriman/delete/'.$row['id_pengiriman']) ?>">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</div>

<?= $this->endSection() ?>