<h2>Edit Anggota</h2>

<form action="/anggota/update/<?= $anggota['id_anggota'] ?>" method="post">

    Nama Anggota:<br>
    <input type="text" name="nama_anggota" value="<?= $anggota['nama_anggota'] ?>"><br><br>

    Alamat:<br>
    <textarea name="alamat"><?= $anggota['alamat'] ?></textarea><br><br>

    No HP:<br>
    <input type="text" name="no_hp" value="<?= $anggota['no_hp'] ?>"><br><br>

    <button type="submit">Update</button>
</form>