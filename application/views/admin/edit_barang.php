<div class="container-fluid">
    <h3><i class="fas fa-edit">Edt Data Barang</i></h3>

    <?php foreach ($barang as $brg) : ?>
        <form method="post" action="<?php echo base_url('admin/data_barang/update')  ?>">
            <div class="form-group">
                <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="Cake" <?php echo ($brg->kategori == 'Cake') ? 'selected' : ''; ?>>Cake</option>
                    <option value="Bolu" <?php echo ($brg->kategori == 'Bolu') ? 'selected' : ''; ?>>Bolu</option>
                    <option value="Donat" <?php echo ($brg->kategori == 'Donat') ? 'selected' : ''; ?>>Donat</option>
                    <option value="Idul Fitri" <?php echo ($brg->kategori == 'Idul Fitri') ? 'selected' : ''; ?>>Idul Fitri</option>

                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
            </div>

            <button type="submit" class="btn  btn-primary btn-sm"> Simpan</button>
        </form>
    <?php endforeach; ?>
</div>