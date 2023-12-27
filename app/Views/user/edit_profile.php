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
          <form action="<?= base_url('/user/profile/update')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
          <?= csrf_field() ?>  
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="fullname" id="" value="<?= $item['0']['fullname'] ?>" class="form-control">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <label for=""></label>
                <input type="username" name="username" id="" value="<?= $item['0']['username'] ?>" class="form-control" disabled>
              </div>
            </div>
            <hr>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <label for=""></label>
                <input type="email" name="email" id="" value="<?= $item['0']['email'] ?>" class="form-control" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="telpon" id="" value="<?= $item['0']['telpon'] ?>" class="form-control">
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="alamat" id="" value="<?= $item['0']['alamat'] ?>" class="form-control">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Foto</p>
              </div>
              <div class="col-sm-9">
                <input type="file" name="foto" id="" value="<?= $item['0']['user_image'] ?>" class="form-control">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <input type="submit" class="btn btn-primary">
              </div>
              <a href="<?= base_url('/user/profile') ?>" class="btn btn-danger">Cancel</a>
            </div>
          </form></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection('content') ?>