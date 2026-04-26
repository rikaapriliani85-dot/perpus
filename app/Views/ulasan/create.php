<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3>Tambah Ulasan</h3>

<a href="<?= base_url('ulasan') ?>">← Kembali</a>

<form action="<?= base_url('ulasan/store') ?>" method="post">

<label>Buku</label><br>
<select name="id_buku">
<?php foreach ($buku as $b): ?>
<option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
<?php endforeach; ?>
</select>

<br><br>

<label>Anggota</label><br>
<select name="id_anggota">
<?php foreach ($anggota as $a): ?>
<option value="<?= $a['id_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
<?php endforeach; ?>
</select>

<br><br>

<label>Rating</label><br>
<input type="number" name="rating" min="1" max="5">

<br><br>

<label>Komentar</label><br>
<textarea name="komentar"></textarea>

<br><br>

<label>Tanggal</label><br>
<input type="date" name="tanggal">

<br><br>

<button type="submit">Simpan</button>

</form>
<?= $this->endSection() ?>
