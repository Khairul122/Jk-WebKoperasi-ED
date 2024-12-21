<?php

include "../../config/database.php";


$nama     = $_POST['nama'];
$jekel    = $_POST['jekel'];
$gaji     = $_POST['gaji'];

$cek = $koneksi->query("SELECT COUNT(*) as total FROM anggota")->fetch_assoc();
$total = $cek['total'];
$month = date('m');
$years = date('Y');

if ($total <= 9) {
  $nilai = '00' . $total;
} elseif ($total > 9 && $total <= 99) {
  $nilai = '0' . $total;
}

$uniqueId = $years . $month . $nilai;

$simpan   = $koneksi->query("INSERT INTO anggota (unique_id, nama, jenis_kelamin, gaji, status) VALUES ('$uniqueId','$nama','$jekel','$gaji','1')");

if ($simpan) {
  echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../index.php?p=module/anggota/index'
          </script>";
} else {
  echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../index.php?p=module/anggota/index'
          </script>";
}
