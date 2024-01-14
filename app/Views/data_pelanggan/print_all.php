<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div>
    <div class="container-fluid">
        <div class="container mt-5">
            <h2 class="mb-4">Ringkasan Laporan Produk</h2>
            <?php foreach ($itemSummary as $item) : ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h4> <strong><?= htmlspecialchars($item['jenis_item']) ?></strong></h4>
                    </div>
                    <div class="card-body">

                        <table>
                            <tr>
                                <th>
                                    <h6><strong>Harga Satuan</strong></h6>
                                </th>
                                <th>
                                    <h5><strong>:</strong></h5>
                                </th>
                                <th></th>
                                <th>
                                    <h6>Rp. <?= htmlspecialchars(number_format($item['harga_satuan'], 2)) ?></>
                                    </h6>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h6><strong>Banyak Jumlah Cetak</strong></h6>
                                </th>
                                <th>
                                    <h5><strong>:</strong></h5>
                                </th>
                                <th></th>
                                <th>
                                    <h6> <?= htmlspecialchars($item['jumlah']) ?></>
                                    </h6>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h6> <strong>Total Harga</strong></h6>
                                </th>
                                <th>
                                    <h5><strong>:</strong></h5>
                                </th>
                                <th></th>
                                <th>
                                    <h6>
                                        Rp. <?= htmlspecialchars(number_format($item['harga_total'], 2)) ?></>
                                    </h6>
                                </th>
                            </tr>
                        </table>

                        <div class="card-body">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($item['details'] as $date => $detail) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($date) ?></td>
                                            <td><?= htmlspecialchars($detail['jumlah']) ?></td>
                                            <td>Rp. <?= htmlspecialchars(number_format($detail['harga_total'], 2)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-info no-print" onclick="window.print()">CETAK
                <i class="fas fa-print"></i></a>
        </div>
    </div>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="path_to_bootstrap_js"></script>
<?= $this->endSection('page-content'); ?>