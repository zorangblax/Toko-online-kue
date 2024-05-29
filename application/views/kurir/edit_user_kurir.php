<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <br>
            <br>
            <h3> Edit User</h3>
            <form method="post" action="<?php echo base_url('edit_profile/proses_edit_kurir') ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap anda" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat'); ?>">
                </div>
                <div class=" form-group">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" placeholder="No Telepon Anda" class="form-control" value="<?php echo $this->session->userdata('no_telp'); ?>">
                </div>
                <button type="submit" class="btn btn-sm btn-success">Edit</button>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('kurir/shipping') ?>">Kembali</a>
                <div class="text-right"> <!-- Menempatkan tombol "Ubah Password" di sebelah kanan -->
                    <a class="btn btn-sm btn-success" href="<?php echo base_url('edit_profile/change_password_kurir') ?>">Ubah Password -----></a>
                </div>
            </form>


            <div class="col-md2"></div>
        </div>
    </div>