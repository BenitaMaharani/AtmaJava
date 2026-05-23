<?php
// 1. Inisialisasi di paling atas
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'config/koneksi.php';
// include 'config/session.php'; // Aktifkan jika halaman ini hanya untuk yang sudah login

// 2. Ambil ID dari URL
$id = $_GET['id'];

// 3. Ambil data gunung dari database berdasarkan ID
// Ganti 'gunung' dengan nama tabel kamu yang benar (misal: 'jelajah' atau 'wisata')
$query = mysqli_query($conn, "SELECT * FROM gunung WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gunung - Atma Java</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php 
    // Panggil navbar di sini agar muncul di dalam body HTML
    include 'components/navbar.php'; 
    ?>

    <div style="padding: 100px 20px; font-family: 'Poppins', sans-serif;">
        
        <h1>Detail Gunung: <?= isset($data['nama']) ? $data['nama'] : "ID " . $id; ?></h1>

        <div class="content">
            <p><?= isset($data['deskripsi']) ? $data['deskripsi'] : "Informasi detail gunung belum tersedia."; ?></p>
        </div>

        <br>

        <a href="<?= isset($data['link_maps']) ? $data['link_maps'] : 'https://maps.google.com'; ?>" target="_blank">
            Buka Maps
        </a>

        <br><br>

        <a href="jelajah.php">Kembali</a>

    </div>

</body>
</html>