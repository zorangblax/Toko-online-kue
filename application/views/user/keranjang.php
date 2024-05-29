<div class="container-fluid">
    <h4>Keranjang Belanja</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-total</th>
            <th>aksi</th>
        </tr>
        <?php
        $no = 1;
        $total = 0; // Variabel untuk menyimpan total harga

        foreach ($keranjang as $item) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $item['nama_barang'] ?></td>
                <td><?php echo $item['qty'] ?></td>
                <td>Rp.<?php echo number_format($item['harga'], 0, ',', '.') ?></td>
                <td>Rp.<?php echo number_format($item['qty'] * $item['harga'], 0, ',', '.') ?></td>
                <td>
                    <!-- Buat link untuk menghapus item dari keranjang -->
                    <a href="<?php echo base_url('dashboard/hapus_item_keranjang/' . $item['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
            $total += $item['qty'] * $item['harga']; // Tambahkan subtotal ke total harga
        endforeach;
        ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Grand Total = Rp.<?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
        <a href="<?php echo base_url('home') ?>" class="btn btn-sm btn-primary">Lanjutkan Belanja</a>
        <?php if (!empty($keranjang)) : ?>
            <a href="<?php echo base_url('dashboard/pembayaran') ?>" class="btn btn-sm btn-success">Pembayaran</a>
        <?php endif; ?>
    </div>
</div>