<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Pelanggan</h3>
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="SOP">
        <?php if (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('sukses'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="card-body p-0">
            <form action="<?= site_url('search/'); ?>" method="get">
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
                        <th scope="col">Alamat</th>
                        <th scope="col">No.Tlpn/WhatsApp</th>
                        <th scope="col" class="no-print">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php if (!empty($pelanggan)) : ?>
                        <?php foreach ($pelanggan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($p['id_pelanggan']); ?></td>
                                <td><?= isset($p['created_at']) ? date('d-m-Y', strtotime($p['created_at'])) : 'N/A' ?></td>
                                <td><?= esc($p['nama_pelanggan']); ?></td>
                                <td><?= esc($p['Alamat']); ?></td>
                                <td><?= esc($p['Telepon']); ?></td>
                                <td style="text-align: center;" class="no-print">
                                    <?php if (logged_in('admin') == true) : ?>
                                        <a class="btn btn-danger" href="#" onclick="confirmDelete(<?= $p['id_costomer']; ?>)"><i class="fas fa-trash"></i></a>
                                    <?php endif; ?>
                                    <?php if (logged_in() == true) : ?>
                                        <a class="btn btn-secondary " href="<?= base_url('detailPesanan/' . $p['id_costomer']); ?>" onclick="return confirm(' Melakukan Cetak Bukti Transaksi?')"><i class="fa fa-print"></i></a>
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
    <div class="card-body">
        <p><a class="btn btn-info" href="<?= site_url('pelanggan/tambah') ?>">Tambah Pelanggan</a></p>
        <p><a class="btn btn-gray" href="<?= site_url('pesanan/tambah') ?>">Tambah pesanan</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Apa kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan jika dikonfirmasi
                window.location.href = "<?= base_url('delete/'); ?>" + id;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Tidak melakukan apa pun jika dibatalkan
            }
        });
    }
</script>

<?= $this->endSection('page-content'); ?>