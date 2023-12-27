<?= $this->extend('admin/layouts/app'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Table</a></li>
                        <li class="breadcrumb-item active">Rule</li>
                        <li class="breadcrumb-item active"><?= esc($title); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color: #138496;">
                    <h3 class="card-title" style="font-size: medium; color: white;"><strong><?= esc($title); ?></strong></h3>
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
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="rule_code">Kode Rule :</label>
                                            <input type="text" name="rule_code" class="form-control" id="rule_code" value="<?= $rule['rule_code'] ?>" readonly>
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="symptoms_name">kode Gejala :</label>
                                        
                                                <input type="text" name="rule_code" class="form-control" id="rule_code" value="<?= $rule['id_symptoms'] ?>" readonly>
                
                                    </div>

                                    <div class="form-group">
                                        <label for="type_name">kode Penyakit :</label>                                  
                                                <input type="text" name="type_name" class="form-control" id="type_name" value="<?= $rule['id_type'] ?>" readonly>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?= base_url('/admin/table/rule') ?>" class="btn btn-info">Back</a>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection('content'); ?>
