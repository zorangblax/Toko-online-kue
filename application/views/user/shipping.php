<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Proses Pesanan
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($records) || is_object($records)) : ?> <!-- Ini adalah awal dari struktur kontrol if. Ini memeriksa apakah variabel $invoice merupakan tipe array atau objek.-->
                            <?php foreach ($records as $inv) : ?>
                                <?php if ($inv->status == 'Terima Pesanan') : ?>
                                    <tr style="text-decoration: line-through;">
                                    <?php else : ?>
                                    <tr>
                                    <?php endif ?>
                                    <td><?php echo $inv->nama ?></td>
                                    <td><?php echo $inv->alamat ?></td>
                                    <td><?php echo $inv->tgl_pesan ?></td>
                                    <td>
                                        <?php echo anchor('shipping/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                                        <?php if ($inv->status == 'BelumBayar') : ?>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Bayar">Bayar Sekarang</button>
                                        <?php elseif ($inv->status == 'Proses') : ?>
                                            <button type="button" class="btn btn-sm btn-warning">Proses</button>
                                        <?php elseif ($inv->status == 'dikirim') : ?>
                                            <button type="button" class="btn btn-sm btn-info">Dalam Perjalanan</button>
                                        <?php elseif ($inv->status == 'sampai') : ?>
                                            <button type="button" class="btn btn-sm btn-primary">Sudah Sampai</button>
                                            <?php echo anchor('shipping/terima_pesanan/' . $inv->id, '<div class="btn btn-sm btn-success">Terima Pesanan</div>') ?>
                                        <?php elseif ($inv->status == 'Terima Pesanan') : ?>
                                            <?php echo anchor('shipping/hapus/' . $inv->id, '<div class="btn btn-sm btn-danger">Hapus</div>') ?>
                                        <?php endif ?>
                                    </td>
                                    </tr>

                                <?php endforeach ?>
                            <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php if ($inv->pembayaran == 'Mandiri') : ?>
                        <div class="card" style="width: 18 rem;">
                            <img src="<?php echo base_url('assets/img/pembayaran/mandiri.png') ?>" class="card-img-top" alt="..." style="width: 50%; display: block; margin: 0 auto;">
                            <div class=" card-body">
                                <h5 class="card-title">No Transfer: 0198098192038</h5>
                                <p class="card-text"><span style="color: red;">Wajib</span> Kirim foto bukti hasil transfer ke whatsapp <span style="color:purple;">08139481374 Bagus Hary.</span> <span style="color: red;">Jika sudah dikirm maka Abaikan dan tunggu proses pesanannya</span></p>
                            </div>
                        </div>
                    <?php elseif ($inv->pembayaran == 'BRI') : ?>
                        <div class="card">
                            <img src="<?php echo base_url('assets/img/pembayaran/bri.png') ?>" class="card-img-top" alt="..." style="width: 50%; display: block; margin: 0 auto;">
                            <div class="card-body">
                                <h5 class="card-title">No Transfer: 62487687234</h5>
                                <p class="card-text"><span style="color: red;">Wajib</span> Kirim foto bukti hasil transfer ke whatsapp <span style="color: darkblue;">0882374234 Muhammad Fahreza.</span> <span style="color: red;">Jika sudah dikirm maka Abaikan dan tunggu proses pesanannya</span></p>

                            </div>
                        </div>
                    <?php elseif ($inv->pembayaran == 'BCA') : ?>
                        <div class="card">
                            <img src="<?php echo base_url('assets/img/pembayaran/bca.png') ?>" class="card-img-top" alt="..." style="width: 50%; display: block; margin: 0 auto;">
                            <div class="card-body">
                                <h5 class="card-title">No Transfer: 12653879438</h5>
                                <p class="card-text"><span style="color: red;">Wajib</span> Kirim foto bukti hasil transfer ke whatsapp <span style="color: brown;">08822872364 Thomas Febry Cahyono.</span> <span style="color: red;">Jika sudah dikirm maka Abaikan dan tunggu proses pesanannya</span></p>

                            </div>
                        </div>
                    <?php elseif ($inv->pembayaran == 'Dana') : ?>
                        <div class="card">
                            <img src="<?php echo base_url('assets/img/pembayaran/dana1.png') ?>" class="card-img-top" alt="..." style="width: 50%; display: block; margin: 0 auto;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text"><span style="color: red;">Wajib</span> Kirim foto bukti hasil transfer ke whatsapp <span style="color: blue;">088228987 Sirajjudin.</span> <span style="color: red;">Jika sudah dikirm maka Abaikan dan tunggu proses pesanannya</span></p>

                            </div>
                        </div>
                    <?php elseif ($inv->pembayaran == 'GoPay') : ?>
                        <div class="card">
                            <img src="<?php echo base_url('assets/img/pembayaran/gopay.png') ?>" class="card-img-top" alt="..." style="width: 50%; display: block; margin: 0 auto;">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text"><span style="color: red;">Wajib</span> Kirim foto bukti hasil transfer ke whatsapp <span style="color:black;">088243553 Galeh Pamungkas.</span> <span style="color: red;">Jika sudah dikirm maka Abaikan dan tunggu proses pesanannya</span></p>

                            </div>
                        </div>
                    <?php endif ?>
                    <form action="<?php echo base_url('shipping/ubah_metode_pembayaran') ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="idpsn" class=" form-control" value="<?php echo $inv->id ?>">
                        </div>
                        <div class="form-group">
                            <label style="color: green;">Ubah Metode Pembayaran</label>
                            <select class="form-control" name="ubahmetode">
                                <option value="BCA" <?php if ($inv->pembayaran == "BCA") echo 'selected'; ?>>BCA</option>
                                <option value="BRI" <?php if ($inv->pembayaran == "BRI") echo 'selected'; ?>>BRI</option>
                                <option value="Dana" <?php if ($inv->pembayaran == "Dana") echo 'selected'; ?>>Dana</option>
                                <option value="Mandiri" <?php if ($inv->pembayaran == "Mandiri") echo 'selected'; ?>>Mandiri</option>
                                <option value="GoPay" <?php if ($inv->pembayaran == "GoPay") echo 'selected'; ?>>GoPay</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->