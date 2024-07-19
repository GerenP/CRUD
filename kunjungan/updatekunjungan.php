    <?php
include('db1.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idKunjungan = $_POST["idKunjungan"];
    $idPasien = $_POST["idPasien"];
    $idDokter = $_POST["idDokter"];
    $tanggal = $_POST["tanggal"];
    $keluhan = $_POST["keluhan"];

    $sql = "UPDATE kunjungan SET idPasien = '$idPasien', idDokter = '$idDokter', tanggal = '$tanggal', keluhan = '$keluhan' WHERE idKunjungan = $idKunjungan";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data kunjungan berhasil diperbarui.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $conn->close();
    header("Location: kunjungan.php");
    exit();
}
?>