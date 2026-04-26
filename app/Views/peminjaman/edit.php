<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .container {
        padding: 20px;
        max-width: 600px;
    }

    h3 {
        margin-bottom: 15px;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.08);
    }

    label {
        font-weight: bold;
    }

    select, input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary {
        background: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .btn-back {
        display: inline-block;
        margin-left: 10px;
        text-decoration: none;
        color: #555;
    }
</style>

<div class="container">

    <h3>✏️ Edit Peminjaman</h3>

    <form method="post" action="<?= base_url('peminjaman/update/' . $peminjaman['id_peminjaman']) ?>" enctype="multipart/form-data">

        <!-- ANGGOTA -->
        <label>Anggota</label>
        <select name="id_anggota" required>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['id'] ?>"
                    <?= $peminjaman['id_anggota'] == $a['id'] ? 'selected' : '' ?>>
                    <?= $a['username'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- STATUS -->
        <label>Status</label>
        <select name="status" required>
            <option value="dipinjam" <?= $peminjaman['status'] == 'dipinjam' ? 'selected' : '' ?>>
                Dipinjam
            </option>
            <option value="kembali" <?= $peminjaman['status'] == 'kembali' ? 'selected' : '' ?>>
                Kembali
            </option>
        </select>

        <!-- FOTO -->
        <label>Foto (opsional)</label>
        <input type="file" name="foto">

        <!-- BUTTON -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('peminjaman') ?>" class="btn-back">Kembali</a>

    </form>

</div>

<?= $this->endSection() ?>