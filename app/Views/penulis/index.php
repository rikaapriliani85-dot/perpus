<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 800px;
    margin: auto;
    font-family: Arial;
}

h2 {
    margin-bottom: 15px;
}

.action-bar {
    margin-bottom: 15px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    color: white;
}

.btn-add {
    background: #28a745;
}

.btn-add:hover {
    background: #218838;
}

.btn-back {
    background: #6c757d;
}

.btn-back:hover {
    background: #5a6268;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    border-radius: 8px;
    overflow: hidden;
}

th {
    background: #2ecc71;
    color: white;
    padding: 10px;
    text-align: left;
}

td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

tr:hover {
    background: #f9f9f9;
}

.btn-delete {
    color: #e74c3c;
    font-weight: bold;
    text-decoration: none;
}

.btn-delete:hover {
    text-decoration: underline;
}
</style>

<div class="container">

<h2>✍️ Data Penulis</h2>

<div class="action-bar">
    <a href="<?= base_url('penulis/create') ?>" class="btn btn-add">+ Tambah</a>
    <a href="<?= base_url('/') ?>" class="btn btn-back">⬅ Kembali</a>
</div>

<table>
    <thead>
        <tr>
            <th width="60">No</th>
            <th>Nama Penulis</th>
            <th width="100">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; foreach($penulis as $p): ?>
        <tr>
            <td style="text-align:center;">
                <?= $no++ ?>
            </td>

            <td>
                <?= $p['nama_penulis'] ?>
            </td>

            <td style="text-align:center;">
                <a href="<?= base_url('penulis/delete/'.$p['id_penulis']) ?>"
                   class="btn-delete"
                   onclick="return confirm('Yakin mau hapus?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

</div>

<?= $this->endSection() ?>