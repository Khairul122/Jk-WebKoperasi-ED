<?php

include "../../../config/database.php";

$id         = $_POST['id'];
$jenis      = $_POST['jenis'];
$tipe       = $_POST['tipe'];

$update = $koneksi->query("UPDATE jenis_simpanan SET jenis = '$jenis', tipe = '$tipe' WHERE id_jenis = '$id'");

if ($update) {
    echo "<script>
        window.alert('Sukses, Data Telah Di Update');
        window.location='../../../index.php?p=module/jenis_simpanan/index';
    </script>";
} else {
    echo "<script>
        windows.alert('Error, Periksa Data Kembali');
        windows.location='../../../index.php?p=module/jenis_simpanan/index';
</script>";
}
