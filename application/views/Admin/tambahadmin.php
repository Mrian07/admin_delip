<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="row ">
        <div class="col-md-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Admin</h4>
                    <?php if ($this->session->flashdata() or validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                            <?php echo $this->session->flashdata('invalid'); ?>
                            <?php echo $this->session->flashdata('demo'); ?>
                        </div>
                    <?php endif; ?>
                    <?= form_open_multipart('AdminMenu/tambah'); ?>

                    <div class="form-group">
                        <label>Photo Profil</label>
                        <input type="file" name="fotopelanggan" id="fotopelanggan" class="dropify" data-max-file-size="3mb">
                    </div>

                    <div class="form-group">
                        <label for="fullnama">UserName</label>
                        <input type="text" class="form-control" id="fullnama" name="fullnama" placeholder="enter name" <?php if ($_POST != NULL) { ?> value="<?= $_POST['fullnama']; ?>" <?php } ?> required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="enter email " <?php if ($_POST != NULL) { ?> value="<?= $_POST['email']; ?>" <?php } ?> required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Status Admin</label>

                        <select class="form-control" name="statusAdmin" id="statusAdmin">
                            <option value="0">Admin</option>
                            <option value="1">Super Admin</option>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-success mr-2">Kirim</button>

                    <a class="btn btn-primary" href="<?= base_url(); ?>AdminMenu/">
                    Batal
                    
                    </a>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var code = "+62"; // Assigning value from model.
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
<!-- end of content wrapper -->