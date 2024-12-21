<?php
include '../../config/database.php';
?>
<!DOCTYPE html>
<html>


<body>

    <center>
        <h2>DATA LAPORAN PINJAMAN KOPERASI</h2>
    </center>



    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jenis Pinjaman</th>
            <th>Total Pinjaman</th>
            <th>Jangka Waktu</th>
            <th>Total Bayar</th>
            <th>Dibayar</th>
            <th>Keterangan</th>
        </tr>
        <?php
        if (isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {

            $tgl_awal = date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir = date('Y-m-d', strtotime($_POST["tgl_akhir"]));


            $ambil = $koneksi->query("SELECT d.tanggal, b.nama, c.jenis, a.nominal, a.jangka_waktu, a.jumlah_pembayaran, a.nominal_bayar, a.status FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id JOIN jenis_simpanan c ON a.id_jenis = c.id_jenis JOIN transaksi d ON a.id_transaksi = d.id_transaksi WHERE d.tanggal BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY d.tanggal DESC");
        } else {
            $ambil = $koneksi->query("SELECT d.tanggal, b.nama, c.jenis, a.nominal, a.jangka_waktu, a.jumlah_pembayaran, a.nominal_bayar, a.status FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id JOIN jenis_simpanan c ON a.id_jenis = c.id_jenis JOIN transaksi d ON a.id_transaksi = d.id_transaksi WHERE d.tanggal ORDER BY d.tanggal DESC");
        }
        foreach ($ambil as $no => $row) :
        ?>
            <tr>
                <td style="width:5%"><?= $no + 1 ?></td>
                <td><?= TanggalIndo($row['tanggal']) ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis'] ?></td>
                <td><?= formatRupiah($row['nominal']) ?></td>
                <td><?= TanggalIndo($row['jangka_waktu']); ?> Bulan</td>
                <td><?= formatRupiah($row['jumlah_pembayaran']); ?></td>
                <td><?= formatRupiah($row['nominal_bayar']); ?></td>
                <td><?= status($row['status']) ?></td>
                <td><?= $row['keterangan'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>