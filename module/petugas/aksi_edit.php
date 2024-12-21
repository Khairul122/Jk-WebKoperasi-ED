<?php

include "../../config/database.php";

$id       = $_POST['id'];
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$options  = ['cost' => 10,];
$password = $_POST['password'];
$hash     = password_hash($password, PASSWORD_DEFAULT, $options);
$status   = $_POST['status'];
$jabatan  = $_POST['jabatan'];


if ($password = '') {
    $update = $koneksi->query("UPDATE users SET name = '$name', email = '$email', phone = '$phone', level_id = '$jabatan', status = '$status' WHERE id = '$id'");
} else {
    $update = $koneksi->query("UPDATE users SET name = '$name', email = '$email', password = '$hash', phone = '$phone', level_id = '$jabatan', status = '$status' WHERE id = '$id'");
}
if ($update) {
    echo "<script>
        window.alert('Sukses, Data Telah Di Update');
        window.location='../../index.php?p=module/petugas/index';
    </script>";
} else {
    echo "<script>
        windows.alert('Error, Periksa Data Kembali');
        windows.location='../../index.php?p=module/petugas/index';
</script>";
}
