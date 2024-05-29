<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LAPORAN</h1>
    <p class="mb-4">
        Tabel Laporan
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Total Penghasilan : Rp.<?php echo number_format($total_harga, 0, ',', '.')  ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Invoice</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Metode Pemesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($laporan) || is_object($laporan)) : ?>
                            <?php foreach ($laporan as $lpr) : ?>
                                <tr>
                                    <td><?= $lpr->id ?></td>
                                    <td><?= $lpr->nama ?></td>
                                    <td><?= $lpr->alamat ?></td>
                                    <td><?= $lpr->tgl_pesan ?></td>
                                    <td><?= $lpr->pembayaran ?></td>
                                    <td>
                                        <?= anchor('admin/laporan/detail/' . $lpr->id, '<div class="btn btn-sm btn-primary"> Detail</div>') ?>
                                        <?php if ($lpr->status == 'BelumBayar') : ?>
                                            <?php echo anchor('admin/laporan/update_status/' . $lpr->id, '<div class="btn btn-sm btn-danger">Konfirmasi Pembayaran</div>') ?>
                                        <?php elseif ($lpr->status == 'Proses') : ?>
                                            <button type="button" class="btn btn-sm btn-danger">Proses</button>
                                        <?php elseif ($lpr->status == 'dikirim') : ?>
                                            <button type="button" class="btn btn-sm btn-danger">Dalam Perjalanan</button>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-sm btn-success">Sudah di Antar</button>
                                            <?php echo anchor('admin/laporan/hapus/' . $lpr->id, '<div class="btn btn-sm btn-danger">Hapus</div>') ?>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <!-- Tampilkan pesan jika tidak ada data invoice -->
                            <tr>
                                <td colspan="5" align="center">
                                    Tidak ada invoice
                                </td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>