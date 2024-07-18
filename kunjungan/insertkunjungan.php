    <?php
include('db1.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPasien = $_POST["idPasien"];
    $idDokter = $_POST["idDokter"];
    $tanggal = $_POST["tanggal"];
    $keluhan = $_POST["keluhan"];

    $sql = "INSERT INTO kunjungan (idPasien, idDokter, tanggal, keluhan) VALUES ('$idPasien', '$idDokter', '$tanggal', '$keluhan')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data kunjungan berhasil ditambahkan.";
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
