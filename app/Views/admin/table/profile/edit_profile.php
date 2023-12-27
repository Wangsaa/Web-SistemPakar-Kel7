<?= $this->extend('admin/layouts/app'); ?>
<?= $this->Section('content'); ?>
<!-- start content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Table</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        <li class="breadcrumb-item active"><?= esc($title); ?></li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="<?= user()->user_image; ?>" class="img-circle elevation-1" style="width: 125px; height: 125px" alt="User Image">                
                </div>

                <h3 class="profile-username text-center"><?= user()->username; ?></h3>

                <p class="text-muted text-center">administasi</p>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?= base_url('/admin/profile/update')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?= csrf_field() ?>  
                <strong><i class="fas fa-book mr-1"></i> Fullname</strong>
                <div class="col-sm-12">
                    <input type="text" name="fullname" id="" value=" <?= user()->fullname; ?>" class="form-control">
                </div>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                <div class="col-sm-12">
                    <label for=""></label>
                    <input type="email" name="email" id="" value="<?= user()->email; ?>" class="form-control" disabled>
                </div>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Phone</strong>
                <div class="col-sm-12">
                    <input type="text" name="telpon" id="" value="<?= user()->telpon; ?>" class="form-control">
                </div>
                
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <div class="col-sm-12">
                    <input type="text" name="alamat" id="" value="<?= user()->alamat; ?>" class="form-control">
                </div>

                <hr>
                 <strong><img src="<?= user()->user_image; ?>" class="img-circle elevation-1 border" 
                 style="width: 25px; height: 25px; margin-right:7px;" alt="User Image">Foto</strong>
                 <div class="col-sm-12">
                    <input type="file" name="foto" id="" value="<?= user()->user_image; ?>" class="form-control">
                </div>
                <hr>                
                
                <div class="card-footer">                                    
                    <a href="<?= base_url(); ?>admin/profile" class="btn btn-secondary">cancel</a>
                    <button type="submit" class="btn btn-primary">save</button>
                 </div>

                 
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- end content -->
<?= $this->endSection('content'); ?>