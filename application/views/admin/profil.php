<div class='row'>
<?php

if(isset($result)){
    foreach ($result as $row) {
        $nama = $row->nama;
        $user = $row->user;
    }
}
?>
<div class='col-md-6 col-sm-6'>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Profil</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <?php
                                    $info= $this->session->flashdata('info');
                                    $info1= $this->session->flashdata('info1');
                                    $info2= $this->session->flashdata('info2');
                                    if($info!=""){
                                      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                                    }
                                    if($info1!=""){
                                      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                      foreach ($info1 as $in) {
                                        echo $in;
                                      }
                                      echo "</div>";
                                    }
                                    if($info2!=""){
                                      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info2."</div>";
                                    }
                                    ?>
                                    <form action="<?php echo base_url('admin/profil/ubah_profil');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nama)) echo $nama;?>">
                                            </div>
                                        </div>
                                       

                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Username<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="user" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($user)) echo $user;?>">
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Ubah</button>
                                            </div>
                                        </div>
                                        NB :<br>
                                        <sup style="color:red">*</sup>  Harus diisi
                                    </form>
                                </div>
                            </div>
                        </div>

                    <div class='col-md-6 col-sm-6'>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Password</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <?php
                                    $info3= $this->session->flashdata('info3');
                                    $info4= $this->session->flashdata('info4');
                                    if($info3!=""){
                                      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info3."</div>";
                                    }
                                    if($info4!=""){
                                      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info4."</div>";
                                    }
                                    ?>
                                    <form action="<?php echo base_url('admin/profil/ubah_password');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama">Password Sekarang<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="pwd" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama">Password Baru<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="pwd1" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nama">Ulangi Password Baru<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="pwd2" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                                <button type="submit" class="btn btn-success">Ubah</button>
                                            </div>
                                        </div>
                                        NB :<br>
                                        <sup style="color:red">*</sup>  Harus diisi
                                    </form>
                                </div>
                            </div>
                        </div>
</div>

