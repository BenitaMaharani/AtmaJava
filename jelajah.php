<?php 
include 'config/session.php'; // Session biasanya sudah di-start di sini
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah - Atma Java</title>

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">

    <link rel="stylesheet" href="css/jelajah.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-text">
            <h1>
                Menyentuh Atma,<br>
                Merasai Nafas<br>
                Tanah Jawa
            </h1>
            <p>"Sebuah upaya untuk mengabadikan kemegahan pegunungan Jawa melalui dokumentasi yang bersih, jujur, dan berwibawa. Atma Jawa menyajikan data teknis yang berpadu dengan narasi estetika, menciptakan ruang bagi para penjelajah untuk memahami jiwa dari setiap puncak yang mereka tuju.”</p>
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

    <section class="title-section">
        <h2>Titik Awal Perjalanan</h2>
        <p>"Setiap langkah besar dimulai dari koordinat yang tepat"</p>
    </section>

    <div class="line-map">
        <i class="fa-solid fa-location-dot"></i>
        <hr>
    </div>

    <section class="mountain-section">
        <?php
            // Query ambil data dari database gunung
            $query = mysqli_query($conn, "SELECT * FROM gunung");

            // Perulangan otomatis berdasarkan data di database
            while ($data = mysqli_fetch_array($query)){
                
                // Mengantisipasi perbedaan nama kolom link maps di database kamu
                // Jika kolom di database bernama 'lokasi_maps', pakai itu. Jika tidak, pakai 'maps_link'
                $link_maps = isset($data['lokasi_maps']) ? $data['lokasi_maps'] : (isset($data['maps_link']) ? $data['maps_link'] : '#');
        ?>
        
        <div class="mountain-card">
            <div class="mountain-name">
                <?php echo $data['nama_gunung']; ?>
            </div>
            
            <a href="<?php echo $link_maps; ?>" target="_blank" class="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
        </div>

        <?php } ?>
    </section>

    <?php include 'components/footer.php'; ?>
    
</body>
</html>