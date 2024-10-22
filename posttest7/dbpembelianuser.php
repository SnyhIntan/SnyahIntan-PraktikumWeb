<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

session_start();
    if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "User") {
        header("Location: dbpembelian.php");
    }

// bagian search
$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM pembelian" . ($search ? " WHERE nama LIKE '%$search%'" : "");
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest7</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></head>
    <style>
        .container-database {
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            top: 50px;
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

        .dark-mode .container-database {
            background-color: #2c2c2c;
            color: #ffffff;
        }

        .dark-mode .container-database h1 {
            color: #ffffff;
        }

        .dark-mode .container-database th {
            background-color: #555;
            color: #ffffff;
        }

        .dark-mode .container-database td {
            background-color: #444;
            color: #ffffff;
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

        .gambar-produk {
            width: 100px;
            height: 100px;
            object-fit: cover; 
            border-radius: 3px; 
            border: 1px solid #ddd; 
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #f2f2f2;
            padding: 8px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .search-input {
            flex-grow: 1;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            width: 1000px;
        }

        .search-icon {
            display: inline-block;
            padding: 10px;
            background-color: #ffffff; 
            border-radius: 50%;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .search-icon i {
            color: #333;
            font-size: 18px;
            transition: color 0.3s;
        }

        .search-input:focus {
            border-color: #3cc328; 
        }

        .search-icon:hover {
            background-color: #ffffff;
        }

        .search-icon:hover i {
            color: #3cc328;
        }

        .dark-mode .search-container {
            background-color: #333;
        }

        .dark-mode .search-input {
            background-color: #444;
            color: #fff;
            border-color: #555;
        }

        .dark-mode .search-icon {
            background-color: #555;
        }

        .dark-mode .search-icon i {
            color: #fff;
        }

        .dark-mode .search-input:focus {
            border-color: #ffd700;
        }

        #search-results {
            margin-top: 10px;
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

            .search-container {
                flex-direction: column; 
                align-items: flex-start;
                padding: 5px;
            }

            .search-input {
                width: 240px; 
                margin-bottom: 10px;
                padding: 5px;
                font-size: 10px; 
            }
            .search-icon {
                padding: 5px;
                width: 30px;
                margin: 5px; 
                text-align: center;
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
            <li><a href="index.php">Home</a></li>
            <li><a href="produk.php">Product</a></li>
            <li><a href="about.php">HNI-HPAI</a></li>
            <li><a href="biodata.php">About Me</a></li>
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
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="produk.php"><i class="fas fa-box"></i> Product</a></li>
                <li><a href="about.php"><i class="fas fa-user"></i> HNI-HPAI</a></li>
                <li><a href="biodata.php"><i class="fas fa-envelope"></i> About Me</a></li>
                <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                <li><a href="keranjang.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
                <li>
                  <a href="<?php 
                      if (isset($_SESSION['role'])) {
                          echo ($_SESSION['role'] === 'Admin') ? 'dbpembelian.php' : 'dbpembelianuser.php';
                      } else {
                          echo 'login.php';
                      }?>"><i class="fa-solid fa-database"></i>DataBase</a>
                </li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
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
            <div class="search-container">
                <form id="searchForm" method="POST" action="">
                    <input type="text" name="search" id="searchInput" placeholder="Cari produk..." class="search-input" value="<?php echo htmlspecialchars($search); ?>">
                    <a href="#" class="search-icon" onclick="event.preventDefault();">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </form>
            </div>
            
            <table border="2" cellspacing="5" cellpadding="10" id="mainTable">
                <tr>
                    <th>ID Pembelian</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total Pembayaran</th>
                    <th>Tanggal</th>
                </tr>
                
                <?php
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchInput').on('keyup', function() {
            var keyword = $(this).val();
            if (keyword.length > 0) {
                $.ajax({
                    url: 'livesearch.php',
                    method: 'POST',
                    data: {search: keyword},
                    success: function(data) {
                        $('#mainTable tr:not(:first)').remove(); 
                        $('#mainTable').append(data);
                    }
                });
            } else {
                $.ajax({
                    url: 'livesearch.php',
                    method: 'POST',
                    data: {search: ''},
                    success: function(data) {
                        $('#mainTable tr:not(:first)').remove(); 
                        $('#mainTable').append(data); 
                    }
                });
            }
        });
    });
</script>
</body>
</html>
<?php
$conn->close();
?>