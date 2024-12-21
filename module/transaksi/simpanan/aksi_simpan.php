<?php

include "../../../config/database.php";
$tanggal    = $_POST['tanggal'];
$anggota    = $_POST['anggota'];
$jenis      = $_POST['jenis'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];


$cekSaldo   = $koneksi->query("SELECT * FROM saldo WHERE id_saldo = 1")->fetch_assoc();
$saldoKas   = $cekSaldo['kas'];
$saldoTotal = $cekSaldo['total'];

$saldo = $saldoKas + $nominal;
$total = $saldoTotal + $nominal;

$transaksi   = $koneksi->query("INSERT INTO transaksi (tanggal, debit, kredit, saldo, keterangan) VALUES ('$tanggal','$nominal','0','$saldo','$keterangan')");

$idTransaksi = $koneksi->insert_id;

$simpan   = $koneksi->query("INSERT INTO simpanan (id_anggota, id_transaksi, id_jenis, nominal) VALUES ('$anggota','$idTransaksi','$jenis','$nominal')");

if ($simpan) {
    $updatesaldo = $koneksi->query("UPDATE saldo SET total = '$total', kas = '$saldo' WHERE id_saldo = 1");
    echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../../index.php?p=module/simpanan/index'
        </script>";
} else {
    echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../../index.php?p=module/simpanan/index'
        </script>";
}
