<?php
session_start();
include 'config/koneksi.php'; // session.php biasanya tidak perlu di-include di sini karena login adalah proses awal

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Ambil data dan cegah karakter aneh (SQL Injection Protection)
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // 2. Query untuk mencari user berdasarkan email
    // Catatan: Sangat disarankan password di database di-encrypt (hash), tapi kita gunakan plain dulu sesuai kodemu
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    // 3. Cek apakah user ditemukan
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        // 4. Set Session
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username']; // Ambil username untuk fitur "Halo, Username"
        $_SESSION['email'] = $data['email'];

        // 5. Lempar ke halaman index
        header("Location: index.php");
        exit;

    } else {
        // Jika gagal, tampilkan pesan peringatan
        echo "<script>
                alert('Email atau Password salah!');
                window.location.href = 'masuk.php';
              </script>";
    }
}
?>