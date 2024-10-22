<?php
session_start();
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
        <section class="hero">
            <div class="container">
                <div class="text">
                    <h1 class="h1">
                        <span>Introducing HNI-HPAI</span><br><br>
                    </h1>
                    <div class="image1">
                        <img src="img/hni-logo.png" alt="HNI-HPAI"> 
                    </div> <br> <br>
                    <div>
                        <p class="p2">PT Herba Penawar Alwahida Indonesia, yang kemudian dikenal sebagai HPAI, merupakan salah satu perusahaan Bisnis Halal Network di Indonesia yang fokus pada penyediaan produk-produk barang konsumsi (consumer goods) yang halal dan berkualitas. HPAI, sesuai dengan akta pendirian perusahaan, secara resmi didirikan pada tanggal 19 Maret 2012.
                                    HPAI merupakan hasil dari perjuangan panjang dengan tujuan untuk menjayakan produk-produk halal berkualitas yang berazaskan Thibbunnabawi; membumikan, memajukan, dan mengaktualisasikan ekonomi Islam di Indonesia melalui enterpreneurship, dan juga turut serta dalam memberdayakan dan mengangkat UMKM nasional.</p>
                    </div>
                    <div class="p2">
                        <h2>VISI & MISI</h2> <br>
                        <p>Menjadi Pemimpin Industri Halal Kelas Dunia (dari Indonesia)</p><br>
                        <ul>
                            <li>Menjadi perusahaan jaringan pemasaran papan atas kebanggaan bangsa.</li>
                            <li>Menjadi wadah perjuangan penyediaan produk halal.</li>
                            <li>Menghasilkan pengusaha-pengusaha nasional yang dapat dibanggakan, baik sebagai pemasar, pembangun jaringan maupun produsen.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="column">
                    <ul>
                        <li>PT HPAI - Halal Network International (HNI)</li> <br>
                        <li><b>Head Office :</b></li>
                        <li>HNI PLAZA, Jl. Raya Kalimalang - Billy Moon, RT 03 RW 10, Pondok Kelapa, Duren Sawit, Jakarta Timur 13450</li>
                        <li><b>Leaders Office : </b></li>
                        <li>Komplek Sentra Kota Jatibening Blok F1-F5 RT001/RW003, Jatibening Baru, Pondok Gede, Kota Bekasi, Jawa Barat 17412</li>
                    </ul>
                </div>
                <div class="column">
                    <ul>
                        <li><p><b>Layanan HALO HNI</b><br>Senin - Jum'at 08.00 - 17.00</p></li> <br>
                        <li><a href="tel:1234567890"><i class="fa-solid fa-phone"></i> 123-456-7890</a></li>
                        <li><a href="tel:+6287886416000">+62 878-8641-6000</a></li><br>
                        <li><b>Email & Telegram: 24 jam</b> <br>
                            <a href="mailto:crm@hni.net" target="_blank"><i class="fa-solid fa-envelope"></i> crm@hni.net</a><br>
                            <a href="https://t.me/halohnibot"target="_blank"><i class="fa-brands fa-telegram"></i> @halohnibot</a><br>                            
                        </li>                        
                    </ul>
                </div>
                <div class="column">
                    <ul>
                        <li><p><b>Ikuti Kami</b></p>
                            <a href="https://www.facebook.com/pthpai?ref=hl" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.instagram.com/pthpai/?hl=e" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://x.com/pthpai" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://youtube.com/@sangagenhni7669?si=l_vdZwe7r8zQylxA" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>    
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>