    <?php
include('db.php');
session_start();

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    $sql = "DELETE FROM dokter WHERE idDokter='$idDokter'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data dokter berhasil dihapus!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $conn->close();
    header("Location: dokter.php");
    exit();
}
?>
