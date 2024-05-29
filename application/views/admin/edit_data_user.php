<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <br>
            <br>
            <h3> Edit User</h3>
            <form method="post" action="<?php echo base_url('admin/data_user/proses_edit_user') ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $user['id']; ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="username" class="form-control" value="<?php echo $user['username']; ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Alamat Lengkap anda" class="form-control" value="<?php echo $user['password']; ?>">
                </div>
                <button type="submit" class="btn btn-sm btn-success">Edit</button>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_user') ?>">Kembali</a>
            </form>


            <div class="col-md2"></div>
        </div>
    </div>