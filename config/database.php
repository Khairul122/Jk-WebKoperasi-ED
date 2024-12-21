<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

function TanggalIndo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}

function formatRupiah($angka)
{

    if (is_numeric($angka)) {
        $format_rupiah = 'Rp ' . number_format($angka, '2', ',', '.');
        return $format_rupiah;
    } else {
        echo "$angka" . " bukan angka yang valid!" . "\n";
    }
}

function bulanIndo($angka_bulan)
{
    $hasil = array(
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember",
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September"
    );
    return $hasil[$angka_bulan];
}

function bulanIndonesia($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);

    $result = $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}

function color($status)
{
    if ($status == 1) {
        $color = 'success';
    } elseif ($status == 2) {
        $color = 'danger';
    }
    return $color;
}

function jekel($status)
{
    if ($status == 'L') {
        $jekel = 'Laki - Laki';
    } else {
        $jekel = 'Perempuan';
    }
    return $jekel;
}

function tipe($status)
{
    if ($status == 'P') {
        $tipe = 'Pinjaman';
    } else {
        $tipe = 'Simpanan';
    }
    return $tipe;
}

function status($status)
{
    if ($status == 'BL') {
        $tipe = 'Belum Lunas';
    } else {
        $tipe = 'Lunas';
    }
    return $tipe;
}
