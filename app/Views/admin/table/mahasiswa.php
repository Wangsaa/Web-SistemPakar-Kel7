<?= $this->extend('admin/layouts/app'); ?>
<?= $this->section('content'); ?>

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
                        <li class="breadcrumb-item active">Mahasiwa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


<section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        <a href="<?php base_url('mahasiswa/create') ?>" class="btn btn-success ms-auto me-3 me-lg-4">
                        <i class="bi bi-plus-circle"></i>&nbsp;mahasiswa</a>
                    </div>
                </div>

<!-- <a href="<?= base_url('mahasiswa/create') ?>">Tambah Mahasiswa</a> -->

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
                                            <th>NPM</th>
                                            <th>Nama</th>
                                            <th>Semester</th>
                                            <th>IPK</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php if (isset($mahasiswa)) : ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $mhs['NPM'] ?></td>
                    <td><?= $mhs['Nama'] ?></td>
                    <td><?= $mhs['Semester'] ?></td>
                    <td><?= $mhs['IPK'] ?></td>
                    <td><?= $mhs['Alamat'] ?></td>
                    <td>
                        <a href="<?= base_url('mahasiswa/edit/' . $mhs['NPM']) ?>">Edit</a>
                        <a href="<?= base_url('mahasiswa/delete/' . $mhs['NPM']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection('content'); ?>
