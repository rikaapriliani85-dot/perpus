<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.navbar {
    background: #2c3e50;
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 8px;
}

.navbar a {
    color: white;
    text-decoration: none;
    margin-right: 15px;
    font-size: 14px;
}

.navbar a:hover {
    text-decoration: underline;
}

.container {
    max-width: 800px;
    margin: auto;
    font-family: Arial;
}

h2 {
    margin-bottom: 15px;
}

.btn-back {
    display: inline-block;
    margin-bottom: 15px;
    padding: 8px 12px;
    background: #ecf0f1;
    border: 1px solid #ccc;
    border-radius: 6px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
}

.btn-back:hover {
    background: #dfe6e9;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
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

.btn-delete {
    color: red;
    text-decoration: none;
    font-weight: bold;
}

.btn-delete:hover {
    text-decoration: underline;
}
</style>

<!-- NAV -->
<div class="navbar">
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('peminjaman') ?>">Peminjaman</a>
    <a href="<?= base_url('kategori') ?>"><b>Kategori</b></a>
</div>

<div class="container">

    <h2>📁 Data Kategori</h2>

    <a href="<?= base_url('/') ?>" class="btn-back">
        ⬅ Kembali ke Dashboard
    </a>

    <table>
        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Nama Kategori</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($kategori as $k): ?>
            <tr>
                <td style="text-align:center;">
                    <?= $k['id_kategori'] ?>
                </td>

                <td>
                    <?= $k['nama_kategori'] ?>
                </td>

                <td style="text-align:center;">
                    <a href="<?= base_url('kategori/delete/'.$k['id_kategori']) ?>"
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