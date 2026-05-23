<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo">
        <a href="index.php">
            <img src="assets/img_logo/logoatma.png" alt="logo Atma Java">
        </a>
    </div>

    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="jelajah.php">Jelajah</a></li>
        <li><a href="artikel.php">Artikel</a></li>
        <li><a href="about.php">About Us</a></li>
    </ul>

    <div class="nav-button">
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="user-menu">
            <span style="margin-right: 10px; font-size: 14px;">Halo, <b><?= $_SESSION['username']; ?></b></span>
            <a href="logout.php" class="btn-masuk" onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
        </div>
    <?php else: ?>
        <a href="masuk.php" style="text-decoration: none;">
            <button class="btn-masuk">Masuk</button>
        </a>
        <a href="daftar.php" style="text-decoration: none;">
            <button class="btn-daftar">Daftar</button>
        </a>
    <?php endif; ?>
    </div>
</nav>