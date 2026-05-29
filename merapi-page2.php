<?php
// 1. Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_atmajava");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Ambil parameter slug dari URL, jika tidak ada default ke gunung-merapi
$slug = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : 'gunung-merapi';

// 3. Ambil data gunung berdasarkan slug
$query = "SELECT * FROM mountains WHERE slug = '$slug'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Jika slug tidak ditemukan di database
if (!$data) {
    die("Data gunung tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['nama']; ?> - Budaya & Keselamatan</title>
    <link rel="stylesheet" href="css/merapi-page.css">

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Georgia&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <div class="main-card">
        <div class="image-header" style="background-image: url('assets/img_gunung/<?php echo $data['gambar']; ?>.jpg');">
            <div class="coordinate-box">
                <p><i class="fa-solid fa-location-dot"></i> <?php echo $data['titik_koordinat']; ?></p>
            </div>
        </div>

        <div class="content-container">
            <h1 class="mountain-title"><?php echo $data['nama']; ?></h1>
            
            <div class="article-body">
                <?php echo $data['deskripsi_page2']; ?>
            </div>
            
            <div class="pagination-wrapper">
                <div class="pagination">
                    <a href="merapi-page1.php?slug=<?php echo $slug; ?>" title="Kembali ke Halaman 1">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <a href="merapi-page1.php?slug=<?php echo $slug; ?>">
                        1
                    </a>

                    <a class="active" href="merapi-page2.php?slug=<?php echo $slug; ?>">
                        2
                    </a>
                </div>
            </div>

        </div>
    </div>
    
    <?php include 'components/footer.php'; ?>

</body>
</html>