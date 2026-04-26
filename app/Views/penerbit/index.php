<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 900px;
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
    display: inline-block;
}

.btn-add {
    background: #007bff;
}

.btn-add:hover {
    background: #0056b3;
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
    color: #e74c3c;
    font-weight: bold;
    text-decoration: none;
}

.btn-delete:hover {
    text-decoration: underline;
}
</style>

<div class="container">

<h2>📚 Data Penerbit</h2>

<div class="action-bar">
    <a href="<?= base_url('penerbit/create') ?>" class="btn btn-add">+ Tambah</a>
    <a href="<?= base_url('/') ?>" class="btn btn-back">⬅ Kembali</a>
</div>

<table>
    <thead>
        <tr>
            <th width="60">No</th>
            <th>Nama Penerbit</th>
            <th>Alamat</th>
            <th width="120">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach($penerbit as $p): ?>
        <tr>
            <td style="text-align:center;">
                <?= $no++ ?>
            </td>

            <td>
                <?= $p['nama_penerbit'] ?>
            </td>

            <td>
             <input type="text" name="alamat" placeholder="Alamat">
            </td>

            <td style="text-align:center;">
                <form action="<?= base_url('penerbit/delete/' . $p['id_penerbit']) ?>"
                      method="post"
                      onsubmit="return confirm('Yakin mau hapus?')">

                    <button type="submit" class="btn-delete"
                            style="background:none; border:none; cursor:pointer;">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

</div>

<?= $this->endSection() ?>