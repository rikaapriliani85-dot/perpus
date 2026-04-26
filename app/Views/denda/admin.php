<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?><h3>Data Denda (Admin)</h3>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Denda</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($denda as $d) : ?>
        <tr>
            <td><?= $d['id_denda'] ?></td>
            <td><?= $d['id_user'] ?></td>
            <td>Rp <?= number_format($d['denda']) ?></td>
            <td><?= $d['status'] ?></td>
            <td>
                <?php if ($d['bukti']) : ?>
                    <img src="<?= base_url('uploads/bukti/' . $d['bukti']) ?>" width="100">
                <?php endif; ?>
            </td>
            <td>
                <?php if ($d['status'] == 'menunggu_verifikasi') : ?>
                    <a href="<?= base_url('admin/denda/verifikasi/' . $d['id_denda']) ?>">✔ Verifikasi</a>
                    <a href="<?= base_url('admin/denda/tolak/' . $d['id_denda']) ?>">✖ Tolak</a>
                <?php else : ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>