<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Data Rak</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mb-3">
        <a href="<?= base_url('/rak/create') ?>" class="btn btn-primary">+ Tambah Rak</a>

        <form method="get" action="<?= base_url('/rak') ?>" class="d-flex">
            <input type="text" name="keyword" class="form-control me-2" placeholder="Cari...">
            <button class="btn btn-outline-secondary">Search</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Rak</th>
                <th>Lokasi</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($rak as $r) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r['nama_rak'] ?></td>
                    <td><?= $r['lokasi'] ?></td>
                    <td>
                        <a href="<?= base_url('/rak/detail/' . $r['id_rak']) ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="<?= base_url('/rak/edit/' . $r['id_rak']) ?>" class="btn btn-warning btn-sm">Edit</a>

                        <form action="<?= base_url('/rak/delete/' . $r['id_rak']) ?>" method="post" style="display:inline;">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>