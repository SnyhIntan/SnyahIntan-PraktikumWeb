<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "SELECT * FROM pembelian WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pembelian = $result->fetch_assoc();

    if (!$pembelian) {
        echo "Data tidak ditemukan.";
        exit;
    }
}

if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama_produk = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $quantity = intval($_POST['quantity']);
    $jumlah = $harga * $quantity;

    $update_sql = "UPDATE pembelian SET nama = ?, harga = ?, quantity = ?, jumlah = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('siiii', $nama_produk, $harga, $quantity, $jumlah, $id);

    if ($stmt->execute()) {
        echo "Data pembelian telah diperbarui.";
        header("Location: dbpembelian.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest5</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Data Pembelian</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $pembelian['id']; ?>">
        <label>Nama Produk:</label>
        <input type="text" name="nama" value="<?php echo $pembelian['nama']; ?>" required>
        <label>Harga:</label>
        <input type="number" name="harga" value="<?php echo $pembelian['harga']; ?>" required>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $pembelian['quantity']; ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

<?php
$conn->close();
?>
