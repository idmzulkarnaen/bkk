<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BKK SMK Swagaya 1 Purwokerto</title>
        <meta name="description" content="company is a free job board template">
        <meta name="author" content="Ohidul">
        <meta name="keyword" content="html, css, bootstrap, job-board">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="<?php echo base_url('favicon.png');?>" type="image/x-icon">
        <link rel="icon" href="favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/fontello.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">        
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.transitions.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/responsive.css');?>">
        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.6.2.min.js');?>"></script>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->
	

        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/img/logo.png');?>" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
              <ul class="main-nav nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('iduser')!=""){?>
                <li class="wow fadeInDown" data-wow-delay="0s"><a <?php if($this->uri->segment(1)=="") echo "class='active'";?> href="<?php echo base_url();?>">Home</a></li>
                <li class="dropdown wow " data-wow-delay="0.2s"><a href="#"  class="dropdown-toggle <a <?php if($this->uri->segment(2)=="visimisi" || $this->uri->segment(2)=="struktur") echo "active";?> " data-toggle="dropdown" href="#" role="button" aria-expanded="false"> Profil<span class="caret"></span></a>
                    <ul  class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li ><a <?php if($this->uri->segment(2)=="visimisi") echo "class='active'";?> href="<?php echo base_url('profil/visimisi.html');?>">Visi dan Misi</a></li>
                        <li ><a <?php if($this->uri->segment(2)=="struktur") echo "class='active'";?> href="<?php echo base_url('profil/struktur.html');?>">Struktur Organisasi</a></li>
                    </ul>  
                </li>
                <li class="dropdown wow " data-wow-delay="0.2s"><a href="#"  class="dropdown-toggle <a <?php if($this->uri->segment(2)=="visimisi" || $this->uri->segment(2)=="struktur") echo "active";?> " data-toggle="dropdown" href="#" role="button" aria-expanded="false"><I CLASS="fa fa-MEH-O"></i> Contoh<span class="caret"></span></a>
                    <ul  class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="berita") echo "class='active'";?> href="<?php echo base_url('contoh.html');?>"><I CLASS="fa fa-wechat"></i> Contoh</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="berita") echo "class='active'";?> href="<?php echo base_url('contoh.html');?>"><I CLASS="fa fa-wechat"></i> Contoh</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="berita") echo "class='active'";?> href="<?php echo base_url('contoh.html');?>"><I CLASS="fa fa-wechat"></i> Contoh</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="berita") echo "class='active'";?> href="<?php echo base_url('contoh.html');?>"><I CLASS="fa fa-wechat"></i> Contoh</a></li>
                    </ul>  
                </li>
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="berita") echo "class='active'";?> href="<?php echo base_url('berita.html');?>">Berita</a></li>
                
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a <?php if($this->uri->segment(1)=="lowongan") echo "class='active'";?> href="<?php echo base_url('lowongan.html');?>">Lowongan Kerja</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.2s"><a <?php if($this->uri->segment(1)=="daftar") echo "class='active'";?> href="<?php echo base_url('daftar.html');?>">Lamaran</a></li>
                <li class="dropdown wow " data-wow-delay="0.2s"><a href="#"  class="dropdown-toggle <a <?php if($this->uri->segment(1)=="profil") echo "active";?> " data-toggle="dropdown" href="#" role="button" aria-expanded="false">Akun <span class="caret"></span></a>
                    <ul  class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li ><a <?php if($this->uri->segment(1)=="profil"&&$this->uri->segment(2)=="") echo "class='active'";?> href="<?php echo base_url('profil.html');?>">Profil</a></li>
                        <li ><a href="<?php echo base_url('sign/signout');?>" onclick="return confirm('Apakah anda yakin ingin Logout ?')" title='Logout'>Logout</a></li>                    
                    </ul>  
                </li>
                <?php }?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <?php
        $this->load->view($konten);
        ?>
        <div class="footer-area" id="kontak">
            <div class="container">
                <div class="row footer">
                    <div class="col-md-4">
                        <div class="single-footer">
                            <img src="<?php echo base_url('assets/img/footer-logo.png');?>" alt="" class="wow pulse" data-wow-delay="1s">
                            <p class="text-justify" style="padding-right:20px"><b>Bursa Kerja Khusus (BKK) SMK Swagaya 1 Purwokerto</b> merupakan salah satu wadah pemasaran tamatan  sesuai dengan bidang keahlian yang terdapat di SMK Swagaya 1 Purwokerto dan merupakan pusat informasi ketenagakerjaan dalam memenuhi pasar kerja</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-footer">
                            <h4>Kontak Kami</h4>
                            <div class="twitter-updates">
                                <table>
                                    <tr><td style="padding:5px;" valign="top"><p><i class="icon-location" style="color:#00AEEF"></i></p></td><td><p>Jln. Overste Isdiman 54/IX Purwokerto, 53114</p></td></tr>
                                    <tr><td style="padding:5px;" valign="top"><p><i class="icon-mail" style="color:#00AEEF"></i></p></td><td><p>info@smkswagaya1pwt.sch.id</p></td></tr>
                                    <tr><td style="padding:5px;" valign="top"><p><i class="fa fa-phone" style="color:#00AEEF"></i></p></td><td><p>(0281) 637850</p></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row footer-copy">
                    <p><span>(C) BKK SMK Swagaya 1 Purwokerto, All rights reserved</span> </p>
                </div>
            </div>
        </div>
		
		
		
		
		
        <script src="<?php echo base_url('assets/js/vendor/jquery-1.10.2.min.js');?>"></script>
        
            <script src="<?php echo base_url('assets/js/vendor/jquery-1.10.2.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/wow.js');?>"></script>
        <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    </body>
</html>
