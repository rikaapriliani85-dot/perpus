<style>
    .sidebar-menu {
        padding: 15px 10px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .sidebar-menu a {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #333 !important;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s;
        text-decoration: none !important;
        font-size: 14px;
    }
    .sidebar-menu a:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: translateX(5px);
    }
    .brand-section {
        padding: 10px 15px;
        margin-bottom: 10px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .profile-section {
        padding: 20px 15px;
        text-align: center;
    }
    .profile-section img {
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border: 2px solid white;
    }
    .menu-label {
        font-size: 11px;
        text-transform: uppercase;
        color: #666;
        margin: 15px 15px 5px 15px;
        font-weight: bold;
        letter-spacing: 1px;
    }
</style>

<div class="sidebar-menu">
    <div class="brand-section">
        <a href="#" style="padding:0; font-size: 18px;"><b>PERPUS</b></a>
        <a href="<?= base_url('/') ?>" style="padding:0; font-size: 14px; color: #555 !important;">RIKA</a>
    </div>

    <?php if (session()->get('role') == 'admin' || session()->get('role') == 'petugas') : ?>
        
        <a href="<?= base_url('dashboard') ?>">📊 Dashboard</a>

        <a href="<?= base_url('users') ?>">👤 Users</a>

        <?php if (session()->get('role') == 'admin') : ?>
            <div style="padding: 5px 15px;">
                <a href="<?= base_url('backup') ?>" class="btn btn-success text-white w-100 justify-content-center" style="background-color: #28a745 !important;">Backup Database</a>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('peminjaman') ?>">📖 Peminjaman</a>
        <a href="<?= base_url('buku') ?>">📚 Buku</a>
        <a href="<?= base_url('kategori') ?>">📂 Kategori</a>
        <a href="<?= base_url('penerbit') ?>">🏢 Penerbit</a>
        <a href="<?= base_url('penulis') ?>">✍️ Penulis</a>
        <a href="<?= base_url('rak') ?>">📦 Rak Buku</a>
        <a href="<?= base_url('ulasan') ?>">⭐ Ulasan</a>
        <a href="<?= base_url('transaksi') ?>">💳 Transaksi</a>
        <a href="<?= base_url('penarikan') ?>">💸 Penarikan</a>
        <a href="<?= base_url('reservasi') ?>">📌 Reservasi</a>
        <a href="<?= base_url('pengembalian') ?>">↩️ Pengembalian</a>

    <?php endif; ?>

    <?php if (session()->get('role') == 'anggota') : ?>
        <a href="<?= base_url('/') ?>">🏠 Dashboard</a>
    <a href="<?= base_url('anggota/peminjaman') ?>">Peminjaman Saya</a>
        <a href="<?= base_url('pengembalian') ?>">↩️ Pengembalian Saya</a>
    <?php endif; ?>

    <a href="<?= base_url('users/edit/' . session()->get('id')) ?>">⚙️ Setting</a>
    <a href="<?= base_url('/logout') ?>" style="color: #d9534f !important;">🚪 Log Out</a>
    <a href="<?= base_url('login') ?>">🔑 Masuk sebagai</a>

    <div class="profile-section">
        <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" width="80" height="80" />
        <p style="font-size: 12px; margin-top: 5px; color: #444;"><?= session()->get('role') ?></p>
    </div>
</div>