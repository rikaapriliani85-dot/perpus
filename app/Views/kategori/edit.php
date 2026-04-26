<div class="container mt-4">

    <h3>Edit Kategori</h3>

   <form action="<?= base_url('kategori/store') ?>" method="post">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                   value="<?= $kategori['nama_kategori'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>

</div>