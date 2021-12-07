<script>
function validPassword(a)
{
    kar =/^[a-zA-Z0-9\*]{1,15}$/;
    if(!kar.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1);
    }
}
</script>

<div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                 
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-3.jpg');?>" alt="Mirror Edge"></div>
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-2.jpg');?>" alt="The Last of us"></div>
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-1.jpg');?>" alt="GTA V"></div>
                 
                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <div style="background:rgba(0,0,0,0.4);padding-top:20px;padding-bottom:40px;border-radius:4px">
                        <h2>- Login -</h2>
                        <p>Login sebagai alumni SMK Swagaya 1 Purwokerto</p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">
                            <form action="<?php echo base_url('sign/proses_signin');?>" method="post" class=" form-inline">
                            <?php 
                            $info = $this->session->flashdata('info');
                            if($info!=""){
                              echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                            }
                            ?>
                                <div class="form-group">
                                    <input type="text"  required class="form-control" placeholder="Masukan NIS" name="nis">
                                </div>
                                <div class="form-group">
                                    <input type="text"  required class="form-control" placeholder="Masukan Password" name="pwd" onkeyup="validPassword(this);">
                                </div>
                                <input type="submit" class="btn" value="Login">


                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>