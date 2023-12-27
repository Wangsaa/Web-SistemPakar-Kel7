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
                        <li class="breadcrumb-item active">Penyakit</li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #28a745;">
                    <h3 class="card-title" style="font-size: medium; color: white;"><strong><?= $title; ?></strong></h3>
                    <div class="card-tools">
                        <i class="fas fa-times" style="color: white;"></i>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?= base_url('/admin/table/up_penyakit') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="type_code">Kode Penyakit :</label>
                                        <input type="text" name="type_code" class="form-control" id="type_code" placeholder="Enter code">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_name">Nama Penyakit :</label>
                                        <input type="text" name="type_name" class="form-control" id="type_name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_description">Deskripsi Penyakit :</label>
                                        <input type="text" name="type_description" class="form-control" id="type_description" placeholder="Enter description">
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </section>
    <!-- /.content -->
</div>

<?= $this->endSection('content'); ?>
