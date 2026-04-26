<style>
.card {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.1);
    font-family: Arial;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.title {
    font-size: 18px;
    font-weight: bold;
}

.badge {
    padding: 5px 10px;
    border-radius: 6px;
    color: #fff;
    font-size: 12px;
}

.badge-pinjam { background: #e74c3c; }
.badge-kembali { background: #2ecc71; }

.info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.info table {
    width: 48%;
    font-size: 14px;
}

.info td {
    padding: 4px 0;
}

hr {
    border: none;
    border-top: 1px solid #eee;
    margin: 15px 0;
}

table.list {
    width: 100%;
    border-collapse: collapse;
}

table.list th {
    background: #f5f5f5;
    padding: 10px;
    text-align: left;
}

table.list td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.footer {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
}

.btn-back {
    background: #7f8c8d;
    color: white;
}

.btn-success {
    background: #2ecc71;
    color: white;
}

.denda {
    color: #c0392b;
    font-weight: bold;
}
</style>

<div class="card">

    <!-- HEADER -->
    <div class="header">
        <div class="title">📚 Detail Peminjaman</div>

        <div class="badge badge-pinjam">
            Status: Dipinjam
        </div>
    </div>

    <!-- INFO -->
    <div class="info">
        <table>
            <tr>
                <td><b>Anggota</b></td>
                <td>: mutinurul</td>
            </tr>
            <tr>
                <td><b>Petugas</b></td>
                <td>: -</td>
            </tr>
        </table>

        <table>
            <tr>
                <td><b>Tgl Pinjam</b></td>
                <td>: 2026-04-01</td>
            </tr>
            <tr>
                <td><b>Tgl Kembali</b></td>
                <td>: 2026-04-02</td>
            </tr>
        </table>
    </div>

    <hr>

    <!-- BUKU -->
    <b>📖 Buku yang Dipinjam</b>
    <table class="list">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Judul Buku</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Laut Bercerita</td>
            </tr>
        </tbody>
    </table>

    <!-- DENDA -->
    <div style="text-align:right; margin-top:15px;">
        <span class="denda">Total Denda: Rp 24.000</span>
    </div>

    <!-- FOOTER -->
    <div class="footer">
       <a href="<?= base_url('peminjaman') ?>" class="btn btn-back">Kembali</a>
        <a href="#" class="btn btn-success">Selesaikan Peminjaman</a>
    </div>

</div>