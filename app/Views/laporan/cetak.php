<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid" onload="window.print();">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" style="text-align: center;">Bukti Transaksi</h4>
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
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Cetak</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>
                            <th>No.Tlpn / WhatsApp</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($post1)) : ?>
                            <?php foreach ($post1 as $post) : ?>
                                <tr>
                                    <td><?php echo $post['id_pelanggan']; ?></td>
                                    <td><?php echo $post['tanggal']; ?></td>
                                    <td><?php echo $post['nama_pelanggan']; ?></td>
                                    <td><?php echo $post['jenis_produk']; ?></td>
                                    <td><?php echo $post['ukuran']; ?></td>
                                    <td><?php echo $post['jumlah']; ?></td>
                                    <td><?php echo $post['no_tlpn']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Tidak ada postingan.</p>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="card-body">
                    <a class="btn btn-info" onclick="window.print()">Cetak Bukti</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection('page-content'); ?>