<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Google Font: Source Sans Pro -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- jam javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <div class="user-panel mt-0 pb-2 mb-3 d-flex">
                        <div class="image">
                        <img src="<?= user()->user_image; ?>" class="img-circle elevation-1" style="width: 35px; height: 35px" alt="User Image">                
                    </div>
                            </div>
                </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><center><?= user()->username; ?></center></span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>admin/profile" class="dropdown-item">
          <i class="bi bi-person-lines-fill"></i> profile
            <!-- <span class="float-right text-muted text-sm"></span> -->
          </a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('logout') ?>"> <i class="fas fa-sign-out-alt"></i> logout</a>
        </div>
      </li>
            </ul>
        </nav>
        <!-- /.navbar -->

         

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>admin/dashboard" class="brand-link">
                <img src="https://w7.pngwing.com/pngs/175/87/png-transparent-computer-icons-expert-intelligent-systems-angle-text-symmetry-thumbnail.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Sistem Pakar</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-header" style="font-size: small;">OPTIONS</li>

                            <li class="nav-item">
                                <a href="<?= base_url(); ?>admin/table/users" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                <p>Akun Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                                    <a href="<?= base_url(); ?>admin/table/penyakit" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Penyakit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>admin/table/gejala" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Gejala</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>admin/table/rule" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Rule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>admin/table/mahasiswa" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Mahasiswa</p>
                                    </a>
                                </li>
                                <li class="nav-header" style="font-size: small;">ACTION</li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>

                        <!-- jam-->
                        <li class="nav-item">
                            <div class="card text-white text-center bg-dark">
                                <p class="card-title mt-2">
                                    <a><span class="badge hours"></span></a> :
                                    <a><span class="badge min"></span></a> :
                                    <a><span class="badge sec"></span></a>
                                </p>
                            </div>
                        </li>
                        <!-- jam -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- start isi content -->
        <?= $this->renderSection('content'); ?>
        <!-- end isi content -->

        <!-- jam javascript -->

        <!-- jam javascript -->

        <!-- php timezone format -->
        <?php
        date_default_timezone_set("Asia/Jakarta");
        echo date_default_timezone_get();
        ?>
        <!-- php timezone format -->

        <footer class="main-footer">
            <div class="text-center">
                <strong>Copyright &copy; <?= date("d-m-Y"); ?></strong> All rights reserved.
            </div>
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>
    <!-- jam -->
    <script>
        new DataTable('#example');

        $(document).ready(function() {
            setInterval(function() {
                var hours = new Date().getHours();
                $(".hours").html((hours < 10 ? "0" : "") + hours);
            }, 1000);
            setInterval(function() {
                var minutes = new Date().getMinutes();
                $(".min").html((minutes < 10 ? "0" : "") + minutes);
            }, 1000);
            setInterval(function() {
                var seconds = new Date().getSeconds();
                $(".sec").html((seconds < 10 ? "0" : "") + seconds);
            }, 1000);
        });
    </script>
</body>

</html>