<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                        <a class="nav-link" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dokter.php">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../pasien/pasien.php">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kunjungan/kunjungan.php">Kunjungan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Tambah Data Pasien</h3>
                        <form action="koneksi.php" method="POST">
                            <div class="mb-3">
                                <label for="idPasien" class="form-label">ID Pasien</label>
                                <input type="text" class="form-control" id="idPasien" name="idPasien" placeholder="ID Pasien" required>
                            </div>
                            <div class="mb-3">
                                <label for="nmPasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nmPasien" name="nmPasien" placeholder="Nama Pasien" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="Perempuan" required>
                                    <label class="form-check-label" for="jk1">Perempuan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="jk2" value="Laki-Laki" required>
                                    <label class="form-check-label" for="jk2">Laki-Laki</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat" required></textarea>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
