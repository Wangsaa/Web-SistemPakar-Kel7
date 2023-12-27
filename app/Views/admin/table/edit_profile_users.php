<?= $this->extend('admin/layouts/app'); ?>
<?= $this->Section('content'); ?>

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
    <section class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?= $users->user_image ?>" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $users->fullname ?></h5>
                            <p class="text-muted mb-1">User</p>
                            <p class="text-muted mb-4"><?= $users->alamat ?></p>
                            <div class="d-flex justify-content-center mb-2">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">                                
                            <form action="<?= base_url('/admin/table/users/edit/'. $users->id)?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <?= csrf_field() ?>  
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="fullname" id="" value="<?= $users->fullname ?>" class="form-control">
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-9">
                                    <label for=""></label>
                                    <input type="username" name="username" id="" value="<?= $users->username?>" class="form-control" >
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
                                    <input type="email" name="email" id="" value="<?= $users->email?>" class="form-control" >
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="telpon" id="" value="<?= $users->telpon ?>" class="form-control">
                                </div>
                                </div>
                                <hr>
                                
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" id="" value="<?= $users->alamat ?>" class="form-control">
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Foto</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" name="foto" id="" value="<?= $users->user_image ?>" class="form-control">
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="submit" class="btn btn-primary">
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('/admin/table/users/'. $users->id) ?>" class="btn btn-primary btn-block"><b>Back</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- This div was missing in your code -->

<?= $this->endSection('content') ?>
