<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="fas fa-user-edit" href="<?php echo base_url('edit_profile/kurir') ?>"></a>
                                </li>
                            </ul>

                            <div class="topbar-divider d-none d-sm-block">
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if ($this->session->userdata('username')) { ?>
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