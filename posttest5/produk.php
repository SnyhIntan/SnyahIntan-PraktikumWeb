<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $harga = htmlspecialchars($_POST['harga']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; 
    }

    $_SESSION['cart'][] = [
        'name' => $nama_produk,
        'price' => $harga,
        'quantity' => 1,
        'image' => $gambar_produk 
    ];

    header('Location: keranjang.php'); 
    exit;
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
    <section class="product-categories">
        <div class="container">
            <h2>Pilih Kategori Produk</h2>
            <nav class="subcategory-nav">
                <ul>
                    <li><a href="#suplement">Suplement</a></li>
                    <li><a href="#health-food">Health Food & Beverage</a></li>
                    <li><a href="#cosmetic">Cosmtic & Home Care</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="products" id="suplement">
        <div class="container-produk">
            <h3>Suplement</h3>
            <div class="product-item">
                <img src="img/produk_spirulina.jpg" alt="Spirulina">
                <h4>SPIRULINA</h4>
                <div class="read-more-content">
                <p>Digunakan untuk membantu memelihara daya tahan tubuh dan mengatasi anemia.</p><br>
                    <p>KANDUNGAN: <br>
                        Spirulina sp</p>
                    <p>ATURAN PAKAI: <br>
                        1 x 2 kapsul sehari</p>
                    <p>ANJURAN: <br>
                        Diminum sebelum makan dan perbanyak minum air putih hangat.</p>
                    <p>PERHATIAN: <br>
                        Simpan ditempat kering dan sejuk serta terhindar dari sinar matahari langsung.</p>
                    <p> Rp 90.000 | Kode : 70/25 <br>
                        Isi :60 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <!-- <button class="btn" id="buyButton" onclick="addToCart('Spirulina', 90000)">Beli Sekarang</button> -->
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="SPIRULINA">
                    <input type="hidden" name="harga" value="90000">
                    <!-- <input type="hidden" name="gambar_produk" value="http://localhost/posttest4/img/produk_spirulina.jpg">                     -->
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_pegagan_hs.jpg" alt="produk pegagan hs">
                <h4>PEGAGAN</h4>
                <div class="read-more-content">
                <p>Untuk melancarkan sirkulasi darah, menambah kecerdasan otak, dan menghilangkan seluit.</p>
                    <p>KANDUNGAN: <br>
                        Pegagan (Centellae herba ekstrak)</p>
                    <p>ATURAN PAKAI: <br>
                        Dewasa 2 x 1 kapsul sehari</p>
                    <p>ANJURAN: <br>
                        Diminum 1 (satu) jam sebelum makan.</p>
                    <p> Rp 90.000 | Kode : 70/25 <br>
                        Isi :50 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="PEGAGAN">
                    <input type="hidden" name="harga" value="90000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_habbassauda.jpg" alt="Habbassaudah">
                <h4>HABBATUSSAUDA</h4>
                <div class="read-more-content">
                <p>Secara tradisional digunakan untuk membantu memelihara daya tahan tubuh, membantu meringankan gejala asma dan melancarkan ASI.</p>
                    <p>KANDUNGAN: <br>
                        Habbatussauda (Nigella sativa semen)</p>
                    <p>ATURAN PAKAI: <br>
                        3 x 2 kapsul sebelum makan</p>
                    <p>ANJURAN: <br>
                        Perbanyak minum air hangat.</p>
                    <p> Rp 60.000 | Kode : 50/16 <br>
                        Isi :50 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="HABBATUSSAUDA">
                    <input type="hidden" name="harga" value="60000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_andrographis.jpg" alt="Andrographis">
                <h4>ANDROGRAPHIS</h4>
                <div class="read-more-content">
                <p>Secara tradisional digunakan untuk melindungi hati, meningkatkan sistem kekebalan tubuh, menurunkan panas, menghilangkan rasa nyeri dan antibiotik alami.</p>
                    <p>KANDUNGAN: <br>
                        Sambiloto (Andrographis paniculata) <br>
                        Alang-alang (Imperata cylindrica) <br>
                        Pegagan (Centella Asiatic)</p>
                    <p>ATURAN PAKAI: <br>
                        3 x 2 kapsul sebelum makan</p>
                    <p>ANJURAN: <br>
                        Ibu hamil disarankan konsultasi dengan dokter bila mengkonsumsi herbal ini.</p>
                    <p> Rp 85.000 | Kode : 65/25 <br>
                        Isi :75 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="ANDROGRAPHIS">
                    <input type="hidden" name="harga" value="85000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_bilberry.jpg" alt="Bilberry">
                <h4>BILBERRY</h4>
                <div class="read-more-content">
                <p>Membantu memelihara kesehatan mata dan kesehatan tubuh.</p>
                    <p>KANDUNGAN: <br>
                        Bilberry (Vaccinum myrtillus fructus extractum)</p>
                    <p>ATURAN PAKAI: <br>
                        Dewasa 2 kali sehari 2 kapsul</p>
                    <p>ANJURAN: <br>
                        Diminum setelah makan dan perbanyak minum air hangat.</p>
                    <p> Rp 150.000 | Kode : 110/42 <br>
                        Isi :50 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="BILBERRY">
                    <input type="hidden" name="harga" value="150000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_gamat_kapsul.jpg" alt="Gamat">
                <h4>GAMAT</h4>
                <div class="read-more-content">
                <p>Membantu meredakan nyeri sendi.</p>
                    <p>KANDUNGAN: <br>
                        Gamat / teripang emas (Stichopus hermanii extractum)</p>
                    <p>ATURAN PAKAI: <br>
                        3x2 kapsul per har</p>
                    <p> Rp 130.000 | Kode : 100/40 <br>
                        Isi :60 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <button class="btn">Beli Sekarang</button>
            </div>
            <div class="product-item">
                <img src="img/produk_ginextrac.jpg" alt="Ginextrac">
                <h4>GINEXTRAC</h4>
                <div class="read-more-content">
                <p>Membantu meluruhkan batu urin di saluran kemih dan membantu melancarkan buang air kecil.</p>
                    <p>KANDUNGAN: <br>
                        Sonchus folium ekstrak <br>
                        Phyllanthii herba ekstrak <br>
                        Elephantophi rhizoma ekstrak <br>
                        Imperatae rhizoma ekstrak</p>
                    <p>ATURAN PAKAI: <br>
                        Dewasa 3 x 1 kapsul sehari</p>
                    <p>ANJURAN: <br>
                        Diminum 1 (satu) jam sebelum makan, jika memiliki masalah lambung, diminum 1 jam setelah makan.</p>
                    <p> Rp 90.000 | Kode : 75/20 <br>
                        Isi :50 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="GINEXTRAC">
                    <input type="hidden" name="harga" value="90000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_magafit.jpg" alt="Magafit">
                <h4>MAGAFIT</h4>
                <div class="read-more-content">
                <p>Membantu memelihara kesehatan fungsi saluran pencernaan.</p>
                    <p>KANDUNGAN: <br>
                        Temu Lawak (Curcumae rhizoma ekstrak), Kunyit (Curcumae domestica rhizoma ekstrak), 
                        Daun Dewa (Gynura procumbensis folium ekstrak), Daun Sembung (Blumeae folium ekstrak), Kunyit Putih (Curcumae mangga rhizoma ekstrak)</p>
                    <p>ATURAN PAKAI: <br>
                        Dewasa 3 x 1 kapsul sehari</p>
                    <p>ANJURAN: <br>
                        Diminum 1 jam sebelum makan.</p>
                    <p> Rp 90.000 | Kode : 75/20 <br>
                        Isi :50 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="MAGAFIT">
                    <input type="hidden" name="harga" value="90000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/Resep Herba HPAI 2020 Deep Squa.jpg" alt="Deep Squa">
                <h4>DEEP SQUA</h4>
                <div class="read-more-content">
                <p>Suplemen untuk membantu menjaga kesehatan.</p>
                    <p>KANDUNGAN: <br>
                        Minyak Squalene 100%</p>
                    <p>ATURAN PAKAI: <br>
                        Sehari 1-2 kapsul</p>
                    <p> Rp 250.000 | Kode : 200/65 <br>
                        Isi :50 kapsul</p>
                    <p> Rp 460.000 | Kode : 375/130 <br>
                        Isi :100 kapsul</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="DEEP SQUA">
                    <input type="hidden" name="harga" value="250000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
        </div>
    </section>

    <section class="products" id="health-food">
        <div class="container-produk">
            <h3>Health Food & <br> Beverage</h3>
            <div class="product-item">
                <img src="img/produk_etta_goat_milk.jpg" alt="EGM">
                <h4>ETTA GOAT MILK</h4>
                <div class="read-more-content">
                <p>Susu kambing lebih mudah dicerna, kandungan gizi lebih lengkap, merupakan sumber kalsium, protesin, asam amino, fosfor, kalium, riboflavin (Vitamin B2).
                    Tinggi protein dan tinggi kalsium, baik dikonsumsi semua usia, anak dan dewasa.
                </p>
                    <p>KOMPOSISI: <br>
                        Susu Kambing Ettawa bubuk dan gula.
                    </p>
                    <p>PERHATIAN: <br>
                        Simpan ditempat kering dan sejuk serta terhindar dari sinar matahari langsung.</p>
                    <p> Wilayah 1-2 : Rp 75.000  | Kode : 60/20 <br>
                        Wilayah 3   : Rp 90.000  | Kode : 70/20 <br>
                        Wilayah 4   : Rp 110.000 | Kode : 90/20 <br>
                        Isi :10 sachet</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="ETTA GOAT MILK">
                    <input type="hidden" name="harga" value="75000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_kopi_sevel_1.jpg" alt="Kopi Sevel">
                <h4>KOPI SEVEL</h4>
                <div class="read-more-content">
                <p>Sevel (7 Elemen) adalah minuman yang terdiri dari kopi dengan 7 elemen tanaman: biji, akar, batang, kulit, daun, bunga, dan buah.
                    Kopi ini memiliki sifat aprodisiak yang berfungsi membantu mendapatkan vitalitas saat beraktifitas.
                </p>
                <p>KOMPOSISI: <br>
                    Setiap sachet mengandung: <br>
                    Pasak bumi, buah manggis, jintan hitam, jahe merah, kayu angin, bunga krisan, daun kelor, daun sendok, buah mengkudu, daun stevia, garam calsium, gula kelapa, serbuk kopi, gula aren, krimer. </p>              
                    <p>PENYAJIAN: <br>
                        Tuangkan satu sachet ke dalam satu cangkir, masukkan air panas, aduk hingga merata.</p>
                    <p> Wilayah 1-2 : Rp 110.000 | Kode : 90/25 <br>
                        Wilayah 3   : Rp 120.000 | Kode : 100/25 <br>
                        Wilayah 4   : Rp 150.000 | Kode : 130/25 <br>
                        Isi :10 sachet</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="KOPI SEVEL">
                    <input type="hidden" name="harga" value="110000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_centella_teh.jpg" alt="Centella Teh">
                <h4>CENTELLA TEH</h4>
                <div class="read-more-content">
                <p>KOMPOSISI: <br>
                    Pegagan, Teh Hijau, Jati Belanda, Jahe Merah. </p>
                    <p>PENYIMPANAN: <br>
                        Simpan di tempat kering dan sejuk, terhindar dari sinar matahari secara langsung. </p>              
                    <p>PENYAJIAN: <br>
                        Masukkan 1 kantong teh celup kedalam 1 gelas air panas.</p>
                    <p> Rp 70.000 | Kode : 55/15 <br>
                        Isi :24 uncang</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="CENTELLA TEH">
                    <input type="hidden" name="harga" value="70000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_susu_kambing_hania_fullcream.jpg" alt="Hania Susu Kambing Full Cream ">
                <h4>HANIA SUSU KAMBING (HGM) FULL CREAM</h4>
                <div class="read-more-content">
                <p>KOMPOSISI: <br>
                    Susu Kambing bubuk 100% </p>
                    <p>Baik dikonsumsi oleh anak-anak dan dewasa.</p>              
                    <p> Rp 75.000 | Kode : 65/10 <br>
                        Isi :10 pouches</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="HANIA SUSU KAMBING (HGM) FULL CREAM">
                    <input type="hidden" name="harga" value="75000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_minyak_zaitun.jpg" alt="Minyak Zaitun">
                <h4>SINAI OLIVE OIL</h4>
                <div class="read-more-content">
                <p>Extra virgin olive oil adalah minyak zaitun berkualitas terbaik (grade A) yang diproduksi secara alami dengan aroma dan citarasanya istimewa dengan kadar keasaman kurang dari 0.8%.
                    <br>100% extra virgin olive oil yang baik bagi kesehatan dan kecantikan kulit serta aman dikonsumsi secara langsung.
                </p>
                <p>KOMPOSISI: <br>
                    Extra virgin olive oil 100% </p>              
                    <p>KEGUNAAN: <br>
                        Menjaga kesehatan dan daya tahan tubuh.</p>
                <p>ATURAN PAKAI:: <br>
                    Pagi : 1 sendok makan <br> Malam : 1 sendok makan</p>
                    <p> Rp 35.000 | Kode : 30/8 <br>
                        Isi :60 ml</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="SINAI OLIVE OIL">
                    <input type="hidden" name="harga" value="35000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/produk_fibdrink.jpg" alt="Fibdrink">
                <h4>HANIA JUICY FIBDRINK</h4>
                <div class="read-more-content">
                <p>HANIA JUICY FIBDRINK Mix Berry
                    <br>Minuman Serbuk Rasa Aneka Buah (Mix Fruit)
                </p>
                <p>PENYAJIAN: <br>
                    Seduh 1 sachet Hania Juicy FibDrink dengan 150 ml air dingin (suhu 8 derajat Celcius).
                    <br>Aduk rata hingga serbuk larut. </p>              
                    <p> Rp 85.000 | Kode : 75/17 <br>
                        Isi :10 sachets</p> 
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="HANIA JUICY FIBDRINK">
                    <input type="hidden" name="harga" value="85000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/Resep Herba HPAI 2020 Madu Habbat.jpg" alt="Madu Habbat">
                <h4>MADU HABBAT</h4>
                <div class="read-more-content">
                <p>Madu adalah makanan yang mengandung aneka nutrisi seperti protein, asam amin, karbohidrat, vitamin, mineral, dekstrin, pigmen tumbuhan dan komponen aromatik. 
                    Bahkan madu mengandung 11 asam amino esensial yang tidak diproduksi oleh tubuh. 
                    Dari hasil penelitian terbaru, zat-zat atau senyawa yang ada didalam madu sangat komplek yaitu mencapai 181 jenis.
                </p>
                <p>KOMPOSISI: <br>
                    Madu 100% </p>              
                    <p> Wilayah 1-2 : Rp 130.000  | Kode : 100/30 <br>
                        Wilayah 3   : Rp 135.000  | Kode : 105/30 <br>
                        Wilayah 4   : Rp 155.000  | Kode : 125/30 <br>
                        Isi :250 gr</p>
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="MADU HABBAT">
                    <input type="hidden" name="harga" value="130000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/Resep Herba HPAI 2021 HNI Health.jpg" alt="HNI Health">
                <h4>HNI HEALTH</h4>
                <div class="read-more-content">
                <p>KOMPOSISI: <br>
                    Sari kurma, madu alami, royal jelly, bee polen, bayam merah, wortel, beras hitam, 
                    rosella ungu, habbatussauda, zaitun, blueberry, blackberry, daun ashitaba, curcuma, kulit manggis, daun sirsak, plum hitam, anggur hitam, spirulina, daun stevia, meniran, strawberry. </p>              
                    <p>KEGUNAAN: <br>
                        Untuk memelihara kesehatan tubuh.</p>
                <p>ATURAN PAKAI:: <br>
                    Dewasa: 2-3 x 3 sdm / hari <br> Anak-anak: 2-3 x 3 sdt / hari</p>
                    <p> Wilayah 1-2 : Rp 80.000  | Kode : 60/20 <br>
                        Wilayah 3   : Rp 85.000  | Kode : 65/20 <br>
                        Isi :250 ml</p>
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="HNI HEALTH">
                    <input type="hidden" name="harga" value="80000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
            <div class="product-item">
                <img src="img/Resep Herba HPAI 2021 Sari Kurma.jpg" alt="Sari Kurma">
                <h4>SARI KURMA</h4>
                <div class="read-more-content">
                <p>KOMPOSISI: <br>
                    100% sari kurma </p>              
                    <p>KEGUNAAN: <br>
                        Digunakan secara tradisional untuk kesehatan badan.</p>
                    <p>Rp 50.000  | Kode : 45/11 <br>
                        Isi :350 gr</p>
                </div>
                <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                <form action="" method="POST">
                    <input type="hidden" name="nama_produk" value="SARI KURMA">
                    <input type="hidden" name="harga" value="50000">
                    <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                </form>
            </div>
        </div>
    </section>

    <section class="products" id="cosmetic">
        <div class="container-produk">
            <h3>Cosmtic <br> & Home Care</h3>
            <div class="product-item">
                <img src="img/produk_minyak_herba_sinergi.jpg" alt="MHS">
                <h4>MINYAK HERBA SINERGI (MHS)</h4>
                <div class="read-more-content">
                <p>Secara tradisional digunakan sebagai minyak gosok dan 
                    minyak urut untuk membantu meredakan pegal linu dan nyeri sendi, serta luka memar.
                </p>
                <p>KOMPOSISI: <br>
                    Virgin Coconut Oil <br>
                    Oleum Olea Europea <br>
                    Oleum Elaesis Guineensis <br>
                    Kaempferia Galanga Rhizoma <br>
                    Tinosporae Crispa Caulis <br>
                    Cinnamomi Burmannii Cortex <br>
                    Andrographidis Paniculatae Herba <br>
                    Eugenia Caryophilli Flos </p>               
                <p>ATURAN PAKAI:: <br>
                    Oleskan bagian tubuh yang memerlukan</p>
                    <p> Rp 45.000  | Kode : 30/10 <br>
                        Isi :250 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="MINYAK HERBA SINERGI (MHS)">
                        <input type="hidden" name="harga" value="45000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_pasta_gigi_herbal.jpg" alt="PGH">
                <h4>PGH (PASTA GIGI HERBAL)</h4>
                <div class="read-more-content">
                <p>PASTA GIGI HPAI dengan kombinasi bahan aktif sedemikian rupa dan berkualitas tinggi maka, 
                    Pasta Gigi Herbal HPAI sangat untuk merawat kesehatan gigi dan mengurangi tumbuhnya bakteri 
                    yang dapat menyebabkan timbulnya plak dan karies pada gigi, menjaga kesehatan gigi dan mulut, 
                    serta menyegarkan bau mulut, juga membuat gigi tampak putih.
                </p>
                    <p> Rp 20.000  | Kode : 17/3.5 <br>
                        Isi :120 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="PGH (PASTA GIGI HERBAL)">
                        <input type="hidden" name="harga" value="20000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_pgh_anak_anggur.jpg" alt="PGH-Anak">
                <h4>PGH ANAK (PASTA GIGI HERBAL)</h4>
                <div class="read-more-content">
                <p>Pasta gigi yang diformulasikan khusus untuk anak-anak  dengan rasa  anggur yang disukai anak-anak.
                </p>
                <p>KOMPOSISI: <br>
                    Sorbitol, Calcium Carbonate, Aqua, Hydrated Silica, Flavour Grape,Glycerin, Xanthan Gum, Sodium Lauroyl Sarcosinate, 
                    Propylene Glycol, Salvadora Persica, Piper Betle Extract, Sodium Saccharin, Xylitol, Sodium Benzoate.</p>
                    <p>PENGGUNAAN: <br>
                        Aplikasikan pasta gigi secukup nya pada sikat gigi. Gosok gigi hingga bersih, kemudian kumur-kumur dengan air bersih.</p>
                    <p> Rp 13.000  | Kode : 10/2 <br>
                        Isi :50 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="PGH ANAK (PASTA GIGI HERBAL)">
                        <input type="hidden" name="harga" value="13000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_green_wash_detergent.jpg" alt="Green Wash">
                <h4>GREENWASH DETERGEN</h4>
                <div class="read-more-content">
                <p>KEUNGGULAN: <br>
                    Super High Concentrate: Dengan takaran sedikit, membersihkan dengan maksimal. <br>
                    Enzymes Technology: Lebih efektif membersihkan noda. <br> 
                    Active Oxygen: Mengangkat kotoran hingga ke serat kain. <br>
                    Brightener: Mencerahkan warna pakaian. <br> 
                    Low Suds: Rendah busa, hanya membutuhkan sedikit air bilasan. Hemat air dan tenaga, cocok untuk semua jenis mesin cuci. <br>
                    Anti karat: Mencegah dan melindungi komponen logam dalam mesin cuci dari karatan. <br> 
                    Antiredeposisi: Mencegah kotoran menempel kembali. <br>
                    Biodegradable: Bahan baku eco-friendly, limbah deterjen dapat terurai baik di tanah.  
                </p>
                    <p> Wilayah 1 : Rp 42.000 | Kode : 36/10 <br>
                        Wilayah 2 : Rp 46.000 | Kode : 40/10 <br>
                        Wilayah 3 : Rp 50.000 | Kode : 44/10 <br>
                        Isi :50 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="GREENWASH DETERGEN">
                        <input type="hidden" name="harga" value="42000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_beauty_day_cream.jpg" alt="Day Cream">
                <h4>DAY CREAM</h4>
                <div class="read-more-content">
                <p>Krim perawatan pada pagi hari, membantu melindungi kulit dari efek buruk sinar matahari serta merawat kulit tetap sehat.
                </p>
                <p>KOMPOSISI: <br>
                    Aqua, ethylhexyl methoxycinnamate, butyl methoxydibenzoylmethane, benzophenone-3, butylene glycol, phospholipids, phenoxyethanol, propanediol, acrylamides copolymer, C13-14 isoparaffin, laureth-7, glyceryl stearate, dll.</p>
                    <p>PENGGUNAAN: <br>
                        Aplikasikan pada wajah yang bersih. Gunakan secara rutin untuk hasil yang baik.</p>
                    <p> Rp 75.000  | Kode : 60/20 <br>
                        Isi :15 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="DAY CREAM">
                        <input type="hidden" name="harga" value="75000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_beauty_night_cream.jpg" alt="Night Cream">
                <h4>NIGHT CREAM</h4>
                <div class="read-more-content">
                <p>Krim perawatan kulit pada malam hari, melembabkan kulit, Vitamin C membantu mencerahkan kulit juga kandungan aktif lainnya menjadikan kulit tetap sehat.
                </p>
                <p>KOMPOSISI: <br>
                    Aqua, propanediol, acrylamides copolymer, C13-14 Isoparaffin, laureth-7, glyceryl stearate, cetyl alcohol, PEG-75 stearate, ceteth-20, steareth-20, niacinamide, olea europaea oil, dll.</p>
                    <p>PENGGUNAAN: <br>
                        Untuk perawatan pada malam hari, aplikasikan pada wajah yang bersih. Gunakan secara rutin untuk hasil yang baik.</p>
                    <p> Rp 85.000  | Kode : 70/25 <br>
                        Isi :15 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="NIGHT CREAM">
                        <input type="hidden" name="harga" value="85000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_sabun_kolagen.jpg" alt="Sabun Kolagen">
                <h4>SABUN KOLAGEN</h4>
                <div class="read-more-content">
                <p>Sabun Kolagen digunakan untuk perawatan kesehatan dan sebagai bahan kosmetik. Sabun Transparant Kolagen membersihkan kulit tubuh sekaligus melembabkan, sehingga kulit menjadi bersih, terasa lembut dan tampak lebih bercahaya setiap hari.
                </p>
                <p>KOMPOSISI: <br>
                    Succrose, Water, Cocos Nucifera Oil,Propylene glycol, Stearic acid, Ethanol Denat, Triethanolamine, Glycerin, Sodium hydroxide, Cocamidopropyl betaine, Parfum, Marine Collagen, Glycolic acid, BHT</p>
                    <p>PENGGUNAAN: <br>
                        Gunakan Sabun Kolagen setiap mandi, untuk hasil yang lebih sempurna.</p>
                <p> Wilayah 1 : Rp 25.000 | Kode : 20/6 <br>
                    Wilayah 2 : Rp 28.000 | Kode : 23/6 <br>
                    Wilayah 3 : Rp 30.000 | Kode : 27/6 <br>
                    Isi :100 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="SABUN KOLAGEN">
                        <input type="hidden" name="harga" value="25000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_sabun_propolis.jpg" alt="Sabun Propolis">
                <h4>SABUN PROPOLIS</h4>
                <div class="read-more-content">
                <p>Sabun Propolis digunakan untuk perawatan kesehatan dan sebagai bahan kosmetik. Sabun Propolis HNI dengan kandungan propolis, membersihkan kulit tubuh sekaligus melembabkan, sehingga kulit menjadi bersih, terasa lembut dan tampak lebih bercahaya setiap hari.
                </p>
                <p>KOMPOSISI: <br>
                    Aqua, Cocos nucifera oil, Olea europaea fruit oil, Stearic acid, Glycerin, Propylene glycol, Sucrose, Sodium hidroxide, Propolis, Parfum, Citric acid, BHT.</p>
                    <p>PENGGUNAAN: <br>
                        Gunakan Sabun Propolis setiap mandi, untuk hasil yang lebih sempurna.</p>
                <p> Wilayah 1 : Rp 20.000 | Kode : 17/5 <br>
                    Wilayah 2 : Rp 25.000 | Kode : 20/5 <br>
                    Wilayah 3 : Rp 27.000 | Kode : 22/ <br>
                    Isi :100 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="SABUN PROPOLIS">
                        <input type="hidden" name="harga" value="20000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
            <div class="product-item">
                <img src="img/produk_sabun_madu.jpg" alt="Sabun Madu">
                <h4>SABUN MADU</h4>
                <div class="read-more-content">
                <p>Sabun Madu digunakan untuk perawatan kesehatan dan sebagai bahan kosmetik. Sabun Madu HNI dengan kandungan madu, membersihkan kulit tubuh sekaligus melembabkan, sehingga kulit menjadi bersih, terasa lembut dan tampak lebih bercahaya setiap hari.
                </p>
                <p>KOMPOSISI: <br>
                    Aqua, Cocos nucifera oil, Olea europaea fruit oil, Stearic acid, Glycerin, Propylene glycol, Sucrose, Sodium hidroxide, Honey, Parfum, Citric acid, BHT.</p>
                    <p>PENGGUNAAN: <br>
                        Gunakan Sabun Madu setiap mandi, untuk hasil yang lebih sempurna.</p>
                <p> Wilayah 1 : Rp 20.000 | Kode : 17/5 <br>
                    Wilayah 2 : Rp 25.000 | Kode : 20/5 <br>
                    Wilayah 3 : Rp 27.000 | Kode : 22/ <br>
                    Isi :100 gr</p>
                </div>
                    <button class="read-more-btn">Baca Selanjutnya...</button> <br> <br>
                    <form action="" method="POST">
                        <input type="hidden" name="nama_produk" value="SABUN MADU">
                        <input type="hidden" name="harga" value="20000">
                        <button type="submit" name="add_to_cart" class="btn" id="buyButton">Beli Sekarang</button>
                    </form>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <a href="https://classroom.google.com/u/1/c/NzA1MzMyNzkzODU2">Posttest5</a>
        &copy; Saniyyah Intan Salsabiila 2309106004
    </div>
