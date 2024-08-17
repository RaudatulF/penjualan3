<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('supplier') ?>">Supplier</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('supplier/save') ?>" method="post">
                    <div class="mb-3">
                        <label for="nik">NIK <code>*</code></label>
                        <input class="form-control" type="text" name="nik" placeholder="NIK" required>
                    </div>
                    <div class="mb-3">
                        <label for="username">NAMA <code>*</code></label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="NAMA" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telp">TELEPHONE <code>*</code></label>
                        <input class="form-control" type="number" name="telp" placeholder="TELEPHONE" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">EMAIL <code>*</code></label>
                        <input class="form-control" type="text" name="email" placeholder="EMAIL" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">ALAMAT <code>*</code></label>
                        <input class="form-control" type="text" name="alamat" placeholder="ALAMAT" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone">PERUSAHAAN <code>*</code></label>
                        <input class="form-control" type="text" name="perusahaan" placeholder="PERUSAHAAN" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">NAMA BANK <code>*</code></label>
                        <input class="form-control" type="text" name="nama_bank" placeholder="NAMA BANK" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">NAMA AKUN BANK <code>*</code></label>
                        <input class="form-control" type="text" name="nama_akun_bank" placeholder="NAMA AKUN BANK" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">NO AKUN BANK <code>*</code></label>
                        <input class="form-control" type="text" name="no_akun_bank" placeholder="NO AKUN BANK" required>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>