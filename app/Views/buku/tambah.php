<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<h2>➕ Tambah Buku - Perpustakaan Digital</h2>

<form action="/buku/simpan" method="post" enctype="multipart/form-data">
<form action="<?= base_url('buku/store') ?>" method="post" enctype="multipart/form-data">
    
ISBN: <input type="text" name="isbn"><br>
Judul: <input type="text" name="judul"><br>

Kategori:
<select name="id_kategori">
<?php foreach($kategori as $k): ?>
<option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
<?php endforeach; ?>
</select><br>

Penulis:
<select name="id_penulis">
<?php foreach($penulis as $p): ?>
<option value="<?= $p->id_penulis ?>"><?= $p->nama_penulis ?></option>
<?php endforeach; ?>
</select><br>

Penerbit:
<select name="id_penerbit">
<?php foreach($penerbit as $p): ?>
<option value="<?= $p->id_penerbit ?>"><?= $p->nama_penerbit ?></option>
<?php endforeach; ?>
</select><br>

Tahun: <input type="number" name="tahun_terbit"><br>
Jumlah: <input type="number" name="jumlah"><br>
Tersedia: <input type="number" name="tersedia"><br>

Deskripsi:<br>
<textarea name="deskripsi"></textarea><br>

Cover: <input type="file" name="cover"><br><br>

<button type="submit">Simpan</button>

<div class="form-group">
    <label>Cover Buku</label>
    <input type="file" name="cover" class="form-control" required>
</div>

</form>

<?= $this->endSection() ?>