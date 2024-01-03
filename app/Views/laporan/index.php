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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Cetak</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>No.Tlpn / WhatsApp</th>
                        <th>Action</th>

                    </tr>
                </thead>
               
                <tbody>
                 <?php $i = 1; ?>
                    <?php if (!empty($posts )) : ?>
                        <?php foreach ($posts  as $customer) : ?>
            <tr>
                <td><?= esc($customer['id_pelanggan']); ?></td>
                <td><?= esc($customer['tanggal']); ?></td>
                <td><?= esc($customer['nama_pelanggan']); ?></td>
                <td><?= esc($customer['jenis_produk']); ?></td>
                <td><?= esc($customer['ukuran']); ?></td>
                <td><?= esc($customer['jumlah']); ?></td>
                <td><?= esc($customer['no_tlpn']); ?></td>
                <td style="text-align: center;">
                <a class="btn btn-danger" 
                href="<?= base_url('hapus/' . $customer['id']); ?>" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="fas fa-trash"></i></a>
                <a class="btn btn-primary " 
                href="<?= base_url('print/' . $customer['id']); ?>" 
                onclick="return confirm(' Melakukan Cetak Bukti Transaksi?')"><i class="fa fa-print"></i></a>
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
                            <a  class="btn btn-info " onclick="window.print()" value="">Cetak Semua</a>
                        </div>
</div>

</div>
<?= $this->endSection('page-content'); ?>
