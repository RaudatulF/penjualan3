<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('kostumer') ?>">Kostumer</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('kostumer/edit') ?>" method="post">
                    <div class="mb-3">
                        <label for="nik">NIK <code>*</code></label>
                        <input class="form-control" type="text" name="nik" placeholder="NIK" value="<?= $user->nik; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama">NAMA <code>*</code></label>
                        <input class="form-control" type="hidden" name="id" value="<?= $user->id; ?>" required>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="NAMA" value="<?= $user->nama; ?>" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telp">TELEPHONE <code>*</code></label>
                        <input class="form-control" type="number" name="telp" placeholder="TELEPHONE" value="<?= $user->telp; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">EMAIL <code>*</code></label>
                        <input class="form-control" type="text" name="email" placeholder="EMAIL" value="<?= $user->email; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">ALAMAT <code>*</code></label>
                        <input class="form-control" type="text" name="alamat" placeholder="ALAMAT" value="<?= $user->alamat; ?>" required>
                    </div>
                    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> UPDATE</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>