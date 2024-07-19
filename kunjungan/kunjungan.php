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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            margin-top: 20px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
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
        .alert {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 1050;
        }
        .btn-sm {
            font-size: 0.875rem;
        }
        .table-filter {
            margin-bottom: 20px;
        }
        .table-filter input {
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            padding: 0.5rem 1rem;
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

    <div class="table-filter mb-3">
        <input type="text" id="searchInput" placeholder="Search by ID Kunjungan" class="form-control">
    </div>

    <a href="tambahkunjungan.php" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Kunjungan"><i class="fas fa-plus"></i> Tambah Kunjungan</a>
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
        <tbody id="tableBody">
            <?php
            $no = 1;
            $hasil = $conn->query("SELECT * FROM kunjungan");

            while ($row = $hasil->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $row['idKunjungan']; ?></td>
                <td><?= $row['idPasien']; ?></td>
                <td><?= $row['idDokter']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['keluhan']; ?></td>
                <td>
                    <a href="editkunjungan.php?id=<?= $row['idKunjungan']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['idKunjungan']; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></a>
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

    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                const id = row.cells[0].textContent.toLowerCase();
                if (id.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipTriggerList.forEach(tooltipTriggerEl => {
          new bootstrap.Tooltip(tooltipTriggerEl);
        });
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
