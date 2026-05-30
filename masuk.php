<?php
include 'config/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {

    // 1. Ambil data Email dari input form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 2. Cari user berdasarkan Email (bukan username)
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        // 3. Verifikasi password hash
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            
            // Mengambil username dari DB (jika di DB ada kolom username, jika tidak ada bisa pakai email)
            // Di sini kita amankan agar tidak error jika kolom username kosong di DB
            $display_name = isset($row['username']) ? $row['username'] : $row['email'];
            $_SESSION['username'] = $display_name;

            echo "
            <script>
                alert('Selamat Datang Kembali!');
                window.location.href='index.php';
            </script>
            ";
            exit;
        }
    }

    // Jika gagal, set error jadi true
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Atma Java</title>

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">s

    <link rel="stylesheet" href="css/masuk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="login-section">

        <div class="login-box">

            <h1>Selamat Datang Kembali!</h1>

            <p class="login-desc">
                Isi formulir di bawah ini untuk masuk ke Atma Java
            </p>

            <?php if(isset($error)) : ?>
                <p class="error-text" style="color: red; margin-bottom: 15px;">
                    Email atau Password salah!
                </p>
            <?php endif; ?>

            <form action="" method="POST">

                <label>Email</label>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Masukkan email Anda"
                    required
                >

                <label>Password</label>
                <input 
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                <button type="submit" name="login">
                    Masuk
                </button>

            </form>

            <p class="daftar-text">
                Belum memiliki akun?
                <a href="daftar.php">Daftar</a>
            </p>

            <div class="separator">
                <span></span>
                <p>ATAU</p>
                <span></span>
            </div>
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

        </div>

    </section>

</body>
</html>