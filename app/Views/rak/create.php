<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Tambah Rak</h3>

    <form action="<?= base_url('/rak/store') ?>" method="post">
        <div class="mb-3">
            <label>Nama Rak</label>
            <input type="text" name="nama_rak" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= base_url('/rak') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>