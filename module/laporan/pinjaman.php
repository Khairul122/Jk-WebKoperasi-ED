<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Pinjaman</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Pinjaman</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="container mb-4">
                                <div class="form-group row mr-2">
                                    <div class="col-md-4">
                                        <p class="mb-1">Dari</p>
                                        <input name="tgl_awal" class="datepicker-default form-control" id="tgl_awal" value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal']; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1">Sampai</p>
                                        <input name="tgl_akhir" class="datepicker-default form-control" id="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir']; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mt-2">
                                            <br>
                                            <input type="submit" class="btn btn-block btn-primary btn-md" value="Filter">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mt-2">
                                            <br>
                                            <a href="module/laporan/printPinjaman.php" target="_blank" class="btn btn-block btn-info btn-md">
                                                <i class="fa fa-print"></i>
                                                Print
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function() {
                                    $(".datepicker-default").datepicker({
                                        format: 'dd-mm-yyyy',
                                        autoclose: true,
                                        todayHighlight: false,
                                    });
                                    $("#tgl_awal").on('changeDate', function(selected) {
                                        var startDate = new Date(selected.date.valueOf());
                                        $("#tgl_akhir").datepicker('setStartDate', startDate);
                                        if ($("#tgl_awal").val() > $("#tgl_akhir").val()) {
                                            $("#tgl_akhir").val($("#tgl_awal").val());
                                        }
                                    });
                                });
                            </script>
                        </form>
                        <div class="table-responsive">
                            <table id="example" class="display" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Total Pinjaman</th>
                                        <th>Jangka Waktu</th>
                                        <th>Total Bayar</th>
                                        <th>Dibayar</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                        $tgl_awal = date('Y-m-d', strtotime($_POST["tgl_awal"]));
                                        $tgl_akhir = date('Y-m-d', strtotime($_POST["tgl_akhir"]));

                                        $ambil = $koneksi->query("SELECT d.tanggal, b.nama, c.jenis, a.nominal, a.jangka_waktu, a.jumlah_pembayaran, a.nominal_bayar, a.status FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id JOIN jenis_simpanan c ON a.id_jenis = c.id_jenis JOIN transaksi d ON a.id_transaksi = d.id_transaksi WHERE d.tanggal BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' ORDER BY d.tanggal DESC");
                                    } else {
                                        $ambil = $koneksi->query("SELECT d.tanggal, b.nama, c.jenis, a.nominal, a.jangka_waktu, a.jumlah_pembayaran, a.nominal_bayar, a.status FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id JOIN jenis_simpanan c ON a.id_jenis = c.id_jenis JOIN transaksi d ON a.id_transaksi = d.id_transaksi ORDER BY d.tanggal DESC");
                                    }
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= TanggalIndo($row['tanggal']) ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['jenis'] ?></td>
                                            <td><?= formatRupiah($row['nominal']) ?></td>
                                            <td><?= $row['jangka_waktu'] ?> Bulan</td>
                                            <td><?= formatRupiah($row['jumlah_pembayaran']); ?></td>
                                            <td><?= formatRupiah($row['nominal_bayar']); ?></td>
                                            <td><?= status($row['status']) ?></td>
                                            <!-- <td><?= $row['keterangan'] ?></td> -->
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>