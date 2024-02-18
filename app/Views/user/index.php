<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
   <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> My Profile</h3>

   <div class="row">
      <div class="col-lg-8">
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
               <div class="col-md-4">
                  <img src="<?= base_url('/uploads/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="<?= user()->username; ?>">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                           <input type="hidden" name="id" value="<?= user()->id; ?>">
                           <h4><?= user()->username; ?></h4>
                        </li>
                        <?php if (user()->fullname) : ?>
                           <li class="list-group-item">
                              <?= user()->fullname; ?>
                           </li>
                        <?php endif; ?>
                        <li class="list-group-item"><?= user()->email; ?></li>
                        <li class="list-group-item">
                           <span class="badge badge-<?= (implode(', ', $roles) == 'admin') ? 'success' : 'warning' ?>"><?= implode(', ', $roles) ?></span>
                        </li>

                     </ul>
                     <a class="dropdown-item" href="<?= base_url('user/edit/' . user()->id) ?>">
                        <i class="fas Example of cog fa-cog  fa-sm fa-fw mr-2 text-gray-400"></i>
                        Edit Profile
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection('page-content'); ?>