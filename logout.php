<?php
session_start();
session_destroy();

// Redirect dengan tambahan status (bisa ditangkap di index.php untuk munculkan notif)
header("Location: index.php?pesan=logout_berhasil");
exit;
?>