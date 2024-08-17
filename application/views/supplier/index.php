<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('supplier') ?>">Supplier</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <a href="<?php echo site_url('supplier/add')?>"><i class="fas fa-plus"></i> Add New</a>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelkelas" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Perusahaan</th>
                                <th>Nama Bank</th>
                                <th>Nama Akun Bank</th>
                                <th>No Akun Bank</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1; 
                                foreach ($supplier as $user) {
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$user->nik</td>
                                            <td>$user->nama</td>
                                            <td>$user->telp</td>
                                            <td>$user->email</td>
                                            <td>$user->alamat</td>
                                            <td>$user->perusahaan</td>
                                            <td>$user->nama_bank</td>
                                            <td>$user->nama_akun_bank</td>
                                            <td>$user->no_akun_bank</td>
                                            <td>
                                            <div>
                                            <a href=".base_url('supplier/getedit/' . $user->id). " class='btn btn-sm btn-info'><i class='fas fa-edit'></i> Edit</a>
                                            <a href=".base_url('supplier/delete/' . $user->id). " class='btn btn-sm btn-danger' onclick='return confirm(\"Ingin menghapus data supplier ini?\");'><i class='fas fa-trash'></i> Hapus</a>
                                            </div>
                                            </td>
                                    </tr>";
                                    $no++;
                                }
                                ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>