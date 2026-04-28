<h3>📖 Pinjam Buku</h3>

<div style="max-width:500px; padding:15px; border:1px solid #ddd; border-radius:10px;">

<form action="<?= base_url('peminjaman/pinjam/'.$buku['id_buku']) ?>" method="get">
    <!-- ID BUKU -->
    <input type="hidden" name="id_buku" value="<?= $buku['id_buku'] ?>">

    <!-- JUDUL -->
    <p><b>Judul Buku:</b> <?= $buku['judul'] ?></p>

    <!-- KATEGORI -->
    <p><b>Kategori:</b> <?= $buku['nama_kategori'] ?? '-' ?></p>

    <!-- PENULIS -->
    <p><b>Penulis:</b> <?= $buku['nama_penulis'] ?? '-' ?></p>

    <!-- TANGGAL PINJAM -->
    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required
           style="width:100%;padding:8px;margin-bottom:10px;">

    <!-- BUTTON -->
    <button type="submit"
            style="background:green;color:white;padding:10px 15px;border:none;border-radius:6px;width:100%;">
        📚 Pinjam Sekarang
    </button>

</form>

</div>