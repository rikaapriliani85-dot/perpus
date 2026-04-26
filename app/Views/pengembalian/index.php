<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-custom {
    max-width: 1000px;
    margin: auto;
    font-family: Arial, sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    color: white;
    display: inline-block;
}

.btn-add {
    background: #28a745;
}

.btn-add:hover {
    background: #218838;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    border-radius: 10px;
    overflow: hidden;
}

.table thead {
    background: #343a40;
    color: white;
}

.table th, .table td {
    padding: 12px;
    text-align: center;
}

.table tbody tr {
    border-bottom: 1px solid #eee;
}

.table tbody tr:hover {
    background: #f8f9fa;
}

.badge-id {
    background: #007bff;
    color: white;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 13px;
}

.text-danger {
    color: #dc3545;
    font-weight: bold;
}

.action a {
    text-decoration: none;
    margin: 0 5px;
    font-size: 13px;
}

.action .detail {
    color: #007bff;
}

.action .delete {
    color: #dc3545;
}

.action .denda {
    color: green;
}
</style>

<div class="container-custom">

    <div class="header">
        <h2>📦 Data Pengembalian</h2>
        <a href="<?= base_url('pengembalian/create') ?>" class="btn btn-add">
            + Tambah
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th width="60">No</th>
                <th>ID Pinjam</th>
                <th>Tanggal Dikembalikan</th>
                <th>Denda</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; foreach ($pengembalian as $p): ?>
            <tr>

                <td><?= $no++ ?></td>

                <td>
                    <span class="badge-id">
                        #<?= $p['id_peminjaman'] ?? '-' ?>
                    </span>
                </td>

                <td>
                    <?= $p['tanggal_dikembalikan'] ?? '-' ?>
                </td>

                <td class="text-danger">
                    Rp <?= number_format($p['denda'] ?? 0, 0, ',', '.') ?>
                </td>

                <td class="action">
                    <a href="<?= base_url('pengembalian/detail/' . $p['id_pengembalian']) ?>" class="detail">
                        Detail
                    </a> |

                    <a href="<?= base_url('pengembalian/delete/' . $p['id_pengembalian']) ?>"
                       onclick="return confirm('Hapus data ini?')" 
                       class="delete">
                        Hapus
                    </a> |

                    <a href="<?= base_url('pengembalian/hitung/' . $p['id_pengembalian']) ?>" class="denda">
                        Hitung
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>