<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
.container {
    max-width: 500px;
    margin: 40px auto;
    font-family: Arial;
}

.card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 14px;
    font-weight: bold;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #3498db;
}

textarea {
    min-height: 80px;
    resize: vertical;
}

/* Rating bintang */
.star-rating {
    display: flex;
    gap: 5px;
    font-size: 22px;
    cursor: pointer;
}

.star {
    color: #ccc;
}

.star.active {
    color: #f1c40f;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    color: white;
}

.btn-update { background: #2ecc71; }
.btn-back { background: #7f8c8d; }
</style>

<div class="container">
    <div class="card">

        <div class="title">✏️ Edit Ulasan</div>

        <form action="<?= base_url('ulasan/update/'.$ulasan['id_ulasan']) ?>" method="post">

            <!-- RATING -->
            <div class="form-group">
                <label>Rating</label>
                <div class="star-rating" id="starRating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star <?= $i <= $ulasan['rating'] ? 'active' : '' ?>" data-value="<?= $i ?>">★</span>
                    <?php endfor; ?>
                </div>
                <input type="hidden" name="rating" id="ratingInput" value="<?= $ulasan['rating'] ?>">
            </div>

            <!-- KOMENTAR -->
            <div class="form-group">
                <label>Komentar</label>
                <textarea name="komentar"><?= $ulasan['komentar'] ?></textarea>
            </div>

            <!-- TANGGAL -->
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?= $ulasan['tanggal'] ?>">
            </div>

            <!-- BUTTON -->
            <div class="btn-group">
                <a href="<?= base_url('ulasan') ?>" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-update">Update</button>
            </div>

        </form>

    </div>
</div>

<script>
const stars = document.querySelectorAll('.star');
const input = document.getElementById('ratingInput');

stars.forEach(star => {
    star.addEventListener('click', function() {
        let value = this.getAttribute('data-value');
        input.value = value;

        stars.forEach(s => s.classList.remove('active'));
        for (let i = 0; i < value; i++) {
            stars[i].classList.add('active');
        }
    });
});
</script>

<?= $this->endSection() ?>