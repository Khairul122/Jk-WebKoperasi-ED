<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pinjaman</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pinjaman Anggota</h4>
                        <button class="btn btn-primary m-b-15" type="button" data-toggle="modal" data-target="#exampleModal" style="float: right;">
                            <i class="icon wb-plus" aria-hidden="true"></i> Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Nominal</th>
                                        <th>Jangka Waktu</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Angsuran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT d.tanggal, b.nama, c.jenis, a.nominal, a.jangka_waktu, a.jumlah_pembayaran, a.nominal_bayar, a.status FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id JOIN jenis_simpanan c ON a.id_jenis = c.id_jenis JOIN transaksi d ON a.id_transaksi = d.id_transaksi ORDER BY a.id_pinjaman DESC");
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= TanggalIndo($row['tanggal']) ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['jenis'] ?></td>
                                            <td><?= formatRupiah($row['nominal']) ?></td>
                                            <td><?= $row['jangka_waktu'] ?> Bulan</td>
                                            <td><?= formatRupiah($row['jumlah_pembayaran']) ?></td>
                                            <td><?= formatRupiah($row['nominal_bayar']) ?></td>
                                            <td><?= status($row['status']) ?></td>
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
<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pinjaman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="module/transaksi/pinjaman/aksi_simpan.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Tanggal</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="tanggal" type="date">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Nama Anggota</label>
                            <span class="text-danger">*</span>
                            <?php $anggota = $koneksi->query("SELECT * FROM anggota ORDER BY nama ASC"); ?>
                            <select name="anggota" class="form-control">;
                                <?php foreach ($anggota as $an) : ?>
                                    <option value="<?= $an['anggota_id'] ?>"><?= $an['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Jenis</label>
                            <span class="text-danger">*</span>
                            <?php $jenis = $koneksi->query("SELECT * FROM jenis_simpanan WHERE tipe = 'P'"); ?>
                            <select name="jenis" class="form-control">;
                                <?php foreach ($jenis as $j) : ?>
                                    <option value="<?= $j['id_jenis'] ?>"><?= $j['jenis']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Nominal</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="nominal" type="number" placeholder="Ex: 200000">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Jangka Waktu</label>
                            <span class="text-danger">*</span>
                            <select name="waktu" class="form-control">
                                <option value="">-Pilih Jangka Waktu-</option>
                                <option value="6">6 Bulan</option>
                                <option value="12">12 Bulan</option>
                                <option value="18">18 Bulan</option>
                                <option value="24">24 Bulan</option>
                                <option value="30">30 Bulan</option>
                                <option value="36">36 Bulan</option>
                                <option value="42">42 Bulan</option>
                                <option value="48">48 Bulan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Keterangan</label>
                            <input class="form-control" name="keterangan" type="text" placeholder="ex: Simpanan bulan mai 2023">
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit" name="simpan">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>