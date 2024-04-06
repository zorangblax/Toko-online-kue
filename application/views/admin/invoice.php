<div class="conteiner-fluid">
    <h4>invoice Pemesanan Produk
    </h4>
    <table class="table table-bordered table=hover table-stripped">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pemesanan</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo $inv->id ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <td>
                    <?php echo anchor('admin/invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary"> Detail</div>') ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>