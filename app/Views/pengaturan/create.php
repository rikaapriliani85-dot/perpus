<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3>Pengaturan Aplikasi</h3>
<form action="<?= base_url('peminjaman/store') ?>" method="post">

    <input type="hidden" name="id_buku" value="<?= $id_buku ?>">

    <button type="submit">Konfirmasi Pinjam</button>

</form>
<form action="<?= base_url('pengaturan/update/' . $pengaturan['id']) ?>" method="post">

    <label>Nama Aplikasi</label><br>
    <input type="text" name="nama_aplikasi" value="<?= $pengaturan['nama_aplikasi'] ?>"><br><br>

    <label>Denda Per Hari</label><br>
    <input type="number" name="denda_per_hari" value="<?= $pengaturan['denda_per_hari'] ?>"><br><br>

    <label>Maksimal Pinjam</label><br>
    <input type="number" name="maksimal_pinjam" value="<?= $pengaturan['maksimal_pinjam'] ?>"><br><br>

    <label>Lama Pinjam (hari)</label><br>
    <input type="number" name="lama_pinjam" value="<?= $pengaturan['lama_pinjam'] ?>"><br><br>

    <form action="<?= base_url('pengaturan/save') ?>" method="post">
    <input type="text" name="nama_aplikasi">
    <input type="number" name="denda_per_hari">
    <input type="number" name="maksimal_pinjam">
    <input type="number" name="lama_pinjam">

    <button type="submit">Simpan</button>
    <?= $this->endSection() ?>