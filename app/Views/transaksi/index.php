<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    h3 {
        margin-bottom: 15px;
    }

    .btn-add {
        display: inline-block;
        padding: 8px 12px;
        background: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .btn-add:hover {
        background: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    th {
        background: #007bff;
        color: white;
        padding: 10px;
        text-align: left;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f2f2f2;
    }

    .btn-edit {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-delete {
        color: #dc3545;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<h3>Data Transaksi</h3>

<a class="btn-add" href="<?= base_url('transaksi/create') ?>">+ Tambah Transaksi</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Peminjaman</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($transaksi as $t): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $t['id_peminjaman'] ?></td>
                <td><?= $t['jenis'] ?></td>
                <td><?= $t['jumlah'] ?></td>
                <td><?= $t['status'] ?></td>
                <td><?= $t['tanggal'] ?></td>
                <td>
                    <a class="btn-edit" href="<?= base_url('transaksi/edit/' . $t['id_transaksi']) ?>">Edit</a> |
                    <a class="btn-delete" 
                       href="<?= base_url('transaksi/delete/' . $t['id_transaksi']) ?>" 
                       onclick="return confirm('Yakin mau hapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>