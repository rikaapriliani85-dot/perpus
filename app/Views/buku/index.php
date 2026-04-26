<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">

<style>
.table img {
    object-fit: cover;
}

.card-header h5 {
    font-size: 18px;
}

.search-box {
    max-width: 350px;
}

.badge-stock {
    font-size: 12px;
    padding: 6px 10px;
}

.btn-group a {
    min-width: 70px;
}
</style>

<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">

        <h5 class="mb-0 text-primary fw-bold">📚 Data Koleksi Buku</h5>

        <div>
            <a href="<?= base_url('buku/print') ?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                🖨 Print
            </a>
            <a href="<?= base_url('buku/create') ?>" class="btn btn-primary btn-sm">
                ➕ Tambah Buku
            </a>
        </div>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <!-- SEARCH -->
        <form method="get" class="mb-3">
            <div class="input-group search-box">
                <input type="text"
                       name="keyword"
                       class="form-control form-control-sm"
                       placeholder="Cari judul / ISBN..."
                       value="<?= request()->getGet('keyword') ?>">
                <button class="btn btn-primary btn-sm">Cari</button>
            </div>
        </form>

        <!-- TABLE -->
        <div class="table-responsive">
            <table class="table table-hover align-middle border">

                <thead class="table-light">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Tersedia</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if (!empty($buku)): ?>
                    <?php foreach ($buku as $b): ?>
                        <tr>

                            <!-- ID -->
                            <td class="text-center text-muted small">
                                <?= $b['id_buku'] ?>
                            </td>

                            <!-- COVER -->
                            <td>
                                <?php if (!empty($b['cover'])): ?>
                                    <img src="<?= base_url('uploads/buku/' . $b['cover']) ?>"
                                         width="55"
                                         height="75"
                                         class="rounded">
                                <?php else: ?>
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:55px;height:75px;">
                                        <small>No Cover</small>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <!-- JUDUL -->
                            <td>
                                <div class="fw-bold"><?= $b['judul'] ?></div>
                                <div class="text-muted small">
                                    ISBN: <?= $b['isbn'] ?? '-' ?>
                                </div>
                                <div class="text-muted small">
                                    Penulis: <?= $b['nama_penulis'] ?>
                                </div>
                            </td>

                            <!-- KATEGORI -->
                            <td>
                                <span class="badge bg-info text-dark">
                                    <?= $b['nama_kategori'] ?>
                                </span>
                            </td>

                            <!-- PENERBIT -->
                            <td>
                                <div class="small fw-bold"><?= $b['nama_penerbit'] ?></div>
                                <div class="small text-muted">Rak: <?= $b['nama_rak'] ?></div>
                            </td>

                            <!-- TAHUN -->
                            <td class="text-center">
                                <?= $b['tahun_terbit'] ?>
                            </td>

                            <!-- STOK -->
                            <td class="text-center fw-bold">
                                <?= $b['jumlah'] ?>
                            </td>

                            <!-- TERSEDIA -->
                            <td class="text-center">
                                <?php if ($b['tersedia'] > 0): ?>
                                    <span class="badge bg-success badge-stock">
                                        <?= $b['tersedia'] ?>
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-danger badge-stock">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </td>

                            <!-- AKSI -->
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">

                                    <a href="<?= base_url('buku/edit/' . $b['id_buku']) ?>"
                                       class="btn btn-outline-warning">
                                        Edit
                                    </a>

                                    <a href="<?= base_url('buku/delete/' . $b['id_buku']) ?>"
                                       onclick="return confirm('Yakin ingin hapus?')"
                                       class="btn btn-outline-danger">
                                        Hapus
                                    </a>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            Data buku tidak ditemukan
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

</div>

<?= $this->endSection() ?>