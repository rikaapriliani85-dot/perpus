<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit Rak</h3>

    <form action="<?= base_url('/rak/update/' . $rak['id_rak']) ?>" method="post">
        <div class="mb-3">
            <label>Nama Rak</label>
            <input type="text" name="nama_rak" class="form-control" value="<?= $rak['nama_rak'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?= $rak['lokasi'] ?>" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('/rak') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>