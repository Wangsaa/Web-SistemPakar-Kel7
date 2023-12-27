<?= $this->extend('layouts/app')?>
<?= $this->section('content') ?>


<section class="banner">
<div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                    <div class="mb-5"></div>
                    
                    
            </div>
            
        </div>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-7">
          <div class="card">
            <div class="card-body">

              <form action="<?= base_url('user/store/') ?>" method="post">
              <div class="row justify-content-center">
              <h1>Melacak Penyakit</h1>
              </div>
                <?= csrf_field() ?>
                <?php
                foreach ($symptoms as $item) {
                ?>
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label"><?= $item['symptoms_name'] ?></label>
                    <div class="col-sm-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="age1" name="symptoms[<?= $item['symptoms_code'] ?>]" value="1">
                        <label class="form-check-label" for="age1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="age2" name="symptoms[<?= $item['symptoms_code'] ?>]" value="0">
                        <label class="form-check-label" for="age2">No</label>
                      </div>
                    </div>
                  </div>
                <?php } ?>
            </div>

            <div class="card-footer text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</section>
      

<?= $this->endSection('content') ?>