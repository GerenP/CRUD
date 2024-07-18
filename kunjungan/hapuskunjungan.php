    <?php
include('db1.php');
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM kunjungan WHERE idKunjungan = $id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Data kunjungan berhasil dihapus.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    $_SESSION['message_type'] = "danger";
}

$conn->close();
header("Location: kunjungan.php");
exit();
?>
