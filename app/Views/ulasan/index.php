<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3>Data Ulasan</h3>

<a href="<?= base_url('ulasan/create') ?>">+ Tambah Ulasan</a>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Buku</th>
    <th>Anggota</th>
    <th>Rating</th>
    <th>Komentar</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>

<?php $no = 1; foreach ($ulasan as $u): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $u['judul'] ?></td>
    <td><?= $u['nama_anggota'] ?></td>
    <td><?= $u['rating'] ?></td>
    <td><?= $u['komentar'] ?></td>
    <td><?= $u['tanggal'] ?></td>
    <td>
        <a href="<?= base_url('ulasan/edit/'.$u['id_ulasan']) ?>">Edit</a> |
        <a href="<?= base_url('ulasan/delete/'.$u['id_ulasan']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<?= $this->endSection() ?>