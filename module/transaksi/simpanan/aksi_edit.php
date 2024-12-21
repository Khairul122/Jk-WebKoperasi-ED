<?php

include "../../../config/database.php";

$id         = $_POST['id'];
$tanggal    = $_POST['tanggal'];
$anggota    = $_POST['anggota'];
$jenis      = $_POST['jenis'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];



$update = $koneksi->query("UPDATE simpanan SET id_anggota = '$anggota', jenis = '$id_jenis', tanggal = '$tanggal', nominal = '$nominal', keterangan = '$keterangan' WHERE id_simpanan = '$id'");

if ($update) {
    echo "<script>
        window.alert('Sukses, Data Telah Di Update');
        window.location='../../../index.php?p=module/simpanan/index';
    </script>";
} else {
    echo "<script>
        windows.alert('Error, Periksa Data Kembali');
        windows.location='../../../index.php?p=module/simpanan/index';
</script>";
}
