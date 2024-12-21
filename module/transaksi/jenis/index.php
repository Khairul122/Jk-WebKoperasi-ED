<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Jenis Transaksi</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Jenis Transaksi Koperasi</h4>
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
                                        <th>Jenis</th>
                                        <th>Tipe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM jenis_simpanan ORDER BY id_jenis DESC");
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= $row['jenis'] ?></td>
                                            <td><?= tipe($row['tipe']) ?></td>
                                            <td style="width:10%">
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" type="button" data-toggle="modal" data-target="#edit<?= $row['id_jenis'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="?p=module/transaksi/jenis/delete&id=<?= $row['id_jenis'] ?>" class="btn btn-danger shadow btn-xs sharp">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $row['id_jenis'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Update Jenis Simpanan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <?php
                                                    $id = $row['id_jenis'];
                                                    $select = $koneksi->query("SELECT * FROM jenis_simpanan WHERE id_jenis = '$id'");
                                                    $pecah = $select->fetch_assoc();
                                                    ?>
                                                    <div class="modal-body">
                                                        <form action="module/transaksi/jenis/aksi_edit.php" method="POST">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="<?= $pecah['id_jenis'] ?>">
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Jenis Simpanan</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="jenis" type="text" value="<?= $pecah['jenis'] ?>" placeholder="Simpan Pinjam">
                                                                </div>
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Tipe</label>
                                                                    <span class="text-danger">*</span>
                                                                    <select name="tipe" class="form-control">
                                                                        <option value="">--Pilih Tipe--</option>
                                                                        <option value="P" <?php
                                                                                            if ($pecah['tipe'] == 'P') {
                                                                                                echo 'selected="selected"';
                                                                                            }
                                                                                            ?>>Pinjaman</option>
                                                                        <option value="S" <?php
                                                                                            if ($pecah['tipe'] == 'S') {
                                                                                                echo 'selected="selected"';
                                                                                            }
                                                                                            ?>>Simpanan</option>
                                                                    </select>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Simpanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="module/transaksi/jenis/aksi_simpan.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="form-label">Jenis Simpanan</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="jenis" type="text" placeholder="Simpan Pinjam">
                        </div>
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="form-label">Tipe</label>
                            <span class="text-danger">*</span>
                            <select name="tipe" class="form-control">
                                <option>-Pilih Tipe-</option>
                                <option value="P">Pinjaman</option>
                                <option value="S">Simpanan</option>
                            </select>
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