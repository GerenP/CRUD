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
          <a class="nav-link active" aria-current="page" href="dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pasien/pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../kunjungan/kunjungan.php">Kunjungan</a>
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
                    <input type="text" class="form-control" id="nmDokter" name="nmDokter" required>
                </div>
                <div class="mb-3">
                    <label for="spesialisasi" class="form-label">Spesialisasi:</label>
                    <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" required>
                </div>
                <div class="mb-3">
                    <label for="noTelp" class="form-label">No Telepon:</label>
                    <input type="text" class="form-control" id="noTelp" name="noTelp" required>
                </div>
                <a href="dokter.php" class="btn btn-primary">Tambah</a>
                <a href="dokter.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
