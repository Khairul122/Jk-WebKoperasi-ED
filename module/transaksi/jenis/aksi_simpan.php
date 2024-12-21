<?php

include "../../../config/database.php";
$jenis      = $_POST['jenis'];
$tipe       = $_POST['tipe'];

$simpan   = $koneksi->query("INSERT INTO jenis_simpanan (jenis,tipe) VALUES ('$jenis','$tipe')");

if ($simpan) {
    echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../../index.php?p=module/jenis_simpanan/index'
        </script>";
} else {
    echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../../index.php?p=module/jenis_simpanan/index'
        </script>";
}
