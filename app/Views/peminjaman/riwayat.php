<h2>Riwayat Peminjaman</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($riwayat as $r): ?>
    <tr>
        <td><?= $r['id_peminjaman']; ?></td>
        <td><?= $r['tanggal_pinjam']; ?></td>
        <td><?= $r['status']; ?></td>
        <td>
            <a href="/peminjaman/detail/<?= $r['id_peminjaman']; ?>">Detail</a> |
            <a href="/peminjaman/kembali/<?= $r['id_peminjaman']; ?>">Kembalikan</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<td>

    <?php if ($p['status'] == 'dipinjam'): ?>
        <a href="/peminjaman/kembali/<?= $p['id_peminjaman']; ?>">
            Kembalikan
        </a>
    <?php endif; ?>
</td>