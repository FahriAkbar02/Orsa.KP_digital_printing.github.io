<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
           
<div class="container-fluid">

<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary" style="text-align: center;">Data Tables Pesanan Pelanggan</h4>
    </div>
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
                <thead>
                    <tr>
                        <th scope="col">#</th>
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
                <th scope="row"><?= $i++; ?></th>
                <td><?= esc($customer['id_pelanggan']); ?></td>
                <td><?= esc($customer['tanggal']); ?></td>
                <td><?= esc($customer['nama_pelanggan']); ?></td>
                <td><?= esc($customer['jenis_produk']); ?></td>
                <td><?= esc($customer['ukuran']); ?></td>
                <td><?= esc($customer['jumlah']); ?></td>
                <td><?= esc($customer['no_tlpn']); ?></td>
                <td style="text-align: center;"><a class="btn btn-danger" 
                href="<?= base_url('laporan/hapus/' . $customer['id']); ?>" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
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
                            <a  class="btn btn-info " onclick="window.print()" value="">Cetak Bukti</a>
                        </div>
    </div>
</div>

</div>
<?= $this->endSection('page-content'); ?>
