<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Detail Rak</h3>

    <table class="table table-bordered">
        <tr>
            <th>Nama Rak</th>
            <td><?= $rak['nama_rak'] ?></td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td><?= $rak['lokasi'] ?></td>
        </tr>
    </table>

    <a href="<?= base_url('/rak') ?>" class="btn btn-secondary">Kembali</a>
</div>

<?= $this->endSection() ?>