<?php
include '../../config/database.php';
?>
<!DOCTYPE html>
<html>

<body>

    <center>
        <h2>DATA LAPORAN TRANSAKSI</h2>
    </center>



    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
            <th>Keterangan</th>
        </tr>
        <?php
        if (isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {

            $tgl_awal = date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir = date('Y-m-d', strtotime($_POST["tgl_akhir"]));


            $ambil = $koneksi->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY tanggal DESC");
        } else {
            $ambil = $koneksi->query("SELECT * FROM transaksi ORDER BY tanggal DESC");
        }
        foreach ($ambil as $no => $row) :
        ?>
            <tr>
                <td style="width:5%"><?= $no + 1 ?></td>
                <td><?= TanggalIndo($row['tanggal']) ?></td>
                <td><?= formatRupiah($row['debit']) ?></td>
                <td><?= formatRupiah($row['kredit']); ?></td>
                <td><?= formatRupiah($row['saldo']); ?></td>
                <td><?= $row['keterangan'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>