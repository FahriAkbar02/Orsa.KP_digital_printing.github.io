<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
  <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Admin Control</h3>

  <div class="row">
    <div class="col-lg-8">
      <div class="table-responsive"> <!-- Add this wrapper -->
        <table class="table">
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
                  <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info"><i class="fa-solid fa-info"></i></a>
                  <a href="<?= base_url('admin/delete/' . $user->userid) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-solid fa-trash"></i></a>
                  <a href="<?= base_url('admin/edit/' . $user->userid) ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<?= $this->endSection('page-content'); ?>