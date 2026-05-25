<?php
include 'config/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Tambahkan ini
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek dulu apakah email sudah pernah didaftarkan
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location.href='daftar.php';</script>";
        exit;
    }

    // Masukkan email ke dalam query INSERT
    $query = "INSERT INTO users (username, email, password)
              VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $query)) {

        echo "
        <script>
            alert('Pendaftaran berhasil!');
            window.location.href='index.php';
        </script>
        ";

        exit;
    }

    else{
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Atma Java</title>

    <link rel="stylesheet" href="css/daftar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="register-section">

        <div class="register-box">

            <h1>Selamat Datang!</h1>

            <p class="register-desc">
                Pilih salah satu metode pendaftaran di bawah ini
                untuk mendaftarkan akun ke Atma Java
            </p>

            <div class="social-login">

                <a href="#" class="google-btn">

                    <img src="assets/icon_masuk/google.png">

                    Google

                </a>

                <a href="#" class="facebook-btn">

                    <img src="assets/icon_masuk/facebook.png">

                    Facebook

                </a>

            </div>

            <div class="separator">

                <span></span>

                <p>ATAU</p>

                <span></span>

            </div>

            <form action="" method="POST">
                
            <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan Email"
                    required

                >
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                <button type="submit" name="register">
                    Daftar
                </button>

            </form>

        </div>

    </section>

</body>
</html>