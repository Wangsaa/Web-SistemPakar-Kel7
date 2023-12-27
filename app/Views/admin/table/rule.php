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
                        <li class="breadcrumb-item active">Rule</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="card-tools">
                        <a href="<?php echo base_url('/admin/table/add_penyakit') ?>" class="btn btn-success ms-auto me-3 me-lg-4">
                        <i class="bi bi-plus-circle"></i>&nbsp;Rule</a>
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
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Rule</th>
                                            <th>Nama Gejala</th>
                                            <th>Nama Penyakit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($rules as $ru) : ?>
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?= $i++; ?></td>
                                                <td><?= isset($ru->rule_code) ? $ru->rule_code : 'N/A'; ?></td>
                                                <td><?= isset($ru->symptoms_name) ? $ru->symptoms_name : 'N/A'; ?></td>
                                                <td><?= isset($ru->type_name) ? $ru->type_name : 'N/A'; ?></td>
                                                <td> <a href="<?= base_url('/admin/table/rule/' . $ru->id_rule) ?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <a href="<?= base_url('/admin/table/rule/' . $ru->id_rule. '/edit_gejala') ?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                                                    <!-- <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a> -->
                                                    <form action="<?= base_url('/admin/table/rule/' . $ru->id_rule) ?>" method="post" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
<!-- /.content-wrapper -->
<!-- end content -->
<?= $this->endSection('content'); ?>