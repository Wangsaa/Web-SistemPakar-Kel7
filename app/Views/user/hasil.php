<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<section class="banner">
<!-- <img src="<?=base_url('assets/images/bg/bg-4.jpg')?>" alt="hehe"> -->
<div class="hasil">
    <div class="card mx-auto p-1" style="width: 18rem;">
  <div class="card-body">
    <div class="hasil-text">
    <h5 class="card-title">Penyakit yang anda alami adalah</h5>
    <p class="card-text"><?= $detected_disease ?></p>
    
    <a href="<?=base_url('user/detect')?>" class="btn btn-primary">Kembali</a>
    </div>
  </div>
  </div>
  </div>
  </section>
<?= $this->endSection('content') ?>
