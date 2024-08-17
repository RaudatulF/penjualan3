<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">Barang</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('barang/edit') ?>" method="post">
                    <div class="mb-3">
                        <label>BARCODE <code>*</code></label>
                        <input class="form-control" type="hidden" name="id" value="<?= $barang->id; ?>" required />
                        <input class="form-control" name="barcode" value="<?= $barang->barcode; ?>" type="text" placeholder="BARCODE" disabled>
                    </div>
                    <div class="mb-3">
                        <label>NAMA BARANG <code>*</code></label>
                        <input class="form-control" name="nama" value="<?= $barang->nama; ?>" type="text" placeholder="NAMA BARANG">
                    </div>
                    <div class="mb-3">
                        <label>HARGA BELI <code>*</code></label>
                        <input class="form-control" name="harga_beli" value="<?= $barang->harga_beli; ?>" type="text" placeholder="HARGA BELI">
                    </div>
                    <div class="mb-3">
                        <label>HARGA JUAL <code>*</code></label>
                        <input class="form-control" name="harga_jual" value="<?= $barang->harga_jual; ?>" type="text" placeholder="HARGA JUAL">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori_id" id="kategori_id">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kategori as $kategori) : ?>
                                <option value="<?= $kategori->id ?>" <?= $barang->kategori_id == $kategori->id
                                                                            ? 'selected' : '' ?>><?= $kategori->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Satuan" class="form-label">Satuan</label>
                        <select class="form-select" name="satuan_id" id="satuan_id">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($satuan as $satuan) : ?>
                                <option value="<?= $satuan->id ?>" <?= $barang->satuan_id == $satuan->id
                                                                        ? 'selected' : '' ?>><?= $satuan->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <select class="form-select" name="supplier_id" id="supplier_id">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($supplier as $supplier) : ?>
                                <option value="<?= $supplier->id ?>" <?= $barang->supplier_id == $supplier->id
                                                                        ? 'selected' : '' ?>><?= $supplier->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>STOK <code>*</code></label>
                        <input class="form-control" name="stok" value="<?= $barang->stok; ?>" type="text" placeholder="STOK">
                    </div>
                    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> Update</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>