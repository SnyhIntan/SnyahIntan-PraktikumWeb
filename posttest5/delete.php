<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM pembelian WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data pembelian berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: dbpembelian.php");
    exit;
}
?>
