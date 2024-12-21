<?php

include "../../../config/database.php";
$tanggal    = $_POST['tanggal'];
$anggota    = $_POST['anggota'];
$jenis      = $_POST['jenis'];
$nominal    = $_POST['nominal'];
$waktu      = $_POST['waktu'];
$keterangan = $_POST['keterangan'];


$cekSaldo       = $koneksi->query("SELECT * FROM saldo WHERE id_saldo = 1")->fetch_assoc();
$saldoKas       = $cekSaldo['kas'];
$saldoTerpakai  = $cekSaldo['terpakai'];

$saldo      = $saldoKas - $nominal;
$terpakai   = $saldoTerpakai + $nominal;

$jumlah = $nominal + ($nominal * 0.1);

$bayar  = $jumlah / $waktu;

$transaksi   = $koneksi->query("INSERT INTO transaksi (tanggal, debit, kredit, saldo, keterangan) VALUES ('$tanggal','0','$nominal','$saldo','$keterangan')");

$idTransaksi = $koneksi->insert_id;

$simpan   = $koneksi->query("INSERT INTO pinjaman (id_transaksi, id_anggota, id_jenis, nominal, jangka_waktu, jumlah_pembayaran, nominal_bayar, status) VALUES ('$idTransaksi','$anggota','$jenis','$nominal','$waktu','$jumlah','$bayar','BL')");

if ($simpan) {
    $updatesaldo = $koneksi->query("UPDATE saldo SET kas = '$saldo', terpakai = '$terpakai' WHERE id_saldo = 1");
    echo "<script>
            alert('Sukses, Data Telah Ditambahkan')
            window.location = '../../../index.php?p=module/transaksi/pinjaman/index'
        </script>";
} else {
    echo "<script>
            alert('Error, Periksa Data Kembali')
            window.location = '../../../index.php?p=module/transaksi/pinjaman/index'
        </script>";
}
