<h2>Data Anggota</h2>

<a href="/anggota/create">+ Tambah Anggota</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; foreach ($anggota as $a): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $a['nama_anggota'] ?></td>
        <td><?= $a['alamat'] ?></td>
        <td><?= $a['no_hp'] ?></td>
        <td>
            <a href="/anggota/edit/<?= $a['id_anggota'] ?>">Edit</a>
            <a href="/anggota/delete/<?= $a['id_anggota'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
   <?php foreach ($buku as $b): ?>
    <div>
        <h3><?= $b['judul'] ?></h3>

        <a href="<?= base_url('anggota/pinjam/'.$b['id_buku']) ?>">
            Pinjam
        </a>
    </div>
<?php endforeach; ?>
</table>