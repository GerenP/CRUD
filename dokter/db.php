    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geren_11pplg1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nmDokter = $_POST["nmDokter"];
    $spesialisasi = $_POST["spesialisasi"];
    $noTelp = $_POST["noTelp"];

    $sql = "INSERT INTO dokter (nmDokter, spesialisasi, noTelp) VALUES ('$nmDokter', '$spesialisasi', '$noTelp')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Data dokter berhasil ditambahkan.";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
        $_SESSION['message_type'] = "danger";
    }

    $conn->close();
    header("Location: tambahdokter.php");
    exit();
}
?>
