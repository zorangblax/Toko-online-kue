<div class="container-fluid">
    <h4>Detail pesanan <div class="btn btn-sm btn-success">No.Pesanan: <?php echo $history->id ?> </div>
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
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal ?>
            <tr>
                <td><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td><?php echo $psn->jumlah ?></td>
                <td><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
                <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right">Grand total</td>
            <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>
    <div>
        <a class="btn btn-sm btn-primary" href="<?php echo base_url('shipping')  ?>">Kembali</a>
    </div>