<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <br>
            <br>
            <h3> Input alamat Pengiriman dan Pembayaran</h3>
            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>">
                <div class="form-group">
                    <input type="hidden" name="id_user" placeholder="id" class="form-control" value="<?php echo $this->session->userdata('id'); ?>" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" placeholder="id" class="form-control" value="BelumBayar">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap anda" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap anda" class="form-control" value="<?php echo $this->session->userdata('alamat'); ?>" required>
                </div>
                <div class=" form-group">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" placeholder="No Telepon Anda" class="form-control" value="<?php echo $this->session->userdata('no_telp'); ?>" required>
                </div>
                <div class="form-group">
                    <label>Pilih Pembayaran</label>
                    <select name="pembayaran">
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="Dana">Dana</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="GoPay">GoPay</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
            </form>

            <div class="col-md2"></div>
        </div>
    </div>