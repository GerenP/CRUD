<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./dokter/dokter.php">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pasien/pasien.php">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./kunjungan/kunjungan.php">Kunjungan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h1 class="display-4">Selamat Datang di MyApp</h1>
        <p class="lead">Aplikasi manajemen dokter, pasien, dan kunjungan</p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Manajemen Dokter</h5>
                    <p class="card-text">Tambah, edit, dan hapus informasi dokter.</p>
                    <a href="./dokter/dokter.php" class="btn btn-primary">Kelola Dokter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Manajemen Pasien</h5>
                    <p class="card-text">Tambah, edit, dan hapus informasi pasien.</p>
                    <a href="./pasien/pasien.php" class="btn btn-primary">Kelola Pasien</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Manajemen Kunjungan</h5>
                    <p class="card-text">Tambah, edit, dan hapus informasi kunjungan.</p>
                    <a href="./kunjungan/kunjungan.php" class="btn btn-primary">Kelola Kunjungan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
