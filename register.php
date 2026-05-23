<?php
include 'config/koneksi.php';

// Logika pendaftaran
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 1. Cek apakah username sudah dipakai atau belum
    $cek_user = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username sudah terdaftar, gunakan nama lain!');</script>";
    } else {
        // 2. Hash password (mengubah password jadi kode acak demi keamanan)
        $password_aman = password_hash($password, PASSWORD_DEFAULT);

        // 3. Masukkan ke database
        $insert = mysqli_query($conn, "INSERT INTO users (username, email, password) 
                                       VALUES ('$username', '$email', '$password_aman')");

        if ($insert) {
            echo "<script>
                    alert('Pendaftaran Berhasil! Silakan Masuk.');
                    window.location.href='masuk.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal mendaftar, coba lagi!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Atma Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php include 'components/navbar.php'; ?>

    <section class="login-container" style="margin-top: 80px; text-align: center;">
        <h2>Daftar Akun Baru</h2>
        <p>Bergabunglah dengan para penjelajah Atma Java</p>

        <form action="" method="POST" style="margin-top: 20px;">
            <input type="text" name="username" placeholder="Username" required 
                   style="padding: 10px; margin-bottom: 10px; width: 280px;"><br>
            
            <input type="email" name="email" placeholder="Email" required 
                   style="padding: 10px; margin-bottom: 10px; width: 280px;"><br>
            
            <input type="password" name="password" placeholder="Password" required 
                   style="padding: 10px; margin-bottom: 20px; width: 280px;"><br>
            
            <button type="submit" name="register" class="btn-daftar" 
                    style="padding: 10px 30px; cursor: pointer; background-color: #2c3e50; color: white; border: none; border-radius: 5px;">
                Daftar Sekarang
            </button>
        </form>

        <p style="margin-top: 15px;">Sudah punya akun? <a href="masuk.php">Masuk di sini</a></p>
    </section>

</body>
</html>