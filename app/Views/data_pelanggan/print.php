<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
           
<div class="container-fluid">
<div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <!-- Logo Toko -->
                    <img class="img-responsive" src="<?= base_url()?>/img/logo/T-Art Papua.png" height="100" style="margin-bottom: 20px;" alt="">
                    <h4>Temmalusa Art Papua</h2>
                        <p>Jl. Sujarwo Condronegoro SH, Manokwari Bar., Kec. Manokwari Barat, Depan Yapis <br> 
                            No. Telepon, Email</p>
                </div>

                <!-- Tanggal -->
                <div class="text-right mb-2">
                    <p >Tanggal:  <?= $transaction['tanggal'] ?></p>
                </div>

                <div class="mb-3">
                    <h4>Detail Pelanggan</h4>
                    <p>Nama Pelanggan   : <?= $transaction['id_pelanggan'] ?></p>
                     <p>Nama Pelanggan  : <?= $transaction['nama_pelanggan'] ?></p>
                     <p>No.Telepon / WA : <?= $transaction['no_tlpn'] ?></p>
                </div>

                <div class="mb-3">
                    <h4>Detail Transaksi</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Ukuran</th>
                                <th>Quantity</th>
                                <th>Harga Satuan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $transaction['jenis_produk'] ?></td>
                                <td><?= $transaction['ukuran'] ?></td>
                                <td><?= $transaction['jumlah'] ?></td>
                                <td >Rp. <input type="text"  style="border: none;"></td>
                                <td>Rp. <input type="text"  style="border: none;" ></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Harga:</strong></td>
                                <td>Rp. <strong><input type="text" style="border: none;"></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5>Terima kasih telah berbelanja dengan kami!</h5>

            </div>
        </div>
        <button class="btn btn-primary"  onclick="window.print()">Cetak Nota</button>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
<?= $this->endSection('page-content'); ?>
