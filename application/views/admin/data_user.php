<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <br>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?php echo base_url('admin/data_user/tambahuser'); ?>" class="btn btn-success">Tambah User ++</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>no_telp</th>
                            <th>Email</th>
                            <th>role</th>
                            <th>edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['nama']; ?></td>
                                <td><?= $user['alamat']; ?></td>
                                <td><?= $user['no_telp']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?php
                                    // Menampilkan deskripsi role sesuai dengan nilai role
                                    switch ($user['role_id']) {
                                        case 1:
                                            echo 'Admin';
                                            break;
                                        case 2:
                                            echo 'User';
                                            break;
                                        case 3:
                                            echo 'Kurir';
                                            break;
                                        default:
                                            echo 'Unknown';
                                            break;
                                    }
                                    ?></td>
                                <td><a href="<?= base_url('admin/data_user/edit_user/' . $user['id']); ?>" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>