</footer>

<script>
    var isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;
    document.getElementById('buyButton').addEventListener('click', buyProduct);
    function buyProduct() {
            if (!isLoggedIn) {
                alert("Anda harus login terlebih dahulu untuk membeli produk ini.");
                window.location.href = "login.php"; 
            } else {
                alert("Produk telah ditambahkan ke keranjang belanja.");
                window.location.href = 'keranjang.php'; 
            }
        }
    
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        this.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';
    });
    

    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    const readMoreBtns = document.querySelectorAll('.read-more-btn');

    readMoreBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const content = this.previousElementSibling;
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
            this.textContent = this.textContent === 'Baca Selanjutnya...' ? 'Tutup' : 'Baca Selanjutnya...';
        });
    });

    window.onload = function() {
        if (document.referrer === "" || !document.referrer.includes(window.location.hostname)) {
            document.getElementById("welcomePopup").style.display = "block";
        }
    }

    document.getElementById("closeWelcomePopup").onclick = function() {
        document.getElementById("welcomePopup").style.display = "none";
        localStorage.setItem("welcomePopupDisplayed", "true"); 
    }

    window.onclick = function(event) {
        const popup = document.getElementById("welcomePopup");
        if (event.target == popup) {
            popup.style.display = "none";
            localStorage.setItem("welcomePopupDisplayed", "true");
        }
    }

</script>
</body>
</html>
