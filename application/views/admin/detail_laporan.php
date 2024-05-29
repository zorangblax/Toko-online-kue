<div class="container-fluid">
    <h4>Detail pesanan <div class="btn btn-sm btn-success">No.Pesanan: <?php echo $pesanan->id ?> </div>
    </h4>

    <table class="table table-bordered table-hover table-stripped">
        <tr>
            <th>Id Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub total</th>
        </tr>
        <?php
        $total = 0;
        foreach ($detail as $dtl) :
            $subtotal = $dtl->jumlah * $dtl->harga;
            $total += $subtotal ?>

            <tr>
                <td><?php echo $dtl->id_brg ?></td>
                <td><?php echo $dtl->nama_brg ?></td>
                <td><?php echo $dtl->jumlah ?></td>
                <td><?php echo number_format($dtl->harga, 0, ',', '.') ?></td>
                <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right">Grand total</td>
            <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>
    <a href="<?php echo base_url('admin/laporan/index')  ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>