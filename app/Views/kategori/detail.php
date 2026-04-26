<!DOCTYPE html>
<html>
<head>
    <title>Detail Kategori</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .row {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>📄 Detail Kategori</h2>

        <div class="row">
            <span class="label">ID Kategori :</span>
            <?= $kategori['id_kategori']; ?>
        </div>

        <div class="row">
            <span class="label">Nama Kategori :</span>
            <?= $kategori['nama_kategori']; ?>
        </div>

        <a href="/perpus/kategori" class="btn">⬅ Kembali</a>
    </div>
</div>

</body>
</html>