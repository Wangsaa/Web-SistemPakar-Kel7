<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<?php $item=$profile;?>


<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <?php if (isset($item['0'])) : ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?= $item['0']['user_image'] ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $item['0']['fullname'] ?></h5>
            <p class="text-muted mb-1">User</p>
            <p class="text-muted mb-4"><?= $item['0']['alamat'] ?></p>
            <div class="d-flex justify-content-center mb-2">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $item['0']['fullname'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $item['0']['username'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $item['0']['email'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $item['0']['telpon'] ?></p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $item['0']['alamat'] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <a href="<?= base_url('/user/profile/edit') ?>" class="btn btn-primary">Edit Profile</a>
              </div>
              <a href="<?= base_url('/logout') ?>" class="btn btn-danger">keluar</a>
            </div>
            
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php else : ?>
    <div class="row">
      <div class="col-md-12 text-center">
      <p>Anda belum login, silakan login terlebih dahulu. <br> <a class="btn btn-primary" href="<?= base_url('/login') ?>">Login</a></p>
      </div>
    </div>
                            
  <?php endif; ?>
</section>
<?= $this->endSection('content') ?>