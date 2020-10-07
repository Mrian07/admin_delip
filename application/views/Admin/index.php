<!-- partial -->
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <a class="btn btn-info" href="<?= base_url(); ?>AdminMenu/tambah">
                        <i class="mdi mdi-plus-circle-outline"></i>Tambawdh Admin</a>
                </div>
                <br>
                <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('demo'); ?>
                        <?php echo $this->session->flashdata('hapus'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('ubah'); ?>
                        <?php echo $this->session->flashdata('tambah'); ?>
                    </div>
                <?php endif; ?>
                <h4 class="card-title">User</h4>
                <div class="tab-minimal tab-minimal-success">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-2-1" data-toggle="tab" href="#allusers-2-1" role="tab" aria-controls="allusers-2-1" aria-selected="true">
                                <i class="mdi mdi-account"></i>Semua Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#blocked-2-2" role="tab" aria-controls="blocked-2-2" aria-selected="false">
                                <i class="mdi mdi-account-off"></i>Admin</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <!-- all users -->
                        <div class="tab-pane fade show active" id="allusers-2-1" role="tabpanel" aria-labelledby="tab-2-1">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Semua Admin</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Admin Id</th>
                                                            <th>Photo Profil</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        foreach ($admin as $us) { ?>
                                                            <tr>
                                                                <td><?= $i ?></td>
                                                                <td><?= $us['id'] ?></td>
                                                                <td>
                                                                    <img src="<?= base_url('images/admin/') . $us['image']; ?>">
                                                                </td>
                                                                <td><?= $us['user_name'] ?></td>
                                                                <td><?= $us['email'] ?></td>
                                                                <!-- <td><?= $us['no_telepon'] ?></td> -->
                                                                <td>
                                                                    <?php if ($us['admin_role'] == 1) { ?>
                                                                        <label class="badge badge-success">Super Admin</label>
                                                                    <?php } else { ?>
                                                                        <label class="badge badge-dark">Admin</label>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>users/detail/<?= $us['id'] ?>">
                                                                        <button class="btn btn-outline-primary mr-2">Lihat</button>
                                                                    </a>
                                                                    <?php if ($us['admin_role'] == 0) { ?>
                                                                        <a href="<?= base_url(); ?>AdminMenu/ubahSuper/<?= $us['id'] ?>">
                                                                            <button class="btn btn-outline-success text-red mr-2">Super Admin</button>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a href="<?= base_url(); ?>AdminMenu/UbahAdmin/<?= $us['id'] ?>">
                                                                            <button class="btn btn-outline-dark text-dark mr-2"> Admin</button>
                                                                        </a>
                                                                    <?php } ?>
                                                                    <a href="<?= base_url(); ?>AdminMenu/hapusAdmin/<?= $us['id'] ?>">
                                                                        <button onclick="return confirm ('Are You Sure?')" class="btn btn-outline-danger text-red mr-2">Hapus</button>
                                                                    </a>
                                                                </td>
                                                            <?php $i++;
                                                        } ?>
                                                            </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of all users -->

                        <!-- blocked users -->
                        <div class="tab-pane fade" id="blocked-2-2" role="tabpanel" aria-labelledby="tab-2-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Semua Admin</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Admin Id</th>
                                                            <th>Photo Profil</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        foreach ($admin as $us) {
                                                            if ($us['admin_role'] == 0) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?= $us['id'] ?></td>
                                                                    <td>
                                                                        <img src="<?= base_url('images/admin/') . $us['image']; ?>">
                                                                    </td>
                                                                    <td><?= $us['user_name'] ?></td>
                                                                    <td><?= $us['email'] ?></td>
                                                                    <td>
                                                                        <?php if ($us['admin_role'] == 1) { ?>
                                                                            <label class="badge badge-success">Super Admin</label>
                                                                        <?php } else { ?>
                                                                            <label class="badge badge-dark">Admin</label>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?= base_url(); ?>users/detail/<?= $us['id'] ?>">
                                                                            <button class="btn btn-outline-primary mr-2">Lihat</button>
                                                                        </a>
                                                                        <a href="<?= base_url(); ?>AdminMenu/ubahSuper/<?= $us['id'] ?>">
                                                                            <button class="btn btn-outline-success text-red mr-2">Super Admin</button>
                                                                        </a>

                                                                        <a href="<?= base_url(); ?>AdminMenu/hapusAdmin/<?= $us['id'] ?>">
                                                                            <button class="btn btn-outline-danger text-red mr-2">Hapus</button>
                                                                        </a>
                                                                    </td>
                                                            <?php $i++;
                                                            }
                                                        } ?>
                                                                </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of blocked -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- content-wrapper ends -->