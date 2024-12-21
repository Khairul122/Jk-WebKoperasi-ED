<?php

include "../../config/database.php";

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$jekel    = $_POST['jekel'];
$gaji     = $_POST['gaji'];
$status   = $_POST['status'];


$update = $koneksi->query("UPDATE anggota nama = '$nama', jenis_kelamin = '$jekel', gaji = '$gaji', status = '$status' WHERE anggota_id = '$id'");

if ($update) {
    echo "<script>
        window.alert('Sukses, Data Telah Di Update');
        window.location='../../index.php?p=module/anggota/index';
    </script>";
} else {
    echo "<script>
        windows.alert('Error, Periksa Data Kembali');
        windows.location='../../index.php?p=module/anggota/index';
</script>";
}
