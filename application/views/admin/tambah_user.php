<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <br>
            <br>
            <form method="post" action="<?php echo base_url('admin/data_user/tambahuser') ?>" class="user">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nama" name="nama">
                        <?php echo form_error('nama', '<div class="text-danger small">', '</div>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="No telp" name="no_telp">
                        <?php echo form_error('no_telp', '<div class="text-danger small">', '</div>') ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat" name="alamat">
                    <?php echo form_error('alamat', '<div class="text-danger small">', '</div>') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="email" name="email">
                    <?php echo form_error('email', '<div class="text-danger small">', '</div>') ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1">
                        <?php echo form_error('password_1', '<div class="text-danger small">', '</div>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" name="role">
                        <option value="">---Pilih Role---</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">Kurir</option>
                    </select>
                    <?php echo form_error('role', '<div class="text-danger small">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block"> Daftarkan Akun</button>
                <a href="<?php echo base_url('admin/data_user') ?>" class=" btn btn-danger btn-user btn-block">Kembali</a>
            </form>

            <div class="col-md2"></div>
        </div>
    </div>