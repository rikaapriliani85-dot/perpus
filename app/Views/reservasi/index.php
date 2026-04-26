<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container-box {
    max-width: 1000px;
    margin: 30px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
    color: #2c3e50;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    color: white;
}

.btn-add {
    background: #3498db;
}

.btn-add:hover {
    background: #2980b9;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
}

th {
    background: #3498db;
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

.badge {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    color: white;
}

.badge-wait { background: #f39c12; }
.badge-process { background: #3498db; }
.badge-done { background: #27ae60; }

.action a {
    text-decoration: none;
    margin: 0 3px;
    font-size: 13px;
}

.edit {
    color: #f39c12;
}

.delete {
    color: #e74c3c;
}

.empty {
    text-align: center;
    padding: 15px;
    color: #888;
}
</style>

<div class="container-box">
    <div class="card">

        <div class="header">
            <div class="title">📅 Data Reservasi</div>
            <a href="<?= base_url('reservasi/create') ?>" class="btn btn-add">+ Tambah</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($reservasi)): ?>
                    <?php $no = 1; foreach ($reservasi as $r): ?>
                    <tr>
                        <td style="text-align:center;"><?= $no++ ?></td>
                        <td><?= esc($r['nama_anggota']) ?></td>
                        <td><?= esc($r['judul']) ?></td>
                        <td><?= $r['tanggal_reservasi'] ?></td>

                        <td>
                            <?php if ($r['status'] == 'menunggu'): ?>
                                <span class="badge badge-wait">Menunggu</span>
                            <?php elseif ($r['status'] == 'diproses'): ?>
                                <span class="badge badge-process">Diproses</span>
                            <?php else: ?>
                                <span class="badge badge-done">Selesai</span>
                            <?php endif; ?>
                        </td>

                        <td class="action" style="text-align:center;">
                            <a href="<?= base_url('reservasi/edit/'.$r['id_reservasi']) ?>" class="edit">Edit</a> |
                            <a href="<?= base_url('reservasi/delete/'.$r['id_reservasi']) ?>"
                               class="delete"
                               onclick="return confirm('Yakin mau hapus?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="empty">Data reservasi belum ada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>