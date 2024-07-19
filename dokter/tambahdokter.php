<?php
session_start(); // Start the session to access session variables
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
        }
        .navbar {
            background-color: #004d40; /* Dark teal */
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link.active {
            color: #00e676; /* Bright green */
        }
        .container {
            margin-top: 30px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-body {
            background: #ffffff;
        }
        .btn-primary, .btn-secondary {
            transition: all 0.3s;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .alert-dismissible {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
            width: 300px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dokter.php">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pasien/pasien.php">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kunjungan/kunjungan.php">Visits</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-4">
    <h2 class="mb-4">Tambah Dokter</h2>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-body">
            <form action="proses_tambah_dokter.php" method="POST">
                <div class="mb-3">
                    <label for="nmDokter" class="form-label">Nama Dokter:</label>
                    <input type="text" class="form-control" id="nmDokter" name="nmDokter" placeholder="Masukkan nama dokter" required>
                </div>
                <div class="mb-3">
                    <label for="spesialisasi" class="form-label">Spesialisasi:</label>
                    <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Masukkan spesialisasi" required>
                </div>
                <div class="mb-3">
                    <label for="noTelp" class="form-label">No Telepon:</label>
                    <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Masukkan no telepon" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="dokter.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
