<div class="container-fluid">
    <h4>Detail pesanan <div class="btn btn-sm btn-success">No.Pesanan: <?php echo $pesanan->id ?> </div>
    </h4>

    <table class="table table-bordered table-hover table-stripped">
        <tr>
            <th>Id Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>

        </tr>
        <?php
        foreach ($dtl_pesanan as $psn) :
        ?>

            <tr>
                <td><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td><?php echo $psn->jumlah ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?php echo base_url('admin/invoice/index')  ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>