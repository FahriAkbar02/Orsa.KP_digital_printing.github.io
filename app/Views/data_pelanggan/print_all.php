<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div>
    <div class="container-fluid">
        <div class="container mt-5">
            <h3 class="mb-4">Ringkasan Laporan Cetak</h3>
            <div class="card-body p-0 no-print">
                <form action="<?= site_url('/cari-data'); ?>" method="get">
                    <div class="row mb-3">
                        <!-- Search Field -->
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </button>
                                </div>
                                <input type="search" name="item_name" id="item_name" class="form-control" placeholder="Search by Item Name" aria-label="Search by name">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- Start Date Field -->
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Tanggal Awal</label>
                            <input class="form-control" type="date" name="start_date" id="startDate">
                        </div>
                        <div class="col-md-6">
                            <label for="endDate" class="form-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="end_date" id="endDate">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <button class="btn btn-info no-print"><a type="button" onclick="window.print()">Print <i class="fa-solid fa-print"></i></a></button>
                <a class="btn btn-secondary" type="button" href="<?= base_url('laporan') ?>">Kembali</a>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php foreach ($itemSummary as $itemName => $itemData) : ?>
                            <div class="card-header">
                                <h4><strong><?= htmlspecialchars($itemName); ?></strong></h4>
                            </div>

                            <table class="table " cellspacing="0">
                                <tr>
                                    <th>
                                        <h6><strong>Harga Satuan</strong></h6>
                                    </th>
                                    <th>
                                        <h5><strong>:</strong></h5>
                                    </th>
                                    <th></th>
                                    <th>
                                        <h6>Rp. <?= htmlspecialchars(number_format($itemData['harga_satuan'], 2)); ?></h6>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <h6><strong>Jumlah Total</strong></h6>
                                    </th>
                                    <th>
                                        <h5><strong>:</strong></h5>
                                    </th>
                                    <th></th>
                                    <th>
                                        <h6><?= htmlspecialchars($itemData['jumlah']); ?></h6>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <h6><strong>Harga Total</strong></h6>
                                    </th>
                                    <th>
                                        <h5><strong>:</strong></h5>
                                    </th>
                                    <th></th>
                                    <th>
                                        <h6>Rp. <?= htmlspecialchars(number_format($itemData['harga_total'], 2)); ?></h6>
                                    </th>
                                </tr>
                            </table>

                            <h6>Detail per Tanggal:</h6>
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($itemData['details'] as $date => $detail) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($date); ?></td>
                                            <td><?= htmlspecialchars($detail['jumlah']); ?></td>
                                            <td>Rp. <?= htmlspecialchars(number_format($detail['harga_total'], 2)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="path_to_bootstrap_js"></script>
<?= $this->endSection('page-content'); ?>