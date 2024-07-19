<?php
include('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dokter</title>
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
        .btn-success, .btn-warning, .btn-danger {
            border-radius: 0.375rem;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
        .table-filter {
            margin-bottom: 20px;
        }
        .table-filter input {
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            padding: 0.5rem 1rem;
        }
        .btn-sm {
            font-size: 0.875rem;
        }
        .table th.sortable:hover {
            cursor: pointer;
            background-color: #e9ecef;
        }
        .table th.sortable::after {
            content: ' ▼';
            font-size: 0.8em;
            color: #000;
        }
        .table th.sorted-asc::after {
            content: ' ▲';
        }
        .table th.sorted-desc::after {
            content: ' ▼';
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
    <h2 class="mb-4">Daftar Dokter</h2>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
    <?php endif; ?>
    <div class="table-filter mb-3">
        <input type="text" id="searchInput" placeholder="Search by ID Dokter" class="form-control">
    </div>
    <div class="mb-3">
        <a href="tambahdokter.php" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Dokter"><i class="fas fa-plus"></i> Tambah Dokter</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="sortable" data-sort="no">No</th>
                <th class="sortable" data-sort="idDokter">ID Dokter</th>
                <th class="sortable" data-sort="nmDokter">Nama Dokter</th>
                <th class="sortable" data-sort="spesialisasi">Spesialisasi</th>
                <th class="sortable" data-sort="noTelp">No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            $no = 1;
            $hasil = $conn->query("SELECT * FROM dokter");

            while ($row = $hasil->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['idDokter']; ?></td>
                <td><?= $row['nmDokter']; ?></td>
                <td><?= $row['spesialisasi']; ?></td>
                <td><?= $row['noTelp']; ?></td>
                <td>
                    <a href="editdokter.php?id=<?= $row['idDokter']; ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['idDokter']; ?>)" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Pagination (optional) -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item active" aria-current="page">
                <span class="page-link">1</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
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
        window.location.href = `hapusdokter.php?idDokter=${deleteId}`;
    });

    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                const id = row.cells[1].textContent.toLowerCase();
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

        const sortableHeaders = document.querySelectorAll('.sortable');
        sortableHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const sortKey = header.getAttribute('data-sort');
                sortTable(sortKey);
            });
        });

        function sortTable(key) {
            const table = document.querySelector('table');
            const rowsArray = Array.from(table.querySelectorAll('tbody tr'));
            const isAscending = header.classList.contains('sorted-asc');
            
            rowsArray.sort((a, b) => {
                const aValue = a.querySelector(`td[data-key="${key}"]`).textContent.trim();
                const bValue = b.querySelector(`td[data-key="${key}"]`).textContent.trim();

                if (isAscending) {
                    return aValue.localeCompare(bValue);
                } else {
                    return bValue.localeCompare(aValue);
                }
            });

            const tbody = table.querySelector('tbody');
            rowsArray.forEach(row => tbody.appendChild(row));

            sortableHeaders.forEach(h => h.classList.remove('sorted-asc', 'sorted-desc'));
            header.classList.add(isAscending ? 'sorted-desc' : 'sorted-asc');
        }

        <?php
        if (isset($_SESSION['deleted'])) {
            echo "alert('Data berhasil dihapus!');";
            unset($_SESSION['deleted']);
        }
        ?>
    });
</script>
</body>
</html>
