<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">Barang</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('barang/save') ?>" method="post">
                    <div class="mb-3">
                        <label>BARCODE <code>*</code></label>
                        <input class="form-control" name="barkode" type="number" placeholder="BARCODE">
                    </div>
                    <div class="mb-3">
                        <label for="nama">NAMA BARANG <code>*</code></label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="NAMA BARANG" required>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>HARGA BELI <code>*</code></label>
                        <input class="form-control" name="harga_beli" type="text" placeholder="Harga Beli">
                    </div>
                    <div class="mb-3">
                        <label>HARGA JUAL <code>*</code></label>
                        <input class="form-control" name="harga_jual" type="text" placeholder="Harga Jual">
                    </div>
                    <div class="mb-3">
                        <label>KATEGORI <code>*</code></label>
                        <select name="kategori" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?php echo $k['id'] ?>"><?php echo $k['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>SATUAN <code>*</code></label>
                        <select name="satuan" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($satuan as $k): ?>
                                <option value="<?php echo $k['id'] ?>"><?php echo $k['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>SUPPLIER <code>*</code></label>
                        <select name="supplier" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($supplier as $k): ?>
                                <option value="<?php echo $k['id'] ?>"><?php echo $k['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>STOK <code>*</code></label>
                        <input class="form-control" name="stok" type="text" placeholder="Stok">
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>