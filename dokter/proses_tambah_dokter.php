    <?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];

    // Validasi input (tambahkan validasi lebih lanjut jika diperlukan)
    if (!empty($nmDokter) && !empty($spesialisasi) && !empty($noTelp)) {
        // Menyiapkan query untuk menambahkan data dokter ke dalam database
        $query = "INSERT INTO dokter (nmDokter, spesialisasi, noTelp) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sss", $nmDokter, $spesialisasi, $noTelp);

        // Eksekusi query
        if ($stmt->execute()) {
            $_SESSION['message'] = "Dokter berhasil ditambahkan!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Gagal menambahkan dokter!";
            $_SESSION['message_type'] = "danger";
        }

        // Menutup statement
        $stmt->close();
    } else {
        $_SESSION['message'] = "Semua bidang harus diisi!";
        $_SESSION['message_type'] = "warning";
    }

    // Redirect ke halaman dokter
    header("Location: dokter.php");
    exit();
} else {
    $_SESSION['message'] = "Metode tidak valid!";
    $_SESSION['message_type'] = "danger";
    header("Location: dokter.php");
    exit();
}
?>
