<?php
include 'config/session.php';
include 'config/koneksi.php';

// HAPUS ATAU KOMENTARI BAGIAN INI:
/*
if($conn){
    echo "DATABASE BERHASIL TERSAMBUNG";
}else{
    echo "DATABASE GAGAL";
}
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Java</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <?php include 'components/navbar.php'; ?>

     <!-- HERO -->
      <section class="hero">

        <div class="overlay"></div>

        <div class="hero-text">
            <h1>
                  Menyentuh Atma,<br>
                   Merasai Nafas<br>
                    Tanah Jawa
            </h1>

            <p>
                 "Sebuah upaya untuk mengabadikan kemegahan pegunungan Jawa melalui dokumentasi yang bersih, jujur, dan berwibawa. Atma Jawa menyajikan data teknis yang berpadu dengan narasi estetika, menciptakan ruang bagi para penjelajah untuk memahami jiwa dari setiap puncak yang mereka tuju.”
 
            </p>
        </div>

        <div class="info-box">

            <div class="info-item">
                <h2>45 +</h2>
                <span>"Puncak Terdata"</span>
            </div>

            <div class="info-item">
                <h2>3,676 m</h2>
                <span>"Atap Tertinggi (Semeru)"</span>
            </div>

            <div class="info-item">
                <h2>30 +</h2>
                <span>"Hutan Lindung"</span>
            </div>
        </div>
      </section>

      <!-- TITLE -->
       <section class="title-section">

        <h2>Sang Penjelajah</h2>
        <p>Temukan Jalur yang Membawamu Menuju Jiwa Pegunungan Jawa</p>
       </section>

       <!-- CARD GUNUNG -->
        <section class="card-container">
            <div class="card">
                <a href="sumbing-page1.php">
                <img src="assets/img_gunung/sumbing.jpg" alt="Sumbing">
                <div class="card-content">
                    <h3>Gunung Sumbing</h3>
                    <p>Jawa Tengah</p>
                    <span>Ketinggian 3.371 MDPL</span>
                </div>
                </a>
            </div>
            <div class="card">
                <a href="merapi-page1.php">
                <img src="assets/img_gunung/merapi.jpg" alt="Merapi">

                <div class="card-content">
                    <h3>Gunung Merapi</h3>
                    <p>Jawa Tengah</p>
                    <span>Ketinggian 2.930 MDPL</span>
                </div>
                </a>
            </div>
            <div class="card">
                <a href="salak-page1.php">
                <img src="assets/img_gunung/salak.jpg" alt="Salak">

                <div class="card-content">
                    <h3>Gunung Salak</h3>
                    <p>Jawa Barat</p>
                    <span>Ketinggian 3.153 MDPL</span>
                </div>
                </a>
            </div>
            <div class="card">
                <a href="semeru-page1.php">
                <img src="assets/img_gunung/semeru.jpg" alt="Semeru">

                <div class="card-content">
                    <h3>Gunung Semeru</h3>
                    <p>Jawa Timur</p>
                    <span>Ketinggian 3.676 MDPL</span>
                </div>
                </a>
            </div>
            <div class="card">
                <a href="slamet-page1.php">
                <img src="assets/img_gunung/slamet.jpg" alt="Slamet">

                <div class="card-content">
                    <h3>Gunung Slamet</h3>
                    <p>Jawa Tengah</p>
                    <span>Ketinggian 3.428 MDPL</span>
                </div>
                </a>
            </div>

        </section>

        <!-- QUOTES -->
         <section class="quotes">

            <div class="quotes-box">

                <h2>Atma Java</h2>

                <p>
                    “Bagian dari Rangkaian Cincin Api Abadi.”
                </p>

                <span>
                      "Lanskap menakjubkan Pulau Jawa adalah hasil ukiran kekuatan purba dari dasar bumi. Terletak di jantung Cincin Api Pasifik, setiap puncak menceritakan kisah pertemuan lempeng tektonik yang melahirkan kehidupan, budaya, dan kedalaman makna 'Atma' itu sendiri."
                </span>
            </div>

         </section>

        <?php include 'components/footer.php'; ?>
</body>
</html>