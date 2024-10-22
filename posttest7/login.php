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

$message = '';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "
        <script>
            alert('Email Telah Digunakan!!');
            document.location.href = 'registrasi.php';
        </script>";
    } else {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, usia, password, role) VALUES ('$name', '$email', '$usia', '$hashPassword', '$role')";

        if (mysqli_query($conn, $query)) {
            echo "
            <script>
                alert('Berhasil Registrasi!');
                document.location.href = 'login.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal Registrasi!');
                document.location.href = 'registrasi.php';
            </script>";
        }
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION["login"] = true;

            if ($user["role"] === "admin") {
                $_SESSION["role"] = "Admin";
                echo "
                <script>
                    alert('Selamat Datang, Admin $name <3!!');
                    document.location.href = 'dbpembelian.php';
                </script>";
            } else {
                $_SESSION["role"] = "User";
                echo "
                <script>
                    alert('Selamat Datang, User $name <3!!');
                    document.location.href = 'index.php';
                </script>";
            }

        } else {
            $message = "Login gagal. Pastikan Email atau password benar!";
            // echo "
            // <script>
            //     alert('Password salah!');
            // </script>";
        }   

    } else {
        $message = "Upss... Email Tidak Ditemukan!!!!";
        // echo "
        // <script>
        //     alert('Email tidak ditemukan!');
        // </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest7</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
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
        <div class="container-login">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img src="img/logo-2.jpg" alt="">
                </div>
                <div class="back">
                    <img class="backImg" src="img/logo-2.jpg" alt="">
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Login</div>
                        <form action="" method="POST">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>                                   
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="text"><a href="#">Forgot password?</a></div>
                                <div class="button input-box">
                                    <input type="submit" name="login" value="Login">
                                </div>
                                <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
                            </div>
                        </form>
                    </div>
                    <div class="signup-form">
                        <div class="title">Signup</div>
                        <form action="" method="POST">
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="input-box">                                        
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-birthday-cake"></i>
                                    <input type="text" name="usia" placeholder="Enter your age" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <select class="input-box"  name="role" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="button input-box">
                                    <input type="submit" name="signup" value="Signup">
                                </div>
                                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (!empty($message)): ?>
                <div class="message-box <?php echo strpos($message, 'berhasil') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($name) && isset($_POST['signup'])): ?>
        <div class="result-container">
            <h2>Data yang Diterima:</h2>
            <p>Nama: <?php echo htmlspecialchars($name); ?></p>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <p>Usia: <?php echo htmlspecialchars($usia); ?></p>
        </div>
    <?php endif; ?>
 </main>
    <script src="script.js"></script>
</body>
</html>
