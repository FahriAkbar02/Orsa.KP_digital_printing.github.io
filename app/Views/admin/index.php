<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
  <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Admin Control</h3>
  <div class="row">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive"> <!-- Add this wrapper -->
            <table class="table" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->name; ?></td>
                    <td>
                      <a href="<?= base_url('admin/' . $user->userid); ?>" type="button" class="btn btn-info">
                        <i class="fas fa-info"></i>
                      </a>
                      <a class="btn btn-danger" href="#" onclick="confirmDelete(<?= $user->userid; ?>)">

                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="<?= base_url('admin/edit/' . $user->userid) ?>" type="button" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
      title: "Apa kamu yakin? ",
      text: "Anda tidak akan dapat mengembalikan ini !",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Ya, hapus!",
      cancelButtonText: "Tidak, batal!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // Lakukan penghapusan jika dikonfirmasi
        window.location.href = "<?= base_url('admin/delete/'); ?>" + id;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        // Tidak melakukan apa pun jika dibatalkan
      }
    });
  }
</script>
<?= $this->endSection('page-content'); ?>