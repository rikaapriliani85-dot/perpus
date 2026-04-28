<h2>Tambah Anggota</h2>

<form action="/anggota/store" method="post">

    Nama Anggota:<br>
    <input type="text" name="nama_anggota"><br><br>

    Alamat:<br>
    <textarea name="alamat"></textarea><br><br>

    No HP:<br>
    <input type="text" name="no_hp"><br><br>

    <button type="submit">Simpan</button>
</form>
 <label>📖 Pilih Buku (bisa lebih dari 1)</label>

    <div class="buku-grid">

        <?php foreach ($buku as $b): ?>
        <label class="buku-item">

            <input type="checkbox" name="id_buku[]" value="<?= $b['id_buku'] ?>">

            <div style="margin-top:8px;">
                <?php if (!empty($b['cover'])): ?>
                    <img src="<?= base_url('uploads/buku/' . $b['cover']) ?>">
                <?php else: ?>
                    <div style="width:70px;height:95px;background:#ddd;
                        display:flex;align-items:center;justify-content:center;
                        border-radius:8px;font-size:11px;margin:auto;">
                        No Cover
                    </div>
                <?php endif; ?>
            </div>

            <div class="buku-title">
                <?= esc($b['judul']) ?>
            </div>

        </label>
        <?php endforeach; ?>

    </div>

    <br>
    