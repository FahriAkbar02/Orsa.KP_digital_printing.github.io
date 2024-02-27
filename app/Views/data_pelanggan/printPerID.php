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
                <div class="text-right mb-2">
                    <p>Tanggal: <?= isset($order['created_at']) ? date('d-m-Y', strtotime($order['created_at'])) : 'N/A' ?></p>
                </div>
                <div class="mb-3">
                    <h5>Detail Pelanggan :</h5>
                    <br>
                    <h7>ID Pelanggan : <?= $order['id_pelanggan'] ?? 'N/A' ?></h7>
                    <br>
                    <h7>Nama pelanggan : <?= $order['nama_pelanggan'] ?? 'N/A' ?></h7>
                    <br>
                    <h7>No.Telepon / WA : <?= $order['no_tlpn'] ?? 'N/A' ?></h7>
                </div>
                <div class="mb-3">
                    <h5>Detail Transaksi :</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table " border="2" style="text-align: center;">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>Item</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $order['item_name'] ?? 'N/A' ?></td>
                                        <td><?= $order['size'] ?? 'N/A' ?></td>
                                        <td><?= $order['quantity'] ?? '0' ?></td>
                                        <td>Rp. <?= isset($order['price']) ? number_format($order['price'], 0, ',', '.') : '0' ?></td>
                                        <!-- Format total harga dengan pemisah ribuan -->
                                        <td>Rp. <?= isset($totalHarga) ? number_format($totalHarga, 0, ',', '.') : '0' ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Harga:</strong></td>
                                        <td>Rp. <?= isset($totalHarga) ? number_format($totalHarga, 0, ',', '.') : '0' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6>Terima kasih telah berbelanja dengan kami!</h6>
                    </div>
                    <div class="card-body  no-print">
                        <button class="btn btn-primary no-print" onclick="window.print()">Cetak Bukti</button>
                        <a class="btn btn-outline-secondary " href="<?= base_url('laporan') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection('page-content'); ?>