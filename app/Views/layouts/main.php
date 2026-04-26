<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> RikaApp </title>

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Body harus flex agar sidebar dan konten berdampingan */
        body {
            display: flex; 
            min-height: 100vh;
            margin: 0;
            background-color: #f3f0ff; /* Background ungu sangat muda */
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 260px; 
            background-color: #dcd6f7; /* Ungu Pastel */
            min-height: 100vh;
            flex-shrink: 0; /* Kunci agar tidak mendorong konten ke bawah */
            overflow-y: auto;
            border-right: 1px solid #c9bbff;
        }

        .content {
            flex-grow: 1; /* Konten akan mengambil sisa layar */
            min-width: 0; /* Mencegah overflow */
            background-color: #f3f0ff;
        }

        /* Styling menu sidebar agar rapi */
        .sidebar-menu a:hover {
            background: #b8afff; 
            color: #ffffff !important;
        }

        .menu-label {
            color: #7b68ee; 
            font-weight: bold;
            padding: 10px 15px;
            font-size: 12px;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div id="sidebar" class="sidebar">
        <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>