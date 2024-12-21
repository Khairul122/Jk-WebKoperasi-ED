<?php

include "../../config/database.php";


$name     = $_POST['name'];
$phone    = $_POST['phone'];
$email    = $_POST['email'];
$options  = ['cost' => 10,];
$password = $_POST['password'];
$hash     = password_hash($password, PASSWORD_DEFAULT, $options);
$jabatan    = $_POST['jabatan'];

$simpan   = $koneksi->query("INSERT INTO users (name, email, phone, password, level_id, status) VALUES ('$name','$email','$phone','$hash','$jabatan','1')");

if ($simpan) {
  echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../index.php?p=module/petugas/index'
          </script>";
} else {
  echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../index.php?p=module/petugas/index'
          </script>";
}
