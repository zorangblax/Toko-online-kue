<div class="container-fluid">
    <a id="top"></a>
    <?php echo $this->session->flashdata('pesan'); ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/slider/grandopening.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/slider/kuecoklat.png') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <div class="row text-center mt-3">
        <?php foreach ($barang as $brg) : ?>
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top" style="width: 100%; height: auto;" alt="...">
                <div class="card-body" style="width: 100%;">
                    <h5 class=" card-title"><?php echo $brg->nama_brg ?></h5>

                    <span class="badge badge-info mb-3">Rp.<?php echo number_format($brg->harga, 0, ',', '.') ?></span><br>
                    <?php
                    if ($brg->stok > 0) {
                        echo anchor('dashboard/tambah_ke_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary"> Tambah ke Keranjang </div>');
                    } else {
                        echo '<div class="btn btn-sm btn-danger"> Habis </div>';
                    }
                    ?>
                    <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success"> Detail </div>') ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="text-center mt-3" style="position: fixed; bottom: 20px; right: 20px; z-index: 99;">
        <a href="#top" class="btn btn-primary"><i class="fas fa-arrow-circle-up"></i></a>
    </div>
</div>