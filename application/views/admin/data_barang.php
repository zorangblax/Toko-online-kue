<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data barang</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah barang</button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang as $brg) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $brg->nama_brg ?></td>
                                <td><?php echo $brg->keterangan ?></td>
                                <td><?php echo $brg->kategori ?></td>
                                <td><?php echo number_format($brg->harga, 0, ',', '.') ?></td>
                                <td><?php echo $brg->stok ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php echo anchor('admin/data_barang/detail/' . $brg->id_brg, '<button type="button" class="btn btn-success btn-sm" style="margin-right: 5px;"><i class="fas fa-search-plus"></i></button>'); ?>
                                        <?php echo anchor('admin/data_barang/edit/' . $brg->id_brg, '<button type="button" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-edit"></i></button>'); ?>
                                        <?php echo anchor('admin/data_barang/hapus/' . $brg->id_brg, '<button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>'); ?>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/data_barang/tambah_aksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <option value="Bolu">Bolu</option>
                            <option value="Donat">Donat</option>
                            <option value="Cake">Cake</option>
                            <option value="Idul Fitri">Idul Fitri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>