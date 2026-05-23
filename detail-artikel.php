<?php
include 'config/koneksi.php';

/* =========================
   AMBIL ID ARTIKEL YANG DIKLIK
========================= */
$id = isset($_GET['id']) ? $_GET['id'] : 0;

/* =========================
   AMBIL DATA ARTIKEL SESUAI ID
========================= */
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "Artikel tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Java - <?php echo $data['judul']; ?></title>

    <link rel="stylesheet" href="css/artikel1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="hero-artikel">
        <img src="assets/img_artikel/<?php echo $data['gambar']; ?>" alt="">
    </section>

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
        /* =========================
           AMBIL 2 ARTIKEL SELAIN ARTIKEL YANG SEDANG DIBUKA
        ========================= */
        $query2 = mysqli_query($conn, "SELECT * FROM artikel WHERE id != '$id' ORDER BY RAND() LIMIT 2");

        while($artikel = mysqli_fetch_array($query2)){
        ?>
            <a href="detail-artikel.php?id=<?php echo $artikel['id']; ?>" class="artikel-card">
                <img src="assets/img_artikel/<?php echo $artikel['gambar']; ?>" alt="">
                <div class="artikel-card-content">
                    <h4>
                        <?php echo $artikel['judul']; ?>
                    </h4>
                    <button>
                        <i class="fa-solid fa-play"></i>
                    </button>
                </div>
            </a>
        <?php } ?>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

</body>
</html>