<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM pembelian";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest5</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></head>
    <style>
        .container-database {
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container-database h1 {
            text-align: center;
            color: #333;
        }

        .container-database table {
            width: 100%;
            border-collapse: collapse;
        }

        .container-database th, .container-database td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .container-database th {
            background-color: #f2f2f2;
            color: #333;
        }

        .container-database td {
            background-color: #ffffff;
        }

        .action-buttons {
            display: flex; 
            gap: 3px;
        }

        form input[type="submit"] {
            margin-right: 10px; 
            padding: 5px 10px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049; 
        }

        @media (max-width: 768px) {
            .container-database {
                display: block;
                overflow-x: auto; 
            }

            .container-database table {
                width: 300px; 
            }
            .container-database table, 
            .container-database th, 
            .container-database td {
                font-size: 6px; 
                padding: 0px; 
            }

            .container-database h1{
                font-size: 20px;
            }

            .action-buttons {
                display: flex; 
                flex-direction: row; 
                gap: 2px; 
            }

            form input[type="submit"] {
                font-size: 5px; 
                padding: 3px;
            }

            form input[type="submit"] {
                margin: 1px; 
                padding: 0px 2px;
                border-radius: 2px;
            }
        }

    </style>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="#">
                <img src="img/hni-logo.png" alt="HNI-HPAI" style="height: 40px;"> HNI-HPAI
            </a>
        </div>        
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="produk.php">Product</a></li>
            <li><a href="about.html">HNI-HPAI</a></li>
            <li><a href="biodata.html">About Me</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
          </ul>
        </nav>
        <div>
          <div class="hamburger-menu" onclick="toggleMenu()">
            <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
          </div>
          <div>
            <div id="menu" class="menu">
              <ul>
                <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="produk.php"><i class="fas fa-box"></i> Product</a></li>
                <li><a href="about.html"><i class="fas fa-user"></i> HNI-HPAI</a></li>
                <li><a href="biodata.html"><i class="fas fa-envelope"></i> About Me</a></li>
                <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                <li><a href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
                <li><a href="dbpembelian.php"><i class="fa-solid fa-database"></i></i>DataBase</a></li>
              </ul>
              <button class="button-burger" id="theme-toggle">Dark Mode</button>
            </div>            
          </div>
      </div>
    </div>
  </header>
<main>
    <div class="wrapper">
        <div class="container-database">
            <h1>Data Pembelian</h1>
            <table border=2 cellspacing="5" cellpadding="10">
                <tr>
                    <th>ID Pembelian</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total Pembayaran</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>Rp " . number_format($row['jumlah'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>
                                <div class='action-buttons'>
                                    <form method='POST' action='update.php'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <input type='submit' name='edit' value='Edit'>
                                    </form>
                                    <form method='POST' action='delete.php'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <input type='submit' name='hapus' value='Hapus'>
                                    </form>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data pembelian</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</main>
<script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
