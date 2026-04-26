<!DOCTYPE html>
<html>
<head>
    <title>Perpus</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<div class="sidebar">
    <h3>MENU</h3>
    <a href="/dashboard">Dashboard</a>
    <a href="/buku">Buku</a>
    <a href="/peminjaman">Peminjaman</a>
</div>

<div class="content">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>