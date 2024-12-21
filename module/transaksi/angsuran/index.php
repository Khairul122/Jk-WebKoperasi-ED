<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Angsuran</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Angsuran Pinjaman</h4>
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
                                        <th>Jumlah Pinjaman</th>
                                        <th>Jangka Waktu</th>
                                        <th>Pembayaran</th>
                                        <th>Keterangan</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT a.id_angsuran, d.tanggal, c.nama, b.nominal, b.jangka_waktu, a.nominal as pembayaran, a.keterangan FROM angsuran a JOIN pinjaman b ON a.id_pinjaman = b.id_pinjaman JOIN anggota c ON b.id_anggota = c.anggota_id JOIN transaksi d ON b.id_transaksi = d.id_transaksi ORDER BY a.id_angsuran DESC");
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= TanggalIndo($row['tanggal']) ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= formatRupiah($row['nominal']) ?></td>
                                            <td><?= $row['jangka_waktu'] ?> Bulan</td>
                                            <td><?= formatRupiah($row['pembayaran']) ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <!-- <td style="width:10%">
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" type="button" data-toggle="modal" data-target="#edit<?= $row['id_angsuran'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="?p=module/transaksi/angsuran/delete&id=<?= $row['id_angsuran'] ?>" class="btn btn-danger shadow btn-xs sharp">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td> -->
                                        </tr>
                                        <div class="modal fade" id="edit<?= $row['id_angsuran'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Update Data Simpanan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <?php
                                                    $id = $row['id_angsuran'];
                                                    $select = $koneksi->query("SELECT a.id_angsuran, d.tanggal, c.nama, b.nominal, b.jangka_waktu, a.nominal as pembayaran, d.keterangan FROM angsuran a JOIN pinjaman b ON a.id_pinjaman = b.id_pinjaman JOIN anggota c ON b.id_anggota = c.anggota_id JOIN transaksi d ON b.id_transaksi = d.id_transaksi WHERE a.id_angsuran = '$id'");
                                                    $pecah = $select->fetch_assoc();
                                                    ?>
                                                    <div class="modal-body">
                                                        <form action="module/transaksi/angsuran/aksi_edit.php" method="POST">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="<?= $pecah['id_angsuran'] ?>">
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Tanggal</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="tanggal" value="<?= $pecah['tanggal'] ?>" type="date">
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Nama Anggota</label>
                                                                    <span class="text-danger">*</span>
                                                                    <?php $anggota = $koneksi->query("SELECT * FROM anggota ORDER BY nama ASC"); ?>
                                                                    <select name="anggota" class="form-control">;
                                                                        <?php foreach ($anggota as $an) : ?>
                                                                            <option value="<?= $an['anggota_id'] ?>" <?php
                                                                                                                        if ($an['anggota_id'] == $row['id_anggota']) {
                                                                                                                            echo 'selected="selected"';
                                                                                                                        }
                                                                                                                        ?>>
                                                                                <?= $an['nama']; ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Jenis</label>
                                                                    <span class="text-danger">*</span>
                                                                    <?php $jenis = $koneksi->query("SELECT * FROM jenis_simpanan WHERE tipe = 'S'"); ?>
                                                                    <select name="jenis" class="form-control">;
                                                                        <?php foreach ($jenis as $j) : ?>
                                                                            <option value="<?= $j['id_jenis'] ?>" <?php
                                                                                                                    if ($j['id_jenis'] == $row['id_jenis']) {
                                                                                                                        echo 'selected="selected"';
                                                                                                                    }
                                                                                                                    ?>>
                                                                                <?= $j['jenis']; ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Nominal</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="nominal" value="<?= $pecah['nominal'] ?>" type="number" placeholder="Ex: 200000">
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Keterangan</label>
                                                                    <input class="form-control" name="keterangan" type="text" placeholder="ex: Simpanan bulan mai 2023" value="<?= $pecah['keterangan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <button class="btn btn-warning btn-md" type="button" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-success btn-md" type="submit" name="update">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Angsuran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="module/transaksi/angsuran/aksi_simpan.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Tanggal</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="tanggal" type="date">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Pinjaman</label>
                            <span class="text-danger">*</span>
                            <?php $pinjaman = $koneksi->query("SELECT * FROM pinjaman a JOIN anggota b ON a.id_anggota = b.anggota_id WHERE a.status = 'BL' ORDER BY b.nama ASC"); ?>
                            <select name="pinjaman" class="form-control">;
                                <?php foreach ($pinjaman as $an) : ?>
                                    <option value="<?= $an['id_pinjaman'] ?>"><?= $an['nama']; ?> - <?= $an['nominal'] ?> <?= $an['jangka_waktu'] ?> Bulan</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Nominal Bayar</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="nominal" type="number" placeholder="Ex: 200000">
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