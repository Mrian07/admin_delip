<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="row user-profile">
        <div class="col-lg-4 side-left d-flex align-items-stretch">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body avatar">
                            <div class="row">
                                <h4 class="col-auto mr-auto card-title">Info Admin</h4>
                                <a class="col-auto btn btn-danger text-white" href="<?= base_url() ?>AdminMenu">
                                    <i class="mdi mdi-keyboard-backspace text-white"></i>Kembali</a>
                            </div>
                            <img src="<?= base_url('images/admin/') . $admin['image']; ?>">
                            <p class="name"><?= $admin['user_name'] ?></p>
                          
                            <p class="text-center">
                                <?= $admin['user_name'] ?>
                            </p>
                            <span class="d-block text-center text-dark"><?= $admin['email'] ?></span>
                            <!-- <span class="d-block text-center text-dark"><?= $admin['no_telepon'] ?></span> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body overview">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 side-right stretch-card">
            <div class="card">

                <div class="card-body">
                    <?php if ($this->session->flashdata('ubah')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('ubah'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('demo')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('demo'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Detail Admin</h4>
                        <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Photo Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Password</a>
                            </li>


                        </ul>
                    </div>
                    <div class="wrapper">

                        <hr>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                                <?= form_open_multipart('AdminMenu/ubahid'); ?>
                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="user_name" value="<?= $admin['user_name'] ?>" required>
                                </div>

                                <label class="text-small">Nomor hp</label>
                                    <!-- <?= $admin['admin_role'] ?> -->
                                <div class="row">
                            <select class="form-control" name="admin_role" id="admin_role">

                                        <option value="0" <?php if($admin['admin_role']==0){?> selected<?php }?> >Admin</option>
                                        <option value="1" <?php if($admin['admin_role']==1){?> selected<?php }?> >Super Admin</option>
                                    </select>


                                    <!-- <div class=" form-group col-10">
                                        <input type="text" class="form-control" id="admin_role" name="admin_role" value="<?= $admin['admin_role'] ?>" required>
                                    </div> -->
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $admin['email'] ?>" placeholder="Change email address" required>
                                </div>
                                <div class="form-group mt-5">
                                    <button type="submit" class="btn btn-success mr-2">Perbarui</button>

                                    <a class="col-auto btn btn-danger text-white" href="<?= base_url() ?>AdminMenu">
                                    <i class="mdi mdi-keyboard-backspace text-white"></i>Batal</a>
                                </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                <?= form_open_multipart('users/ubahfoto'); ?>
                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                <input type="file" name="fotopelanggan" class="dropify" data-max-file-size="1mb" data-default-file="<?= base_url('images/admin/') . $admin['image'] ?>" />
                                <div class="form-group mt-5">
                                    <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                    <button class="btn btn-outline-danger">Batal</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <?= form_open_multipart('users/ubahpass'); ?>
                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="new-password" name="password" placeholder="Enter you new password" required>
                                </div>
                                <div class="form-group mt-5">
                                    <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                    <button class="btn btn-outline-danger">Batal</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<script type="text/javascript">
    $(function() {
        var code = "<?= $admin['countrycode'] ?>"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>