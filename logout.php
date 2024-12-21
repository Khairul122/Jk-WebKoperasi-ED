<?php

session_start();
unset($_SESSION['login']);

// menghapus semua session
if (session_destroy()) {
    echo "<script>
    alert('Anda Telah Berhasil Logout');
    window.location.href='login.php';
    </script>";
}
