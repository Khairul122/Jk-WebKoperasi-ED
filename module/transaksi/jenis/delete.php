<?php

$idhapus = $_GET['id'];
$hapus   = $koneksi->query("DELETE FROM jenis_simpanan WHERE id_jenis = '$idhapus'");

if ($hapus) {
    echo "<script>
    alert('Sukses, Data Telah Dihapus');
    window.location='index.php?p=module/transaksi/jenis/index';
    </script>";
} else {
    echo "<script>
    alert('Gagal, Periksa Data Kembali');
    window.location='index.php?p=module/transaksi/jenis/index';
    </script>";
}
