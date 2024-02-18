<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Pelanggan</h3>
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
            <div class="card-body p-0">
                <form action="<?= site_url('searchName/index'); ?>" method="get">
                    <div class="row mb-3">
                        <!-- Search Field -->
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="search" name="name" id="searchField" class="form-control" placeholder="Search by name" aria-label="Search by name">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
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
                <div class="table-responsive">
                    <table class="table " cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Customers</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Cutomers</th>
                                <th scope="col">Order Cetak</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Ukuran / Size</th>
                                <th scope="col">Banyak</th>
                                <th scope="col">No.Tlpn/WhatsApp</th>
                                <th scope="col" class="no-print">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php if (!empty($posts)) : ?>
                                <?php foreach ($posts  as $customer) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= esc($customer['id_pelanggan']); ?></td>
                                        <td> <?= isset($customer['created_at']) ? date('d-m-Y', strtotime($customer['created_at'])) : 'N/A' ?></td>
                                        <td><?= esc($customer['nama_pelanggan']); ?></td>
                                        <td><?= esc($customer['item_name']); ?></td>
                                        <td><?= esc($customer['jenis_item']); ?></td>
                                        <td><?= esc($customer['size']); ?></td>
                                        <td><?= esc($customer['quantity']); ?></td>
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
            </div>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>
                            <p><a class="btn btn-info" href="<?= base_url('print_all/'); ?>" value="">Buat Ringkasan</i></a></p>
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