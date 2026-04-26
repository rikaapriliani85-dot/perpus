<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4" style="background-color: #f3f0ff; min-height: 100vh;">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; background: linear-gradient(135deg, #ffffff 0%, #f4f3ff 100%); border-left: 5px solid #a29bfe;">
                <h4 class="fw-bold mb-1" style="color: #6c5ce7;">Dashboard</h4>
                <p class="text-muted mb-0">
                    Ini adalah Halaman Dashboard <br>
                    Selamat datang di <b style="color: #6c5ce7; letter-spacing: 1px;">Rika</b>App!
                </p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3 text-white" style="border-radius: 12px; background-color: #a29bfe;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="small opacity-75">Total Products</span>
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
                <h3 class="fw-bold mb-1">159</h3>
                <div class="mt-2 small">
                    <span class="badge bg-white bg-opacity-25">Stok Aman</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3 text-white" style="border-radius: 12px; background-color: #74b9ff;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="small opacity-75">Total Orders</span>
                    <i class="bi bi-cart-check fs-4"></i>
                </div>
                <h3 class="fw-bold mb-1">239</h3>
                <div class="mt-2 small">
                    <span class="badge bg-white bg-opacity-25">Bulan Ini</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3 text-white" style="border-radius: 12px; background-color: #fab1a0;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="small opacity-75">Pending Orders</span>
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <h3 class="fw-bold mb-1">84</h3>
                <div class="mt-2 small">
                    <span class="badge bg-white bg-opacity-25">Perlu Proses</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3 text-white" style="border-radius: 12px; background-color: #ff7675;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="small opacity-75">Cancelled Orders</span>
                    <i class="bi bi-x-circle fs-4"></i>
                </div>
                <h3 class="fw-bold mb-1">12</h3>
                <div class="mt-2 small">
                    <span class="badge bg-white bg-opacity-25">Turun 2%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; min-height: 300px;">
                <h5 class="fw-bold mb-4" style="color: #6c5ce7;">Total Revenue</h5>
                <div class="d-flex flex-column align-items-center justify-content-center text-muted" style="height: 200px; border: 2px dashed #dcd6f7; border-radius: 10px; background-color: #faf9ff;">
                   <i class="bi bi-bar-chart-line fs-1" style="color: #a29bfe;"></i>
                   <p class="mt-2">Area Grafik akan muncul di sini</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px; min-height: 300px;">
                <h5 class="fw-bold mb-4" style="color: #6c5ce7;">Profit This Week</h5>
                <div class="d-flex flex-column align-items-center justify-content-center text-muted" style="height: 200px; border: 2px dashed #dcd6f7; border-radius: 10px; background-color: #faf9ff;">
                   <i class="bi bi-graph-up-arrow fs-1" style="color: #a29bfe;"></i>
                   <p class="mt-2">Data Mingguan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>