<?php

include "../../../config/database.php";
$tanggal    = $_POST['tanggal'];
$pinjaman   = $_POST['pinjaman'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];


$cekSaldo   = $koneksi->query("SELECT * FROM saldo WHERE id_saldo = 1")->fetch_assoc();
$saldoKas   = $cekSaldo['kas'];
$saldoTotal = $cekSaldo['total'];

$saldo = $saldoKas + $nominal;
$total = $saldoTotal + $nominal;

$transaksi   = $koneksi->query("INSERT INTO transaksi (tanggal, debit, kredit, saldo, keterangan) VALUES ('$tanggal','$nominal','0','$saldo','$keterangan')");

$idTransaksi = $koneksi->insert_id;

$simpan   = $koneksi->query("INSERT INTO angsuran (id_transaksi, id_pinjaman, nominal, keterangan) VALUES ('$idTransaksi','$pinjaman','$nominal','$keterangan')");

if ($simpan) {
    $updatesaldo = $koneksi->query("UPDATE saldo SET total = '$total', kas = '$saldo' WHERE id_saldo = 1");
    echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../../index.php?p=module/transaksi/angsuran/index'
        </script>";
} else {
    echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../../index.php?p=module/transaksi/angsuran/index'
        </script>";
}
