<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $page_title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="<?php echo base_url() ?>assets/images/logo_pajt.ico">
    <link href="<?php echo base_url() ?>assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/chartist/css/chartist.min.css">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/pickadate/themes/default.date.css">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Leaflet Css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

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

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?php echo base_url(''); ?>" class="brand-logo">
                <img class="logo-abbr" src="<?php echo base_url() ?>assets/images/iot.png" alt="">
                <img class="logo-compact" src="<?php echo base_url() ?>assets/images/iot-3.png" alt="">
                <img class="brand-title" src="<?php echo base_url() ?>assets/images/iot-4.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border border-bottom shadow">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <div class="header-info">
                                        <span class="text-black">Selamat Datang, <strong>Rezza Rijki Adiputra</strong></span>
                                        <p class="fs-12 mb-0">Software Developer</p>
                                    </div>
                                    <img src="<?php echo base_url() ?>assets/images/profile/men-user.jpg" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?php echo base_url('login') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu">
                    <li class="mm-active"><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="dashboard" aria-expanded="false">
                            <i class="flaticon-381-television"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="tracking" aria-expanded="false">
                            <i class="flaticon-381-route"></i>
                            <span class="nav-text">Tracking</span>
                        </a>
                    </li>
					<!--**********************************
                    <li><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="user_js_jsp" aria-expanded="false">
                            <i class="flaticon-381-user-9"></i>
                            <span class="nav-text">Data Wilayah/Daerah Pengguna Alat</span>
                        </a>
                    </li>
					***********************************-->
                    <li><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="alat_tracking" aria-expanded="false">
                            <i class="flaticon-381-settings"></i>
                            <span class="nav-text">Data Alat Monitoring/Kontroling</span>
                        </a>
                    </li>
					<!--**********************************
                    <li><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="pengaturan_yurisdiksi" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Pengaturan Pengguna Alat</span>
                        </a>
                    </li>
					
                    <li><a href="javascript:void(0);" class="ai-icon menu" ctrl="main" menu="panggilan_sidang" aria-expanded="false">
                            <i class="flaticon-381-ring"></i>
                            <span class="nav-text">Panggilan Sidang</span>
                        </a>
                    </li>
					***********************************-->
                </ul>

                <div class="copyright">
                    <p><strong>Internet Of Things Webserver</strong> © 2022 All Rights Reserved</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid" id="konten">
                <?php echo $body; ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!-- Modal -->
    <div class="modal fade" id="konten_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="konten_modal_title"></h3>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="konten_modal_body"> {isi_modal}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url() ?>assets/vendor/global/global.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/deznav-init.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Chart piety plugin files -->
    <!-- <script src="<?php echo base_url() ?>assets/vendor/peity/jquery.peity.min.js"></script> -->
    <!-- Apex Chart -->
    <!-- <script src="<?php echo base_url() ?>assets/vendor/apexchart/apexchart.js"></script> -->
    <!-- Dashboard 1 -->
    <!-- <script src="<?php echo base_url() ?>assets/js/dashboard/dashboard-1.js"></script> -->
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="<?php echo base_url() ?>assets/vendor/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="<?php echo base_url() ?>assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.time.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/pickadate/picker.date.js"></script>
    <!-- Pickdate -->
    <script src="<?php echo base_url() ?>assets/js/plugins-init/pickadate-init.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script>
        $("body").on("click", ".menu", function() {
            var menu = $(this).attr('menu');
            var ctrl = $(this).attr('ctrl');
            var title = $(this).text();
            open_menu(ctrl, menu, title);
        });

        $("li").click((e) => {
            $('.mm-active').removeClass('mm-active');
            $(e.currentTarget).addClass("mm-active");
        });

        function open_menu(ctrl, menu, title) {
            $("#konten").html($("#preloader").html());
            $.ajax({
                url: "<?php echo base_url(); ?>" + ctrl + "/" + menu,
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(html) {
                    if (html.status !== true) {
                        alert("Ada Kesalahan... !!!");
                        $("#konten").html(html);
                        skip();
                    } else {
                        document.title = title;
                        $("#konten").fadeOut(300);
                        $("#konten").html(html.konten);
                        $("#konten").fadeIn(300);
                    }
                },
                error: function(request, status, error) {
                    // alert(request.responseText);
                    $("#konten").fadeOut(300);
                    $("#konten").html(request.responseText);
                    $("#konten").fadeIn(300);
                }
            });
        }

        function open_ajax(param) {
            if (param.jenis == 'konten') {
                $("#konten").html($("#preloader").html());
            }
            if (param.jenis == 'modal') {
                $('.modal').modal('hide');
                $('#konten_modal').modal('show');
                $("#konten_modal_title").html(param.title);
                $('#konten_modal_body').html($("#preloader").html());
            }
            $.ajax({
                url: param.url,
                type: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                data: param.form_data,
                dataType: 'json',
                success: function(respone) {
                    if (respone.status !== true) {
                        alert("Ada Kesalahan... !!!");
                        $("#konten").html(html);
                        skip();
                    } else {
                        if (param.jenis == 'konten') {

                            $("#konten").fadeOut(300);
                            $("#konten").html(respone.konten);
                            $("#konten").fadeIn(300);
                        } else if (param.jenis == 'modal') {

                            $("#konten_modal_body").fadeOut(300);
                            $("#konten_modal_body").html(respone.konten);
                            $("#konten_modal_body").fadeIn(300);
                        }
                    }
                },
                error: function(request, status, error) {
                    // alert(request.responseText);
                    $("#konten").fadeOut(300);
                    $("#konten").html(request.responseText);
                    $("#konten").fadeIn(300);
                }
            });
        }
    </script>
</body>

</html>