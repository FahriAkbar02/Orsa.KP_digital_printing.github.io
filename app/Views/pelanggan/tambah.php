<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <h2>Masukan Data Pelanggan</h2>
                                <div>
                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <form action="<?= site_url('pelanggan/simpan') ?>" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan:</label>
                                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                                    </div>
                                    <div class="form-group">
                                        <label for="Alamat">Alamat :</label>
                                        <textarea class="form-control" id="Alamat" name="Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Telepon">No. Tlpn/WA :</label>
                                        <input type="text" class="form-control" id="Telepon" name="Telepon">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-secondary " href="<?= base_url('pelanggan/'); ?>"> Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>