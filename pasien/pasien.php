<?php
session_start(); // Start the session to access session variables
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
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
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #b21f2d;
        }
        .modal-header {
            background-color: #dc3545;
            color: white;
        }
        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .modal-footer .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .alert-dismissible {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
        }
        .table-filter {
            margin-bottom: 20px;
        }
        .table-filter input {
            width: 100%;
            padding: 10px;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
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
          <a class="nav-link" href="../dokter/dokter.php">Dokter</a>
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

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-sm">
            <h3>Tabel Pasien</h3>
        </div>
        <div class="col-sm text-end">
            <a href="tambahpasien.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="table-filter mb-3">
        <input type="text" id="searchInput" placeholder="Cari berdasarkan ID atau Nama" class="form-control">
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $hasil = $koneksi->query("SELECT * FROM pasien");

                    while ($row = $hasil->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['idPasien']; ?></td>
                            <td><?= $row['nmPasien']; ?></td>
                            <td><?= $row['jk']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td>
                                <a href="editpasien.php?edit=<?= $row['idPasien']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['idPasien']; ?>)"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
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

<?php if (isset($_SESSION['deleted'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['deleted']); ?>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let deleteId;

    function confirmDelete(id) {
        deleteId = id;
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    document.getElementById('confirmDelete').addEventListener('click', function() {
        window.location.href = `deletepasien.php?idPasien=${deleteId}`;
    });

    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#tableBody tr');
        rows.forEach(row => {
            const id = row.cells[1].textContent.toLowerCase();
            const name = row.cells[2].textContent.toLowerCase();
            row.style.display = id.includes(searchTerm) || name.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
</body>
</html>
