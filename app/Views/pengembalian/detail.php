<div style="
    max-width:500px;
    margin:auto;
    padding:20px;
    background:#fff;
    border-radius:12px;
    box-shadow:0 3px 12px rgba(0,0,0,0.1);
    font-family:Arial;
">

    <h3 style="margin-bottom:20px; text-align:center;">
        📦 Detail Pengembalian
    </h3>

    <!-- DIKEMBALIKAN -->
    <div style="margin-bottom:15px;">
        <strong style="color:#333;">Tanggal dikembalikan:</strong><br>
        <span style="color:green; font-weight:bold;">
            <?= !empty($pengembalian['tanggal_dikembalikan']) 
                ? date('d-m-Y', strtotime($pengembalian['tanggal_dikembalikan'])) 
                : '-' ?>
        </span>
    </div>

    <!-- DENDA -->
    <div style="margin-bottom:20px;">
        <strong style="color:#333;">Denda:</strong><br>
        <span style="color:#dc3545; font-weight:bold; font-size:18px;">
            Rp <?= number_format($pengembalian['denda'] ?? 0, 0, ',', '.') ?>
        </span>
    </div>

    <!-- INFO TAMBAHAN (OPSIONAL) -->
    <div style="padding:10px; background:#f8f9fa; border-radius:8px; font-size:14px;">
        <strong>ID Peminjaman:</strong> #<?= $pengembalian['id_peminjaman'] ?? '-' ?>
    </div>

</div>