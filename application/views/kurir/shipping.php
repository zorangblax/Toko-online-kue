<div class="container-fluid">
    <h4>Pengiriman Produk
    </h4>

    <table class="table table-bordered table-hover table-stripped">
        <tr>
            <th>Nama Pemesan</th>
            <th>Nomor Telepon</th>
            <th>Alamat Pemesanan</th>
            <th>Tanggal Pemesanan</th>
            <th>Aksi</th>
        </tr>
        <?php if (is_array($pesanan) || is_object($pesanan)) : ?> <!-- Ini adalah awal dari struktur kontrol if. Ini memeriksa apakah variabel $invoice merupakan tipe array atau objek.-->
            <?php foreach ($pesanan as $inv) : ?>
                <?php if ($inv->status != 'Terima Pesanan' && $inv->status != 'sampai') : ?>
                    <tr>
                        <td><?php echo $inv->nama ?></td>
                        <td><?php echo $inv->no_telp ?></td>
                        <td><?php echo $inv->alamat ?></td>
                        <td><?php echo $inv->tgl_pesan ?></td>
                        <td>
                            <?php echo anchor('kurir/shipping/detail/' . $inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
                            <?php if ($inv->status == 'Proses') : ?>
                                <?php echo anchor('kurir/shipping/terima_orderan/' . $inv->id, '<div class="btn btn-sm btn-danger">Take Order</div>') ?>
                            <?php elseif ($inv->status == 'dikirim') : ?>
                                <?php echo anchor('kurir/shipping/orderan_sampai/' . $inv->id, '<div class="btn btn-sm btn-info">Sampai</div>') ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        <?php endif ?>
</div>