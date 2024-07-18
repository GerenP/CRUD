<?php
include('db.php');
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM dokter WHERE idDokter=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDokter = $_POST["idDokter"];
    $nmDokter = $_POST["nmDokter"];
    $spesialisasi = $_POST["spesialisasi"];
    $noTelp = $_POST["noTelp"];

    $sql = "UPDATE dokter SET nmDokter='$nmDokter', spesialisasi='$spesialisasi', noTelp='$noTelp' WHERE idDokter=$idDokter";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data dokter berhasil diperbarui!";
        $_SESSION['message_type'] = "success";
        header("Location: dokter.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokter</title>
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
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kunjungan.php">Kunjungan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Edit Dokter</h2>
    <form action="editdokter.php" method="POST">
        <input type="hidden" name="idDokter" value="<?php echo $row["idDokter"]; ?>">
        <div class="form-group mb-3">
            <label for="nmDokter">Nama Dokter:</label>
            <input type="text" class="form-control" id="nmDokter" name="nmDokter" value="<?php echo $row["nmDokter"]; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="spesialisasi">Spesialisasi:</label>
            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?php echo $row["spesialisasi"]; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="noTelp">No Telepon:</label>
            <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?php echo $row["noTelp"]; ?>" required>
        </div>
        <a href="dokter.php" type="submit" class="btn btn-primary">Update</a>
        </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
