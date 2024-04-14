<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda: Rp." . number_format($grand_total, 0, ',', '.');
                ?>
            </div>

            <br>
            <br>
            <h3> Input alamat Pengiriman dan Pembayaran</h3>
            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>">
                <div class="form-group">
                    <input type="hidden" name="id_user" placeholder="id" class="form-control" value="<?php echo $this->session->userdata('id'); ?>">
                </div>
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
                <div class=" form-group">
                    <label>Jasa Pengiriman</label>
                    <select>
                        <option>JNE</option>
                        <option>Gojek</option>
                        <option>Tiki</option>
                        <option>Grab</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select>
                        <option>BCA</option>
                        <option>BNI</option>
                        <option>BRI</option>
                        <option>Mandiri</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
            </form>
        <?php } else {
                    echo "<h4>Keranjang Anda Masih Kosong</h4>";
                } ?>
        <div class="col-md2"></div>
        </div>
    </div>