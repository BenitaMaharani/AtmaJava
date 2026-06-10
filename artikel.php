<?php
// Pastikan tidak ada spasi/enter sebelum tag php ini
include 'config/koneksi.php';
// koneksi = penghubung PHP dengan database
// Gunakan pengecekan status agar tidak error jika session sudah jalan
if (session_status() === PHP_SESSION_NONE) {
    session_start();// session = menyimpan data pengguna sementara
}
// include 'config/session.php'; // Aktifkan jika halaman ini HANYA boleh dilihat user login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - Atma Java</title>

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">

    <link rel="stylesheet" href="css/artikel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    // INI SUDAH CUKUP UNTUK MENAMPILKAN NAVBAR
    include 'components/navbar.php'; 
    ?>

    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-text">
            <h1>Menyentuh Atma,<br>Merasai Nafas<br>Tanah Jawa</h1>
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

    <section class="title-section">
        <h2>Pustaka Atma</h2>
        <p>
            “Ruang literasi untuk mendalami etika pendakian dan wawasan
            konservasi. Temukan panduan bijak dan kabar terbaru dari
            ekosistem pegunungan Jawa.”
        </p>
    </section>

    <section class="card-container">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM artikel");
    if(mysqli_num_rows($query) > 0) {// mysqli_num_rows = menghitung jumlah data
        while($artikel = mysqli_fetch_array($query)){// while = mengulang data sampai habis
        //Looping ada di while(mysqli_fetch_array(...)) pada bagian artikel rekomendasi.
        //Fungsinya untuk menampilkan semua data hasil query secara otomatis satu per satu sampai data habis.
        ?>
            <a href="detail-artikel.php?id=<?php echo $artikel['id']; ?>" class="card">
                // id = identitas unik setiap artikel
                <img src="assets/img_artikel/<?php echo $artikel['gambar']; ?>" alt="artikel">
                <div class="card-content">
                    <h3><?php echo $artikel['judul']; ?></h3>
                    <p><?php echo $artikel['quote']; ?></p>
                    <span>▶</span>
                </div>
            </a>
        <?php 
        }
    } else {
        echo "<p style='text-align:center; width:100%;'>Belum ada artikel yang diterbitkan.</p>";
    }// echo = menampilkan data ke layar, Data diambil langsung dari database.
    ?>
    </section>

    <div class="bg-gunung"></div>

    <?php include 'components/footer.php'; ?>
</body>
</html>