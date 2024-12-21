<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Petugas</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Petugas Koperasi</h4>
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
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Telpon</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM users a JOIN level_akses b ON a.level_id = b.level_id JOIN status c ON a.status = c.status_id  WHERE a.level_id != 1 ORDER BY a.id DESC");
                                    foreach ($ambil as $no => $row) :
                                    ?>
                                        <tr>
                                            <td style="width:5%"><?= $no + 1 ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['level_akses'] ?></td>
                                            <td><span class="badge badge-<?= color($row['status_id']) ?>"><?= $row['status_name'] ?></span></td>
                                            <td style="width:10%">
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" type="button" data-toggle="modal" data-target="#edit<?= $row['id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <?php if ($row['level_id'] != 1) { ?>
                                                        <a href="?p=module/petugas/delete&id=<?= $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $row['id'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editLabel">Update Data Petugas</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <?php
                                                    $id = $row['id'];
                                                    $select = $koneksi->query("SELECT * FROM users a JOIN level_akses b ON a.level_id = b.level_id JOIN status c ON a.status  = c.status_id WHERE a.id = '$id'");
                                                    $pecah = $select->fetch_assoc();
                                                    ?>
                                                    <div class="modal-body">
                                                        <form action="module/petugas/aksi_edit.php" method="POST">
                                                            <div class="row">
                                                                <input type="hidden" name="id" value="<?= $pecah['id'] ?>">
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Nama</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="name" value="<?= $pecah['name'] ?>" type="text" autocomplete="off" placeholder="Nama Lengkap" autofocus>
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Email</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="email" value="<?= $pecah['email'] ?>" type="email" autocomplete="off" placeholder="Ex: nama@gmail.com">
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">No Telp</label>
                                                                    <span class="text-danger">*</span>
                                                                    <input class="form-control" name="phone" value="<?= $pecah['phone'] ?>" type="number" autocomplete="off" placeholder="Ex: 0822xxxxxxxx">
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Password</label>
                                                                    <input class="form-control" name="password" type="password" autocomplete="off" placeholder="ex: 123456">
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
                                                                    <label class="form-label">Jabatan</label>
                                                                    <span class="text-danger">*</span>
                                                                    <?php $jb = $koneksi->query("SELECT * FROM level_akses WHERE NOT level_id = 1"); ?>
                                                                    <select name="jabatan" class="form-control">;
                                                                        <?php foreach ($jb as $jj) : ?>
                                                                            <option value="<?= $jj['level_id'] ?>" <?php
                                                                                                                    if ($jj['level_id'] == $row['level_id']) {
                                                                                                                        echo 'selected="selected"';
                                                                                                                    }
                                                                                                                    ?>>
                                                                                <?= $jj['level_akses']; ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4 col-sm-12">
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
                                                                                <?= $value['status_name']; ?>
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-12 col-sm-12">
                                                                <div class="blockquote-footer mt-2">
                                                                    <span class="text-danger">
                                                                        <b>NB:</b> Kosongkan password jika tidak ingin
                                                                        mengganti
                                                                    </span>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="module/petugas/aksi_simpan.php" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Nama Lengkap</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="name" type="text" autocomplete="off" placeholder="Nama Lengkap" autofocus>
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Email</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="email" type="email" autocomplete="off" placeholder="Email Address">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">No Telp.</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="phone" type="number" autocomplete="off" placeholder="No Telp">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Password</label>
                            <span class="text-danger">*</span>
                            <input class="form-control" name="password" type="password" autocomplete="off" placeholder="Password">
                        </div>
                        <div class="mb-3 col-md-4 col-sm-12">
                            <label class="form-label">Jabatan</label>
                            <span class="text-danger">*</span>
                            <?php $jabatan = $koneksi->query("SELECT * FROM level_akses WHERE NOT level_id = 1"); ?>
                            <select name="jabatan" class="form-control">;
                                <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j['level_id'] ?>"><?= $j['level_akses']; ?></option>
                                <?php endforeach ?>
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