    <?php
include('db1.php');
session_start();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM kunjungan WHERE idKunjungan = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kunjungan</title>
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
          <a class="nav-link active" aria-current="page" href="kunjungan.php">Kunjungan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../dokter/dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pasien/pasien.php">Pasien</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Edit Kunjungan</h2>
    <div class="card">
        <div class="card-body">
            <form action="updatekunjungan.php" method="POST">
                <input type="hidden" name="idKunjungan" value="<?php echo $row['idKunjungan']; ?>">
                <div class="mb-3">
                    <label for="idPasien" class="form-label">ID Pasien:</label>
                    <input type="number" class="form-control" id="idPasien" name="idPasien" value="<?php echo $row['idPasien']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="idDokter" class="form-label">ID Dokter:</label>
                    <input type="number" class="form-control" id="idDokter" name="idDokter" value="<?php echo $row['idDokter']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan:</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required><?php echo $row['keluhan']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
