<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <!-- Logo Toko -->
                    <img class="img-responsive" src="<?= base_url() ?>/img/logo/T-Art Papua.png" height="100" style="margin-bottom: 20px;" alt="">
                    <h4>Temmalusa Art Papua</h4>
                    <p>Jl. Sujarwo Condronegoro SH, Manokwari Bar., Kec. Manokwari Barat, Depan Yapis <br>
                        No. Telepon, Email</p>
                </div>

                <!-- Tanggal -->
                <div class="text-right mb-2">
                    <p>Tanggal: <?= isset($order['created_at']) ? date('d-m-Y', strtotime($order['created_at'])) : 'N/A' ?></p>
                </div>

                <div class="mb-3">
                    <h4>Detail Pelanggan</h4>
                    <p>ID Pelanggan : <?= $order['id_pelanggan'] ?? 'N/A' ?></p>
                    <p>Nama Pelanggan : <?= $order['nama_pelanggan'] ?? 'N/A' ?></p>
                    <p>No.Telepon / WA : <?= $order['no_tlpn'] ?? 'N/A' ?></p>
                </div>

                <div class="mb-3">
                    <h4>Detail Transaksi</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead style="text-align: center;">
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
                                        <td><?= $order['item_name'] ?? 'N/A' ?></td>
                                        <td><?= $order['size'] ?? 'N/A' ?></td>
                                        <td><?= $order['quantity'] ?? '0' ?></td>
                                        <td>Rp. <?= $order['price'] ?? '0' ?></td>
                                        <td>Rp. <?= $totalHarga ?? '0' ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Harga:</strong></td>
                                        <td>Rp. <strong><?= $totalHarga ?? '0' ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5>Terima kasih telah berbelanja dengan kami!</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary no-print" onclick="window.print()">Cetak Bukti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- External Scripts -->
    <?= $this->endSection('page-content'); ?>