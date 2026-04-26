<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 1000px;
    margin: auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.btn {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    font-size: 14px;
}

.btn-add {
    background: #28a745;
}

.btn-add:hover {
    background: #218838;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f1f1f1;
    padding: 10px;
    text-align: left;
    font-size: 14px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}

tr:hover {
    background: #fafafa;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
    color: #fff;
}

.green { background: #2ecc71; }
.orange { background: #f39c12; }
.red { background: #e74c3c; }

.action a {
    margin-right: 5px;
    text-decoration: none;
    font-size: 13px;
}

.edit { color: #3498db; }
.delete { color: #e74c3c; }
</style>

<div class="container">

<div class="card">

    <div class="header">
        <h3>📦 Data Penarikan</h3>
        <a href="<?= base_url('penarikan/create') ?>" class="btn btn-add">+ Tambah Penarikan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Peminjaman</th>
                <th>Alamat</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Tanggal Ambil</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; foreach ($penarikan as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['id_peminjaman'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td>Rp <?= number_format($p['biaya'], 0, ',', '.') ?></td>
                <td>
                    <?php if ($p['status'] == 'selesai'): ?>
                        <span class="badge green">Selesai</span>
                    <?php elseif ($p['status'] == 'proses'): ?>
                        <span class="badge orange">Proses</span>
                    <?php else: ?>
                        <span class="badge red"><?= $p['status'] ?></span>
                    <?php endif; ?>
                </td>
                <td><?= $p['tanggal_ambil'] ?></td>
                <td><?= $p['petugas_id'] ?></td>

                <td class="action">
                    <a class="edit" href="<?= base_url('penarikan/edit/'.$p['id_penarikan']) ?>">Edit</a>
                    <a class="delete" href="<?= base_url('penarikan/delete/'.$p['id_penarikan']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

</div>

<?= $this->endSection() ?>