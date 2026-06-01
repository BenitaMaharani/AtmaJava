<?php
include 'config/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tahap 1: Cek apakah email terdaftar
if (isset($_POST['cek_email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($result) === 1) {
        // Jika email ada, simpan email ke session untuk penanda di tahap berikutnya
        $_SESSION['reset_email'] = $email;
        $tahap_dua = true;
    } else {
        $error_email = true;
    }
}

// Tahap 2: Proses Update Password Baru
if (isset($_POST['update_password'])) {
    if (isset($_SESSION['reset_email'])) {
        $email = $_SESSION['reset_email'];
        $password_baru = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);
        
        // Update password di database
        $query = "UPDATE users SET password = '$password_baru' WHERE email = '$email'";
        
        if (mysqli_query($conn, $query)) {
            // Hapus session reset agar aman
            unset($_SESSION['reset_email']);
            
            echo "
            <script>
                alert('Password berhasil diperbarui! Silakan masuk kembali.');
                window.location.href='masuk.php';
            </script>
            ";
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Atma Java</title>
    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">
    <link rel="stylesheet" href="css/masuk.css"> </head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="login-section">
        <div class="login-box">

            <?php if (isset($tahap_dua) || isset($_SESSION['reset_email'])) : ?>
                <h1>Buat Password Baru</h1>
                <p class="login-desc">Masukkan kombinasi password baru untuk akun Anda</p>

                <form action="" method="POST">
                    <label>Password Baru</label>
                    <input 
                        type="password" 
                        name="password_baru"
                        placeholder="Minimal 6 karakter"
                        required
                    >
                    <button type="submit" name="update_password">
                        Perbarui Password
                    </button>
                </form>

            <?php else : ?>
                <h1>Minta Reset Password</h1>
                <p class="login-desc">Masukkan email akun Atma Java Anda untuk mengatur ulang password</p>

                <?php if (isset($error_email)) : ?>
                    <p class="error-text" style="color: red; margin-bottom: 15px; font-style: italic;">
                        Email tidak terdaftar di sistem kami!
                    </p>
                <?php endif; ?>

                <form action="" method="POST">
                    <label>Email Anda</label>
                    <input 
                        type="email" 
                        name="email"
                        placeholder="contoh@email.com"
                        required
                    >
                    <button type="submit" name="cek_email">
                        Cek Email
                    </button>
                </form>
            <?php endif; ?>

            <p class="daftar-text" style="margin-top: 30px;">
                Ingat password Anda? 
                <a href="masuk.php">Kembali Masuk</a>
            </p>

        </div>
    </section>

</body>
</html>