<?php
include 'config/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menerima data secure token credential dari Google via Javascript
if (isset($_POST['credential'])) {
    $id_token = $_POST['credential'];
    
    // Menguraikan isi enkripsi token data dari Google tanpa library berat
    $url = "https://oauth2.googleapis.com/tokeninfo?id_token=" . $id_token;
    $response = file_get_contents($url);
    $user_data = json_decode($response, true);

    if (isset($user_data['email'])) {
        $email = mysqli_real_escape_string($conn, $user_data['email']);
        $username = mysqli_real_escape_string($conn, $user_data['name']);

        // Jalur Pintas Otomatis: Cek apakah email Google ini sudah terdaftar di DB?
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        if (mysqli_num_rows($result) === 1) {
            // Skenario A: Jika user sudah terdaftar, langsung loloskan Login
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = isset($row['username']) ? $row['username'] : $username;
        } else {
            // Skenario B: Jika user pertama kali login via Google, buatkan akun otomatis tanpa password
            $dummy_password = password_hash(uniqid(), PASSWORD_DEFAULT);
            $insert = mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email', '$dummy_password')");
            
            if ($insert) {
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
            }
        }
        
        // Alihkan halaman ke Home dengan sukses
        echo "<script>alert('Selamat Datang di Atma Java!'); window.location.href='index.php';</script>";
        exit;
    }
}

// Jika terjadi manipulasi atau error kembali ke halaman masuk
header('Location: masuk.php');
exit;
?>