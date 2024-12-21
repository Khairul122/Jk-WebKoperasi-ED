<?php
include "config/database.php";

$username = mysqli_real_escape_string($koneksi, $_POST['email']);
$userpass = mysqli_real_escape_string($koneksi, $_POST['password']);

$cek = $koneksi->query("SELECT * FROM users WHERE email = '$username'");
$pecah = $cek->fetch_assoc();

$validasi = $cek->num_rows;
// Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
if ($validasi > 0) {
    /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
    if (password_verify($userpass, $pecah['password'])) {

        // Buat session baru.
        session_start();
        $_SESSION['login'] = $pecah;

        // Jika login berhasil, user akan diarahkan ke halaman admin.
        echo "<script>
            alert('Selamat Anda Berhasil Login');
            window.location='index.php';
        </script>";
    } else {
        echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="login.php";
                </script>';
    }
} else {
    echo '<script language="javascript">
                window.alert("LOGIN GAGAL! Silakan coba lagi");
                window.location.href="login.php";
        </script>';
}
