<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $judul; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="<?php echo base_url() ?>assets/images/iot.ico">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div class="container-fluid">
        <div class="row">
            <div class="card col-lg-6 border shadow" style="height: 100vh;">
                <div class="card-body p-0">
                    <img src="<?php echo base_url() ?>assets/images/watermark.jpg" class="h-100 w-100 card-img" alt="watermark">
                    <div class="card-img-overlay d-flex flex-column justify-content-center h-100 align-items-center">
                        <img src="<?php echo base_url() ?>assets/images/iot.png" height="150" alt="logo_pajt">
                        <h5 class="h2 mt-3">Login Monitoring dan Kontroling IPAL</h5>
                        <div class="input-group search-area d-lg-inline-flex border mt-3" style="width: 350px;">
                            <input type="text" class="form-control wd-lg-100" placeholder="NIP / Username">
                            <div class="input-group-append">
                                <span class="input-group-text"><a class="pl-3"><i class="flaticon-381-user-3"></i></a></span>
                            </div>
                        </div>
                        <div class="input-group search-area d-lg-inline-flex border mt-3" style="width: 350px;">
                            <input type="password" class="form-control wd-lg-100" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text"><a class="pl-3"><i class="flaticon-381-lock-2"></i></a></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="<?php echo base_url('main') ?>" class="btn btn-primary" style="width: 350px;">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-lg-6 d-lg-block d-none bg-primary" style="height: 100vh;">
                <div class="card-body text-white d-flex flex-column justify-content-center h-100 align-items-center">
                    <img src="<?php echo base_url() ?>assets/images/iot.png" height="400" alt="logo_pajt">
                    <small>©️ 2022 Internet of Things. Versi Beta</small>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url() ?>assets/vendor/global/global.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/deznav-init.js"></script>

    <script>

    </script>
</body>

</html>