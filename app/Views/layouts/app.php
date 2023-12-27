<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Menghadeh Care</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/icofont/icofont.min.css')?>">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/slick-carousel/slick/slick.css')?>">
    <link rel="stylesheet" href=" <?= base_url('assets/plugins/slick-carousel/slick/slick-theme.css')?>">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">

</head>

<body id="top">

    <header>
                    <div class="col-lg-6">
                        <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                            <a href="tel:+23-345-67890">
                                <span>Call Now : </span>
                                <span class="h4">911</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <h1>Menghadeh Care</h1>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                    aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icofont-navigation-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/detect') ?>">Melacak</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/profile') ?>">Profile</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>
    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.js')?>"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/popper.js')?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/plugins/counterup/jquery.easing.js')?>"></script>
    <!-- Slick Slider -->
    <script src="<?= base_url('assets/plugins/slick-carousel/slick/slick.min.js')?>">
    </script>
    <!-- Counterup -->
    <script src="<?= base_url('assets/plugins/counterup/jquery.waypoints.min.js')?>">
    </script>

    <script src="<?= base_url('assets/plugins/shuffle/shuffle.min.js')?>"></script>
    <script src="<?= base_url('assets/plugins/counterup/jquery.counterup.min.js')?>">
    </script>
    <!-- Google Map -->
    <script src="<?= base_url('assets/plugins/google-map/map.js')?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

    <script src="<?= base_url('assets/js/script.js')?>"></script>
    <script src="<?= base_url('assets/js/contact.js')?>"></script>

</body>

</html>