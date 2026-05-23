<?php
include 'config/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            echo "
            <script>
                alert('Selamat Datang, $username!');
                window.location.href='index.php';
            </script>
            ";

            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Atma Java</title>

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
                <p class="error-text">
                    Username atau Password salah!
                </p>
            <?php endif; ?>

            <form action="" method="POST">

                <label>Username</label>

                <input 
                    type="text"
                    name="username"
                    placeholder="Masukkan username"
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