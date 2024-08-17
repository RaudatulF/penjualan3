<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('satuan') ?>">Satuan</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('satuan/edit') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama">NAMA <code>*</code></label>
                        <input class="form-control" type="hidden" name="id" value="<?= $satuan->id; ?>" required>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" value="<?= $satuan->nama; ?>" type="text" name="nama" placeholder="NAMA" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">DESKRIPSI <code>*</code></label>
                        <input class="form-control" type="text" name="deskripsi" placeholder="DESKRIPSI" value="<?= $satuan->deskripsi; ?>" required>
                    </div>
                    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> UPDATE</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>