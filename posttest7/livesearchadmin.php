<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = $conn->prepare("SELECT * FROM pembelian WHERE nama LIKE ?");
    $likeSearch = '%' . $search . '%';
    $stmt->bind_param('s', $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $direktori = "img_produk/" . $row["gambar"];
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>";
            if ($row["gambar"] == "") {
                echo "Gambar belum ada";
            } else {
                echo "<img src='$direktori' alt='Gambar Produk' class='gambar-produk'>";
            }
            echo "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>Rp " . number_format($row['jumlah'], 2, ',', '.') . "</td>";
            echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>
                    <div class='action-buttons'>
                        <form method='POST' action='update.php'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <input type='submit' name='edit' value='Edit'>
                        </form>
                        <form method='POST' action='delete.php'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                            <input type='submit' name='hapus' value='Hapus'>
                        </form>
                    </div>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data pembelian ditemukan</td></tr>";
    }

    $stmt->close();
}
$conn->close();
?>