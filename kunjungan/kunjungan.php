<?php
include('db1.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Kunjungan</title>
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
    <h2 class="mb-4">Daftar Kunjungan</h2>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    
    <a href="tambahkunjungan.php" class="btn btn-primary mb-3">Tambah Kunjungan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Kunjungan</th>
                <th>ID Pasien</th>
                <th>ID Dokter</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $hasil = $conn->query("SELECT * FROM kunjungan");

            while ($row = $hasil->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['idKunjungan']; ?></td>
                <td><?= $row['idPasien']; ?></td>
                <td><?= $row['idDokter']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['keluhan']; ?></td>
                <td>
                    <a href="editskunjungan.php?id=<?= $row['idKunjungan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['idKunjungan']; ?>)">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let deleteId;

    function confirmDelete(id) {
        deleteId = id;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    document.getElementById('confirmDelete').addEventListener('click', function() {
        window.location.href = `hapuskunjungan.php?idKunjungan=${deleteId}`;
    });

    <?php
    if (isset($_SESSION['deleted'])) {
        echo "alert('Data berhasil dihapus!');";
        unset($_SESSION['deleted']);
    }
    ?>
    </script>
</body>
</html>