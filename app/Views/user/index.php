<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
   <h3 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> My Profile</h3>

   <div class="row">
      <div class="container mt-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-7">
               <div class="card p-3 py-4">
                  <div class="text-center">
                     <img src="<?= base_url('/uploads/' . user()->user_image); ?>" class=" rounded-circle" width="200" alt="<?= user()->user_image; ?>">
                  </div>

                  <div class="text-center mt-3">
                     <span class="bg bg-<?= (implode($roles) == 'admin') ? 'success' : 'warning' ?> p-1 px-4 rounded text-white"><?= implode($roles) ?></span>
                     <h5 class="mt-2 mb-0"> <?= user()->username; ?></h5>
                     <?php if (user()->fullname) : ?>
                        <span> <?= user()->fullname; ?></span>
                     <?php endif; ?>
                     <p class="fonts"><?= user()->email; ?></p>
                     <div class="buttons">
                        <a class="btn btn-outline-primary px-4 ms-3" href="<?= base_url('user/edit/' . user()->id) ?>">
                           <i class="fa fa-cog  text-gray-400"></i>
                           Edit Profile
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection('page-content'); ?>