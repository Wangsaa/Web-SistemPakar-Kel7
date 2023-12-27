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
                <img src="<?= $user->user_image; ?>" class="img-circle elevation-1" style="width: 125px; height: 125px" alt="User Image">                
                </div>

                <h3 class="profile-username text-center"><?= $user->username; ?></h3>

                <p class="text-muted text-center">administasi</p>
                <a href="<?= base_url(); ?>/admin/table/users" class="btn btn-primary btn-block"><b>Back</b></a>
                <a href="<?= base_url('/admin/table/users/edit/'. $user->id); ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
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
                <h3 class="card-title">User Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Fullname</strong>

                <p class="text-muted">
                <?= $user->fullname; ?>
                </p>
                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                <p class="text-muted"><?= $user->email; ?></p>
                <hr>


                <strong><i class="far fa-file-alt mr-1"></i> Phone</strong>
                <p class="text-muted"><?= $user->telpon; ?></p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted"><?= $user->alamat; ?></p>
                <hr>
            
              
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