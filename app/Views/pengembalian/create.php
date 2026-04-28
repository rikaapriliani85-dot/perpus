<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container">

    <h3 style="margin-bottom:15px;">📦 Tambah Pengembalian</h3>

    <form action="<?= base_url('pengembalian/store') ?>" method="post"
          style="background:#fff; padding:15px; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">

        <!-- PILIH PEMINJAMAN -->
        <label><b>Pilih Peminjaman</b></label><br>

        <select name="id_peminjaman" id="peminjaman" required
                style="width:100%; padding:10px; margin-top:5px; margin-bottom:15px;">

            <option value="">-- pilih peminjaman --</option>
            <?php foreach ($peminjaman as $p): ?>
                <option value="<?= $p['id_peminjaman'] ?>">
                    <?= $p['id_peminjaman'] ?>
                </option>
            <?php endforeach; ?>

        </select>

       <div style="margin-bottom:15px; padding:10px; background:#f8f9fa; border-radius:6px; cursor:pointer;"
     onclick="toggleDenda()">

    <b>💰 Estimasi Denda:</b>
    <span id="denda">Rp 1</span>

    <div id="detailDenda" style="display:none; margin-top:8px; font-size:13px; color:#666;">
        Klik peminjaman untuk menghitung otomatis
    </div>
</div>

        <!-- BUTTON -->
        <button type="submit"
                style="background:#28a745; color:#fff; padding:10px 15px; border:none; border-radius:6px; cursor:pointer;">
            💾 Simpan
        </button>

        <a href="<?= base_url('pengembalian') ?>"
           style="margin-left:10px; text-decoration:none; color:#555;">
            ⬅ Kembali
        </a>

    </form>
</div>

<!-- JS HITUNG DENDA -->
<script>
document.getElementById('peminjaman').addEventListener('change', function () {
    let selected = this.options[this.selectedIndex];
    let tglKembali = selected.getAttribute('data-kembali');

    if (!tglKembali) {
        document.getElementById('denda').innerText = "Rp 0";
        return;
    }

    let today = new Date().toISOString().split('T')[0];
    let denda = 0;
    let tarif = 1000;

    if (today > tglKembali) {
        let diff = Math.ceil((new Date(today) - new Date(tglKembali)) / (1000 * 60 * 60 * 24));
        denda = diff * tarif;
    }

    document.getElementById('denda').innerText =
        "Rp " + denda.toLocaleString('id-ID');
});
</script>

<?= $this->endSection() ?>