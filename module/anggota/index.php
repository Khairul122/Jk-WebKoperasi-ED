<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Anggota</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Anggota Koperasi</h4>
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
                                        <th>ID Anggota</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Gaji Pokok</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM anggota a JOIN status b ON a.status = b.status_id ORDER BY a.anggota_id DESC");
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= $row['unique_id'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= jekel($row['jenis_kelamin']) ?></td>
                                            <td><?= formatRupiah($row['gaji']) ?></td>
                                            <td><span class="badge badge-<?= color($row['status_id']) ?>"><?= $row['status_name'] ?></span></td>
                                            <td style="width:10%">
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" type="button" data-toggle="modal" data-target="#edit<?= $row['anggota_id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    
                                                        <a href="?p=module/anggota/delete&id=<?= $row['anggota_id'] ?>" class="btn btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                </div>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $row['anggota_id'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Update Data Anggota</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <?php
                                                    $id = $row['anggota_id'];
                                                    $select = $koneksi->query("SELECT * FROM anggota a JOIN status b ON a.status  = b.status_id WHERE a.anggota_id = '$id'");
                                                    $pecah = $select->fetch_assoc();
                                                    ?>
                                                    <div class="modal-body">
                                                        <form action="module/anggota/aksi_edit.php" method="POST">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="<?= $pecah['anggota_id'] ?>">
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Nama</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="nama" value="<?= $pecah['nama'] ?>" type="text" autocomplete="off" placeholder="Nama Lengkap" autofocus>
                                                                </div>
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Jenis Kelamin</label>
                                                                    <span class="text-danger">*</span>
                                                                    <select name="jekel" class="form-control">
                                                                        <option value="">--Pilih Jenis Kelamin--</option>
                                                                        <option value="L" <?php
                                                                                            if ($pecah['jenis_kelamin'] == 'L') {
                                                                                                echo 'selected="selected"';
                                                                                            }
                                                                                            ?>>Laki - Laki</option>
                                                                        <option value="P" <?php
                                                                                            if ($pecah['jenis_kelamin'] == 'P') {
                                                                                                echo 'selected="selected"';
                                                                                            }
                                                                                            ?>>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Gaji Pokok</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="gaji" type="number" value="<?= $pecah['gaji'] ?>" placeholder="Gaji Pokok">
                                                                </div>
                                                                <div class="mb-3 col-md-12 col-sm-12">
                                                                    <label class="form-label">Status</label>
                                                                    <span class="text-danger">*</span>
                                                                    <?php $akses = $koneksi->query("SELECT * FROM status"); ?>
                                                                    <select name="status" class="form-control">;
                                                                        <?php foreach ($akses as $value) : ?>
                                                                            <option value="<?= $value['status_id'] ?>" <?php
                                                                                                                        if ($value['status_id'] == $row['status_id']) {
                                                                                                                            echo 'selected="selected"';
                                                                                                                        }
                                                                                                                        ?>>
                                                                                <?php echo $value['status_name']; ?>
                                                                            </option>
                                                                        <?php endforeach ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="module/anggota/aksi_simpan.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="form-label">Nama</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="nama" type="text" placeholder="Nama Anggota" autofocus>
                        </div>
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="form-label">Jenis Kelamin</label>
                            <span class="text-danger">*</span>
                            <select name="jekel" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12 col-sm-12">
                            <label class="form-label">Gaji Pokok</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="gaji" type="number" placeholder="Gaji Pokok">
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