<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h3>Data Denda Saya</h3>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Denda</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($denda as $d) : ?>
        <tr>
            <td><?= $d['id_denda'] ?></td>
            <td>Rp <?= number_format($d['denda']) ?></td>
            <td><?= $d['status'] ?></td>


            <td>
                <?php if ($d['bukti']) : ?>

                    <img src="<?= base_url('uploads/bukti/' . $d['bukti']) ?>" width="100">
                <?php endif; ?>
            </td>
            <td>

                <?php if ($d['status'] == 'belum_bayar' || $d['status'] == 'ditolak') : ?>
                    <form action="<?= base_url('denda/bayar/' . $d['id_denda']) ?>" method="post" enctype="multipart/form-data">
                        <select name="metode_bayar">
                            <option>Transfer</option>
                            <option>Cash</option>
                        </select>
                        <input type="file" name="bukti" required>
                        <button type="submit">Upload</button>
                    </form>
                <?php else : ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>