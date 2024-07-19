    <?php
include('db1.php');
session_start();

if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];

    // Prepare the DELETE statement
    $sql = "DELETE FROM kunjungan WHERE idKunjungan = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $idKunjungan);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Data kunjungan berhasil dihapus!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error: " . $stmt->error;
            $_SESSION['message_type'] = "danger";
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['message'] = "Error preparing the statement: " . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    // Close the connection
    $conn->close();
} else {
    $_SESSION['message'] = "ID kunjungan tidak ditemukan.";
    $_SESSION['message_type'] = "danger";
}

// Redirect to kunjungan.php
header("Location: kunjungan.php");
exit();
?>
