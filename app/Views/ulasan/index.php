<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 1000px;
    margin: 30px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
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
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
    color: white;
}

.btn-add { background: #2ecc71; }
.btn-edit { background: #f39c12; }
.btn-delete { background: #e74c3c; }

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th {
    background: #f5f5f5;
    padding: 10px;
    text-align: left;
}

.table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.table tr:hover {
    background: #fafafa;
}

.rating {
    color: #f1c40f;
    font-size: 14px;
}

.actions a {
    margin-right: 5px;
}

.empty {
    text-align: center;
    padding: 20px;
    color: #888;
}
</style>

<div class="container">
    <div class="card">

        <div class="header">
            <div class="title">⭐ Data Ulasan</div>
            <a href="<?= base_url('ulasan/create') ?>" class="btn btn-add">+ Tambah</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Anggota</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($ulasan)): ?>
                <?php $no = 1; foreach ($ulasan as $u): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $u['judul'] ?></td>
                    <td><?= $u['nama_anggota'] ?></td>

                    <td class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?= $i <= $u['rating'] ? '⭐' : '☆' ?>
                        <?php endfor; ?>
                    </td>

                    <td><?= $u['komentar'] ?></td>
                    <td><?= $u['tanggal'] ?></td>

                    <td class="actions">
                        <a href="<?= base_url('ulasan/edit/'.$u['id_ulasan']) ?>" class="btn btn-edit">Edit</a>
                        <a href="<?= base_url('ulasan/delete/'.$u['id_ulasan']) ?>"
                           class="btn btn-delete"
                           onclick="return confirm('Hapus data?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="empty">Belum ada ulasan</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>