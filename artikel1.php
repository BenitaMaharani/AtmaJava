<?php
include 'config/koneksi.php';

// Mengambil data artikel dengan ID 1 (Rencana Sebelum Melangkah)
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id = 1");
$data  = mysqli_fetch_array($query);

// Jika data tidak ditemukan di database, set alternatif teks kosong agar tidak error
if (!$data) {
    echo "Artikel tidak ditemukan di database. Pastikan ID 1 tersedia.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Java - <?php echo $data['judul']; ?></title>

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">

    <link rel="stylesheet" href="css/artikel1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <div class="hero-artikel">
        <img src="assets/img_artikel/<?php echo $data['gambar']; ?>" alt="Banner Artikel">
    </div>

    <section class="artikel-detail">
        <h1>
            <?php echo $data['judul']; ?>
        </h1>

        <div class="artikel-content">
            <div class="quote-box">
                <?php echo nl2br($data['quote']); ?>
            </div>

            <div class="isi-artikel">
                <?php echo $data['isi']; ?>
            </div>
        </div>
    </section>

    <section class="artikel-lain">
        <h3>Artikel lain yang mungkin anda suka</h3>

        <div class="artikel-card-container">
            <?php
            // Mengambil 2 artikel secara acak KECUALI artikel yang sedang dibuka (ID != 1)
            $query_rekomendasi = mysqli_query($conn, "SELECT * FROM artikel WHERE id != 1 ORDER BY RAND() LIMIT 2");
            
            if ($query_rekomendasi && mysqli_num_rows($query_rekomendasi) > 0) {
                while ($data_artikel = mysqli_fetch_array($query_rekomendasi)) {
            ?>
                    <a href="detail-artikel.php?id=<?php echo $data_artikel['id']; ?>" class="artikel-card">
                        <img src="assets/img_artikel/<?php echo $data_artikel['gambar']; ?>" alt="artikel">
                        <div class="artikel-card-content">
                            <h4><?php echo $data_artikel['judul']; ?></h4>
                            <button>
                                <i class="fa-solid fa-play"></i>
                            </button>
                        </div>
                    </a>
            <?php 
                }
            } else { 
            ?>
                <a href="#" class="artikel-card">
                    <img src="assets/img_artikel/gambar1.jpeg" alt="artikel">
                    <div class="artikel-card-content">
                        <h4>Mengenal Jalur Pendakian Gunung Sumbing</h4>
                        <button><i class="fa-solid fa-play"></i></button>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
    
</body>
</html>