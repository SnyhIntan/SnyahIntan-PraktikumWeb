<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtoko';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = intval($_POST['harga']);
    $gambar_produk = $_POST['gambar'];

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $nama_produk) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'name' => $nama_produk,
            'price' => $harga,
            'quantity' => 1,
            'image' => $gambar_produk
        ];
    }

    echo "Produk '{$nama_produk}' telah ditambahkan ke keranjang.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'remove') {
        $index = intval($_POST['index']);

        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<diV >Produk telah dihapus dari keranjang.</div>";
        } else {
            echo "Produk tidak ditemukan di keranjang.";
        }
        exit;
    }

    if ($_POST['action'] === 'update') {
        $index = intval($_POST['index']);
        $quantity = intval($_POST['quantity']);

        if (isset($_SESSION['cart'][$index]) && $quantity > 0) {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
            echo "Jumlah produk telah diperbarui.";
        } else {
            echo "Jumlah harus lebih dari nol.";
        }
        exit;
    }

    if ($_POST['action'] === 'checkout') {
        $totalBayar = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalBayar += $item['price'] * $item['quantity'];
        }

        $stmt = $conn->prepare("INSERT INTO pembelian (nama, harga, quantity, jumlah, tanggal) VALUES (?, ?, ?, ?, NOW())");        
        foreach ($_SESSION['cart'] as $item) {
            $nama_produk = $item['name'];
            $harga = $item['price'];
            $quantity = $item['quantity'];

            $jumlah = $harga * $quantity;

            $stmt->bind_param("siii", $nama_produk, $harga, $quantity, $jumlah);
            if (!$stmt->execute()) {
                echo "Error: " . $conn->error;
            }
        }

        $_SESSION['cart'] = [];
        header("Location: checkout.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest6</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></head>
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
  <main class="isi">
  <?php
    if (empty($_SESSION['cart'])) {
        echo "<h3>Keranjang belanja kosong.</h3>";
    } else {
        echo "<h1>Keranjang Belanja</h1>";
        $total_harga = 0;
        foreach ($_SESSION['cart'] as $index => $item) {
            if (!is_numeric($item['price'])) {
                continue; 
            }
            echo "<div class='cart-item'>";
            echo "<h3>" . htmlspecialchars($item['name']) . "</h3>";
            echo "<p>Harga  : Rp " . number_format($item['price'], 0, ',', '.') . "</p>";
            echo "<p>Jumlah : " . $item['quantity'] . "</p>";

            $subtotal = $item['price'] * $item['quantity'];
            $total_harga += $subtotal;

            echo "<form method='POST' class='update-form';'>";
            echo "<input type='hidden' name='action' value='update'>";
            echo "<input type='hidden' name='index' value='{$index}'>";
            echo "<input type='number' class='quantity-input' name='quantity' value='" . $item['quantity'] . "' min='1'>";
            echo "<button type='submit' class='button-cart'>Update Jumlah</button>";
            echo "</form>";

            echo "<form method='POST' class='remove-form'>";
            echo "<input type='hidden' name='action' value='remove'>";
            echo "<input type='hidden' name='index' value='{$index}'>";
            echo "<button type='submit'class='button-cart'>Hapus</button>";
            echo "</form>";
            echo "</div><hr>";
        }

        echo "<div>";
        echo "<h3>Total Harga: Rp " . number_format($total_harga, 0, ',', '.') . "</h3>";
        echo "<form method='POST' style='text-align: center;'>";
        echo "<input type='hidden' name='action' value='checkout'>";
        echo "<button type='submit' class='button-checkout'>Checkout</button>";
        echo "</form>";
    }
  ?>
  </main>
  <footer>
    <div class="container">
        <a href="https://classroom.google.com/u/1/c/NzA1MzMyNzkzODU2">Posttest5</a>
        &copy; Saniyyah Intan Salsabiila 2309106004
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>