<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h3 class="fw-bold py-3 mb-4 no-print"><span class="text-muted fw-light"></span> Detail Transaksi</h3>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="table-responsive">
                        <table class=" table">
                            <tr>
                                <th style="padding: 0;padding-top: 10px;">
                                    <img class="img-fluids" src="<?= base_url() ?>/img/logo/T-Art Papua.png" height="100" style="margin-bottom: 20px;,float: left;" alt="">
                                </th>
                                <th style="padding: 0px;padding-top: 10px;padding-left: 10px;">
                                    <h4>Temmalusa Art Papua</h4>
                                    <P>Jl. Sujarwo Condronegoro SH,<br>
                                        Kec. Manokwari Barat, Depan Yapis.
                                        <br> <i class="fas fa-phone"></i> <strong>085255524783</strong>
                                    </P>
                                </th>
                                <th style="padding: 0px;padding-top: 10px;padding-right: 200px;"></th>
                                <th style="padding: 0px;padding-top: 10px;padding-right: 0px;">ID Pelanggan
                                    <br>Nama pelanggan
                                    <br>No.Tlpn / WA
                                    <br>Alamat
                                </th>
                                <th style="padding: 0px;padding-top: 10px;padding-right: 10px;">:<br>:<br>: <br>:</th>
                                <th style="padding: 0px;padding-top: 10px;">
                                    <strong> <?= $pelanggan->id_pelanggan ?? 'N/A' ?></strong>
                                    <br><strong><?= $pelanggan->nama_pelanggan ?? 'N/A' ?></strong>
                                    <br><strong><?= $pelanggan->Telepon ?? 'N/A' ?></strong>
                                    <br><strong> <?= $pelanggan->Alamat ?? 'N/A' ?></strong>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="text-right mb-2">
                            <P>TANGGAL : <strong> <?= isset($pelanggan->created_at) ? date('d-m-Y', strtotime($pelanggan->created_at)) : 'N/A' ?></strong></P>
                        </div>
                        <div class="table-responsive">
                            <?php if (!empty($pesanan)) : ?>
                                <table class="table table-bordered" border="2">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>Nama Barang Cetak</th>
                                            <th>Banyak</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $grandTotal = 0; // Inisialisasi total harga keseluruhan 
                                        ?>
                                        <?php foreach ($pesanan as $p) : ?>
                                            <tr>
                                                <td><?= $p['item_name'] ?></td>
                                                <td><?= $p['quantity'] ?? '0' ?></td>
                                                <td>Rp. <?= isset($p['price']) ? number_format($p['price'], 0, ',', '.') : '0' ?></td>
                                                <!-- Menghitung total harga dari masing-masing pesanan -->
                                                <?php $totalHarga = $p['quantity'] * $p['price']; ?>
                                                <td>Rp. <?= isset($totalHarga) ?  number_format($totalHarga, 0, ',', '.') : '0' ?></td>
                                            </tr>
                                            <?php $grandTotal += $totalHarga; // Menambahkan total harga dari masing-masing pesanan ke total harga keseluruhan 
                                            ?>
                                        <?php endforeach; ?>
                                        <!-- Menampilkan total harga keseluruhan -->
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Harga:</strong></td>
                                            <td>Rp. <?= isset($grandTotal) ? number_format($grandTotal, 0, ',', '.') : '0' ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p><?= $pesan ?? 'Belum ada data pesanan untuk pelanggan ini.' ?></p>
                            <?php endif; ?>
                        </div>
                        <h6>Terima kasih telah Menggunakan Jasa Kami!</h6>
                    </div>
                    <div class="card-body  no-print">
                        <button class="btn btn-primary no-print" onclick="window.print()">Cetak Bukti</button>
                        <a class="btn btn-outline-secondary " href="<?= base_url('pelanggan') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>