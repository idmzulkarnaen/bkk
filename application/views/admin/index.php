<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrator | BKK SMK Swagaya 1 Purwokerto</title>



    <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/admin/fonts/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/animate.min.css');?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('favicon.png');?>" type="image/x-icon">

  
    <link href="<?php echo base_url('assets/admin/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/icheck/flat/green.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/datatables/tools/css/dataTables.tableTools.css');?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/admin/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/lib/ckeditor/ckeditor.js');?>"></script>

    <link href="<?php echo base_url('assets/admin/css/select/select2.min.css');?>" rel="stylesheet">

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url('admin');?>" class="site_title"> <i class="fa fa-user" style='padding:5px 8px 5px 8px;'></i> <span>Administrator</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                           <h3>General</h3> 
                            <ul class="nav side-menu">
                                <li><a href="<?php echo base_url('admin/main.html');?>" ><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="<?php echo base_url('admin/alumni');?>" ><i class="fa fa-meh-o"></i> Alumni </a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Master Data</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo base_url('admin/siswa.html');?>" ><i class="fa fa-users"></i> Data Alumni</a>
                                </li>

                                <li><a href="<?php echo base_url('admin/perusahaan.html');?>" ><i class="fa fa-building"></i> Data Perusahaan </a>
                                </li>

                                <li><a href="<?php echo base_url('admin/lowongan.html');?>" ><i class="fa fa-list-alt"></i> Data Lowongan Kerja </a>
                                </li>

                                <li><a href="<?php echo base_url('admin/lamaran.html');?>" ><i class="fa fa-briefcase"></i> Data Lamaran Kerja </a>
                                </li>
                                

                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Master Admin</h3>
                            <ul class="nav side-menu">

                                <li><a><i class="fa fa-university"></i> Profil <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li>
                                            <a href="<?php echo base_url('/admin/profil/visimisi.html');?>">Visi & Misi</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('/admin/profil/struktur.html');?>">Struktur Organisasi</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('admin/berita.html');?>" ><i class="fa fa-newspaper-o"></i> Berita </a>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="menu_section">                           
                            <ul class="nav side-menu">
                               
                                <li><a href="<?php echo base_url();?>"  target="_blank"><i class="fa fa-laptop"></i> Lihat Web </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> Akun
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url('admin/profil');?>">  Profil</a>
                                    </li>
                                    
                                    <li><a href="<?php echo base_url('admin/sign/signout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                           

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                

                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php 
                            echo $judul;
                            if(isset($subjudul)) echo "  <small>$subjudul</small>";
                            ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <?php
                $this->load->view($konten);
                ?>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

            
                
                <!-- /footer content -->
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js');?>"></script>

        <!-- chart js -->
        <script src="<?php echo base_url('assets/admin/js/chartjs/chart.min.js');?>"></script>
        <!-- bootstrap progress js -->
        <script src="<?php echo base_url('assets/admin/js/progressbar/bootstrap-progressbar.min.js');?>"></script>
        <script src="<?php echo base_url('assets/admin/js/nicescroll/jquery.nicescroll.min.js');?>"></script>
        <!-- icheck -->
        <script src="<?php echo base_url('assets/admin/js/icheck/icheck.min.js');?>"></script>

        <script src="<?php echo base_url('assets/admin/js/custom.js');?>"></script>


        <!-- Datatables -->
        <script src="<?php echo base_url('assets/admin/js/datatables/js/jquery.dataTables.js');?>"></script>
        <script src="<?php echo base_url('assets/admin/js/datatables/tools/js/dataTables.tableTools.js');?>"></script>
        <!-- dropzone -->
        <script src="<?php echo base_url('assets/admin/js/dropzone/dropzone.js');?>"></script>


        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
</body>

</html>