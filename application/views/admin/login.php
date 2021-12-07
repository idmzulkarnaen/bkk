<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login <?php echo $aksi;?></title>
    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url('assets/admin/css/bootstrap.min.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/admin/fonts/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/animate.min.css');?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url('assets/admin/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/icheck/flat/green.css');?>" rel="stylesheet">


    <script src="<?php echo base_url('assets/admin/js/jquery.min.js');?>"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script language='javascript'>
function validPassword(a)
{
    kar =/^[a-zA-Z0-9]{1,15}$/;
    if(!kar.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1);
    }
}
</script>



</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                
                    <form action="<?php if($aksi=="Administrator") echo base_url('admin/sign/proses_signin');else echo base_url('operator/sign/proses_signin');?>" method="post" >
                        <h1>Form Login </h1>
                        <?php 
    $info = $this->session->flashdata('info');
    if($info!=""){
      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    ?>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="user" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="pwd" required=""  />
                        </div>
                        <div>
                            <input type="submit" name="login" value="Log in" class="btn btn-default submit">

                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-user" style=' font-size:26px'></i> <span><?php echo $aksi;?></span></h1>

                                <p>&copy; BKK SMK Swagaya 1 Purwokerto <?php echo date('Y');?></p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->

                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>

</body>

</html>
