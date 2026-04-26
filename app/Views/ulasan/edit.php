<h3>Edit Ulasan</h3>

<a href="<?= base_url('ulasan') ?>">← Kembali</a>

<form action="<?= base_url('ulasan/update/'.$ulasan['id_ulasan']) ?>" method="post">

<label>Rating</label>
<input type="number" name="rating" value="<?= $ulasan['rating'] ?>">

<br><br>

<label>Komentar</label>
<textarea name="komentar"><?= $ulasan['komentar'] ?></textarea>

<br><br>

<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= $ulasan['tanggal'] ?>">

<br><br>

<button type="submit">Update</button>

</form>