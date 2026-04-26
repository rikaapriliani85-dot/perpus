<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .container {
        padding: 20px;
    }

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
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
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

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    .status-pinjam {
        color: red;
        font-weight: bold;
    }

    .status-kembali {
        color: green;
        font-weight: bold;
    }

    img {
        border-radius: 5px;
    }
</style>

<div class="container">

    <h3>📚 Data Peminjaman</h3>

    <a class="btn-add" href="<?= base_url('peminjaman/create') ?>">+ Tambah Peminjaman</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
                <th>Denda</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($peminjaman as $p): ?>
            <tr>
                <td><?= $no++ ?></td>

                <!-- COVER -->
                <td>
                    <?php if (!empty($p['cover'])): ?>
                        <?php $covers = explode(',', $p['cover']); ?>
                        <img src="<?= base_url('uploads/buku/' . $covers[0]) ?>" width="50">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>

                <!-- ANGGOTA -->
                <td><?= $p['nama_anggota'] ?? '-' ?></td>

                <!-- TANGGAL -->
                <td><?= $p['tanggal_pinjam'] ?></td>
                <td><?= $p['tanggal_kembali'] ?></td>

                <!-- STATUS -->
                <td>
                    <?php if ($p['status'] == 'dipinjam'): ?>
                        <span class="status-pinjam">Dipinjam</span>
                    <?php else: ?>
                        <span class="status-kembali">Kembali</span>
                    <?php endif; ?>
                </td>

                <!-- AKSI -->
                <td>
                    <a href="<?= base_url('peminjaman/detail/' . $p['id_peminjaman']) ?>">Detail</a> |
                    <a href="<?= base_url('peminjaman/edit/' . $p['id_peminjaman']) ?>">Edit</a> |
                    <a href="<?= base_url('peminjaman/delete/' . $p['id_peminjaman']) ?>" onclick="return confirm('Hapus data?')">
                        Hapus
                    </a>
                </td>

                <!-- DENDA -->
                <td>
                    Rp <?= number_format($p['denda'] ?? 0, 0, ',', '.') ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>