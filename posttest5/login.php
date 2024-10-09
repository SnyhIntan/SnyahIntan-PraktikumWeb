<?php
session_start();

function saveUser($data) {
    $file = fopen("users.txt", "a");
    fputcsv($file, $data);
    fclose($file);
}

function checkUser($email, $password) {
    $file = fopen("users.txt", "r");
    while (($data = fgetcsv($file)) !== FALSE) {
        if (count($data) >= 4 && $data[1] === $email && $data[3] === $password) {
            fclose($file);
            return $data;
        }
    }
    fclose($file);
    return null;
}

$message = "";
$name = $email = $usia = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['login'])) {
        // Login
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $user = checkUser($email, $password);
        if ($user) {
            $_SESSION['username'] = $user[0];
            $message = "Login berhasil!!! Selamat datang, " . $user[0];
            header('Location: produk.php'); 
            exit; 
        } else {
            $message = "Login gagal. Pastikan Email atau password benar!";
        }
    } elseif (isset($_POST['signup'])) {
        // Signup
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $usia = htmlspecialchars($_POST['usia']); 

        saveUser([$name, $email, $usia, $password]); 
        $message = "Registrasi berhasil! Silakan login.";
    }
}

?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saniyyah-posttest5</title>
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
