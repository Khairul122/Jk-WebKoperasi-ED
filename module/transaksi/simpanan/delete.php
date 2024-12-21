<?php

$idhapus = $_GET['id'];
$saldo   = 150000;

$ceksaldo = $koneksi->query("SELECT * saldo WHERE id_saldo = 1")->fetch_assoc();
$saldototal = $ceksaldo['total'];
$saldokas   = $ceksaldo['kas'];

$updatetotal = $saldototal - $saldo;
$updatekas   = $saldokas - $saldo;
$update  = $koneksi->query("UPDATE saldo SET total = '$updatetotal', kas = '$updatekas' WHERE id_saldo = 1");
$hapus   = $koneksi->query("DELETE FROM simpanan WHERE id_simpanan = '$idhapus'");

if ($hapus) {
    echo "<script>
    alert('Sukses, Data Telah Dihapus');
    window.location='index.php?p=module/transaksi/simpanan/masuk/index';
    </script>";
} else {
    echo "<script>
    alert('Gagal, Periksa Data Kembali');
    window.location='index.php?p=module/transaksi/simpanan/masuk/index';
    </script>";
}
