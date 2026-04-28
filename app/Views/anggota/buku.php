<h3 style="margin-bottom:15px;">📚 Daftar Buku</h3>

<div style="
    display:grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap:15px;
">

<?php foreach ($buku as $b): ?>

    <div style="
        border-radius:12px;
        overflow:hidden;
        border:1px solid #ddd;
        box-shadow:0 3px 8px rgba(0,0,0,0.1);
        background:white;
    ">

        <!-- COVER -->
        <div style="height:180px; background:#f2f2f2; display:flex; align-items:center; justify-content:center;">
            <?php if (!empty($b['cover'])): ?>
                <img src="<?= base_url('uploads/buku/'.$b['cover']) ?>"
                     style="width:100%; height:100%; object-fit:cover;">
            <?php else: ?>
                <span style="color:#999;">No Cover</span>
            <?php endif; ?>
        </div>

        <!-- ISI -->
        <div style="padding:10px;">

            <h4 style="font-size:14px; margin:0 0 5px 0;">
                <?= $b['judul'] ?>
            </h4>

            <p style="font-size:12px; margin:3px 0;">
                📂 <?= $b['nama_kategori'] ?? '-' ?>
            </p>

            <p style="font-size:12px; margin:3px 0;">
                ✍️ <?= $b['nama_penulis'] ?? '-' ?>
            </p>

            <!-- STOK -->
            <?php if ($b['tersedia'] > 0): ?>
                <p style="color:green; font-size:12px; margin:5px 0;">
                    Stok: <?= $b['tersedia'] ?>
                </p>

                <a href="<?= base_url('anggota/pinjam/'.$b['id_buku']) ?>"
                   style="
                       display:block;
                       text-align:center;
                       background:#28a745;
                       color:white;
                       padding:7px;
                       border-radius:8px;
                       text-decoration:none;
                       margin-top:5px;
                       font-size:13px;
                   ">
                   📖 Pinjam
                </a>

            <?php else: ?>
                <div style="
                    text-align:center;
                    background:#ccc;
                    color:#666;
                    padding:7px;
                    border-radius:8px;
                    margin-top:5px;
                    font-size:13px;
                ">
                    Tidak Tersedia
                </div>
            <?php endif; ?>

        </div>
    </div>

<?php endforeach; ?>

</div>