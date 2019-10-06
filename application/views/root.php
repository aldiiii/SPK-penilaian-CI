<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php if (!empty($title)) echo $title . " - "; ?> Penilaian Kinerja Penutur</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Penilaian Kinerja Penutur">
    <meta name="author" content="Indra Prasetya">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

    <!-- Favicons generated using http://www.favicon-generator.org/ -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon/favicon-16x16.png">

    <link type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/fonts/themify-icons/themify-icons.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">

    <!--[if lt IE 10]>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/media.match.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/placeholder.min.js"></script>
        <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryui-1.10.3.min.js"></script>

    <script language="javascript" src="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.css">

    <?php if ($menu == 'dashboard') { ?>
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/Chart.min.css" rel="stylesheet">
    <?php } ?>

</head>

<body class="animated-content">

    <header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">

        <div class="logo-area">
            <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
                <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                    <span class="icon-bg">
                        <i class="ti ti-menu"></i>
                    </span>
                </a>
            </span>

            <a class="navbar-brand" href="<?php echo site_url(); ?>">Penilaian Kinerja Penutur</a>

        </div><!-- logo-area -->

        <ul class="nav navbar-nav toolbar pull-right">

            <!-- <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
                    <div class="dropdown-menu notifications arrow">
                        <div class="topnav-dropdown-header">
                            <span>Pemberitahuan</span>
                        </div>
                        <div class="scroll-pane">
                            <ul class="media-list scroll-content">
                                <li class="media notification-success">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
                                            <span class="notification-time">8 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-info">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
                                            <span class="notification-time">24 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-teal">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
                                            <span class="notification-time">16 hours ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-indigo">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
                                            <span class="notification-time">2 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-danger">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Initial Release 1.0</h4>
                                            <span class="notification-time">4 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">Lihat semua pemberitahuan</a>
                        </div>
                    </div>
                </li> -->

            <li class="dropdown toolbar-icon-bg">
                <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                    <img class="img-circle" src="<?php echo $user_photo; ?>" alt="<?php echo $user_name; ?>" />
                </a>
                <ul class="dropdown-menu userinfo arrow">
                    <li><a href="<?php echo site_url('user/profile'); ?>"><i class="ti ti-user"></i><span>Profil</span></a></li>
                    <li><a href="<?php echo site_url('user/logout'); ?>"><i class="ti ti-shift-right"></i><span>Keluar</span></a></li>
                </ul>
            </li>

        </ul>

    </header>
    <!-- End header -->

    <!-- Wrapper -->
    <div id="wrapper">
        <div id="layout-static">
            <div class="static-sidebar-wrapper sidebar-default">
                <div class="static-sidebar">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="userinfo">
                                    <div class="avatar">
                                        <img src="<?php echo $user_photo; ?>" class="img-responsive img-circle">
                                    </div>
                                    <div class="info">
                                        <span class="username"><?php echo $user_name; ?></span> <br>
                                        <span class="useremail"><?php echo $user_role; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget stay-on-collapse" id="widget-sidebar">
                            <nav role="navigation" class="widget-body">
                                <ul class="acc-menu">
                                    <li class="nav-separator"><span>Sistem</span></li>
                                    <!-- Menu Dashboard -->
                                    <li <?php if ($menu == 'dashboard') echo "class='active'"; ?>>
                                        <a href="<?php echo site_url('dashboard'); ?>"><i class="ti ti-home"></i><span>Beranda</span></a>
                                    </li>
                                    <!-- Menu System -->
                                    <li <?php if (in_array($menu, array('level', 'user', 'module', 'task', 'role'))) echo "class='open active hasChild'"; ?>>
                                        <a href="javascript:;"><i class="ti ti-settings"></i><span>Sistem</span></a>
                                        <ul class="acc-menu" <?php if (in_array($menu, array('level', 'user', 'module', 'task', 'role'))) echo "style='display:block'"; ?>>
                                            <li <?php if ($menu == 'level') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('syslevel'); ?>"><i class="fa fa-angle-right"></i> User Level</a>
                                            </li>
                                            <li <?php if ($menu == 'user') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('sysuser'); ?>"><i class="fa fa-angle-right"></i> User</a>
                                            </li>
                                            <li <?php if ($menu == 'module') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('sysmodule'); ?>"><i class="fa fa-angle-right"></i> Module</a>
                                            </li>
                                            <li <?php if ($menu == 'task') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('systask'); ?>"><i class="fa fa-angle-right"></i> Task</a>
                                            </li>
                                            <li <?php if ($menu == 'role') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('sysrole'); ?>"><i class="fa fa-angle-right"></i> Role</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Kriteria -->
                                    <li <?php if (in_array($menu, array('kriteria'))) echo "class='open active hasChild'"; ?>>
                                        <a href="javascript:;"><i class="ti ti-file"></i><span>Kriteria</span></a>
                                        <ul class="acc-menu" <?php if (in_array($menu, array('kriteria'))) echo "style='display:block'"; ?>>
                                            <li <?php if ($menu == 'kriteria') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('kriteria'); ?>"><i class="fa fa-angle-right"></i> Data Kriteria</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Periode Penilaian -->
                                    <li <?php if (in_array($menu, array('periodepenilaian'))) echo "class='open active hasChild'"; ?>>
                                        <a href="javascript:;"><i class="ti ti-file"></i><span>Periode Penilaian</span></a>
                                        <ul class="acc-menu" <?php if (in_array($menu, array('periodepenilaian'))) echo "style='display:block'"; ?>>
                                            <li <?php if ($menu == 'periodepenilaian') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('periodepenilaian'); ?>"><i class="fa fa-angle-right"></i> Data Periode Penilaian</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Penilaian -->
                                    <li <?php if (in_array($menu, array('penilaian','add_penilaian'))) echo "class='open active hasChild'"; ?>>
                                        <a href="javascript:;"><i class="ti ti-file"></i><span>Penilaian</span></a>
                                        <ul class="acc-menu" <?php if (in_array($menu, array('penilaian','add_penilaian'))) echo "style='display:block'"; ?>>
                                            <li <?php if ($menu == 'penilaian') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('penilaian'); ?>"><i class="fa fa-angle-right"></i> Data Penilaian</a>
                                            </li>
                                            <li <?php if ($menu == 'add_penilaian') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('penilaian/add'); ?>"><i class="fa fa-angle-right"></i> Tambah Penilaian</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!-- Laporan -->
                                    <li <?php if (in_array($menu, array('laporan'))) echo "class='open active hasChild'"; ?>>
                                        <a href="javascript:;"><i class="ti ti-file"></i><span>Laporan</span></a>
                                        <ul class="acc-menu" <?php if (in_array($menu, array('laporan'))) echo "style='display:block'"; ?>>
                                            <li <?php if ($menu == 'laporan') echo "class='active'"; ?>>
                                                <a href="<?php echo site_url('laporan'); ?>"><i class="fa fa-angle-right"></i> Hasil Penilaian</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="static-content-wrapper">
                <div class="static-content">
                    <div class="page-content">
                        <?php echo $content; ?>
                    </div> <!-- #page-content -->
                </div>
                <footer role="contentinfo">
                    <div class="clearfix">
                        <ul class="list-unstyled list-inline pull-left">
                            <li>
                                <h6 style="margin: 0;">&copy; 2019. Penilaian Kinerja Penutur</h6>
                            </li>
                        </ul>
                        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                    </div>
                </footer>

            </div>
        </div>
    </div>

    <!-- Load site level scripts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/enquire.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/velocityjs/velocity.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/velocityjs/velocity.ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/wijets/wijets.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/application.js"></script>
    <!-- End loading site level scripts -->

    <!-- Load page level scripts-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/sparklines/jquery.sparklines.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/fullcalendar/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- End loading page level scripts-->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-validation2/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-validation2/additional-methods.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.css">

    <script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.stack.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.orderBars.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.resize.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-mask/jquery.mask.js"></script>

    <?php if ($menu == 'dashboard') { ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Chart.min.js"></script>
    <?php } ?>


    <script type="text/javascript">
        var site = '<?php echo base_url() ?>';

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('.btn-cancel').click(function() {
            window.history.back();
        });

        $('.btn-delete').click(function() {

            var form = $(this).parent('form');

            swal({
                title: 'Anda yakin akan menghapusnya?',
                text: "Anda tidak bisa mengembalikannya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0AF',
                cancelButtonColor: '#d9534f',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then(function() {
                form.submit();
            });

            return false;
        });

        $('.btn-change-status').click(function() {

            var form = $(this).parent('form');

            swal({
                title: 'Anda yakin akan mengubahnya?',
                text: "Anda dapat merubah status!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0AF',
                cancelButtonColor: '#d9534f',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, ubah!'
            }).then(function() {
                form.submit();
            });

            return false;
        });

        $('.btn-change').click(function() {

            var url = $(this).attr('location');

            swal({
                title: 'Anda yakin akan mengubahnya?',
                text: "Anda dapat merubah status!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0AF',
                cancelButtonColor: '#d9534f',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, ubah!'
            }).then(function() {
                document.location = url;
            });

            return false;
        });

        $(document).ready(function() {
            //Summernote
            $('#summernote').summernote({
                height: 250,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                airPopover: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']]
                ],
            });
            //Assign Summernote to textarea
            $('.note-editable').on("blur", function() {
                $('textarea[name="info"]').html($('#summernote').summernote("code"));
            });

            $('form').each(function() {
                if ($(this).data('validator'))
                    $(this).data('validator').settings.ignore = ".note-editor *";
            });

            $("#searchForm").validate({
                rules: {
                    key: "required",
                    param: "required"
                },
                messages: {
                    key: "Kata kunci tidak boleh kosong",
                    param: "Filter harus dipilih"
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Add the `help-block` class to the error element
                    // error.addClass( "help-block" );

                    // if ( element.prop( "type" ) === "checkbox" ) {
                    //     error.insertAfter( element.parent( "label" ) );
                    // } else {
                    //     error.insertAfter( element );
                    // }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
                }
            });
        });
    </script>
</body>

</html>