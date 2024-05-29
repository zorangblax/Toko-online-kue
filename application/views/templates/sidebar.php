<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Toko Online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user"></i>
                    <span>User</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori kue:</h6>
                        <a class="collapse-item" href="<?php echo base_url('edit_profile') ?>">
                            <i class="fas fa-user-edit"></i>
                            <span>Edit User</span></a>
                        <a class="collapse-item" href="<?php echo base_url('edit_profile/change_password') ?>">
                            <i class="fas fa-user-lock"></i>
                            <span>Ganti Password</span></a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('shipping') ?>">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Status pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('dashboard/detail_keranjang') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Keranjang</span></a>
            </li>
            <hr class="sidebar-divider">


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori kue:</h6>
                        <a class="collapse-item" href="<?php echo base_url('home') ?>">
                            <i class="fas fa-angle-right"></i>
                            <span>All</span></a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/Bolu') ?>">
                            <i class="fas fa-angle-right"></i>
                            <span>Bolu</span></a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/cake') ?>">
                            <i class="fas fa-angle-right"></i>
                            <span>Cake</span></a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/idul_fitr') ?>">
                            <i class="fas fa-angle-right"></i>
                            <span>Idul Fitri</span></a>
                        <a class="collapse-item" href="<?php echo base_url('kategori/donat') ?>">
                            <i class="fas fa-angle-right"></i>
                            <span>Donat</span></a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Tables -->



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="<?php echo base_url('dashboard/search') ?>" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form action="<?php echo base_url('dashboard/search') ?>" method="post" class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="navbar">

                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($this->session->userdata('email')) { ?>
                                    <li>
                                        <div>Selamat Datang <?php echo $this->session->userdata('nama'); ?> </div>
                                    </li>
                                    <li class="ml-2">
                                        <?php echo anchor('auth/logout', 'logout') ?>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <?php echo anchor('auth/login', 'login') ?>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </ul>

                </nav>
                <!-- End of Topbar -->