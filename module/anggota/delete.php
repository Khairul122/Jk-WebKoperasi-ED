<?php

$idhapus = $_GET['id'];
$hapus   = $koneksi->query("DELETE FROM users WHERE id = '$idhapus'");

if ($hapus) {
    echo "<script>
    alert('Sukses, Data Telah Dihapus');
    window.location='index.php?p=module/anggota/index';
    </script>";
} else {
    echo "<script>
    alert('Gagal, Periksa Data Kembali');
    window.location='index.php?p=module/anggota/index';
    </script>";
}
