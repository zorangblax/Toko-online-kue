<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <h3> Ubah Password</h3>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('gagal')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('gagal'); ?>
                </div>
            <?php endif; ?>
            <br>
            <form method="post" action="<?php echo base_url('edit_profile/change_password') ?>">
                <div class="form-group">
                    <label for="old_password">Password Lama</label>
                    <input type="password" name="old_password" placeholder="password lama" class="form-control">
                    <?php echo form_error('old_password', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" placeholder="password baru" class="form-control">
                    <?php echo form_error('new_password', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class=" form-group">
                    <label>Ulangi Password</label>
                    <input type="password" name="repeat_password" placeholder="ulangi password baru" class="form-control">
                    <?php echo form_error('repeat_password', '<div class="text-danger">', '<    /div>'); ?>
                </div>
                <button type="submit" class="btn btn-sm btn-success">Ubah</button>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('edit_profile') ?>">Kembali</a>
            </form>


            <div class="col-md2"></div>
        </div>
    </div>