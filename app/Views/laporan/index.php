<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h1 class="h3- mb-4 text-gray-800">Data Pelanggan</h1>
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="SOP">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID Customers</th>
                        <th>Tanggal</th>
                        <th>Nama Cutomers</th>
                        <th>Order Cetak</th>
                        <th>Jenis</th>
                        <th>Ukuran / Size</th>
                        <th>Banyak</th>
                        <th>Total Harga</th>
                        <th>No.Tlpn/WhatsApp</th>
                        <th class="no-print">Action</th>

                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($posts)) : ?>
                        <?php foreach ($posts  as $customer) : ?>
                            <tr>
                                <td><?= esc($customer['id_pelanggan']); ?></td>
                                <td> <?= isset($customer['created_at']) ? date('d-m-Y', strtotime($customer['created_at'])) : 'N/A' ?></td>
                                <td><?= esc($customer['nama_pelanggan']); ?></td>
                                <td><?= esc($customer['item_name']); ?></td>
                                <td><?= esc($customer['jenis_item']); ?></td>
                                <td><?= esc($customer['size']); ?></td>
                                <td><?= esc($customer['jumlah']); ?></td>
                                <td>Rp. <?= number_format(esc($customer['total_harga']), 0, ',', '.'); ?></td>
                                <td><?= esc($customer['no_tlpn']); ?></td>
                                <td style="text-align: center;" class="no-print">
                                    <?php if (logged_in() == true) : ?>
                                        <a class="btn btn-danger" href="<?= base_url('hapus/' . $customer['id']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="fas fa-trash"></i></a>
                                    <?php endif; ?>

                                    <?php if (logged_in() == true) : ?>
                                        <a class="btn btn-secondary " href="<?= base_url('printPerID/' . $customer['id']); ?>" onclick="return confirm(' Melakukan Cetak Bukti Transaksi?')"><i class="fa fa-print"></i></a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Tidak ada postingan.</p>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>
                            <p><a class="btn btn-info no-print" href="<?= base_url('print_all/'); ?>" value="">Buat Ringkasan</i></a></p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</div>
<?= $this->endSection('page-content'); ?>