<div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">
                 
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-3.jpg');?>" alt="Mirror Edge"></div>
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-2.jpg');?>" alt="The Last of us"></div>
                  <div class="item"><img src="<?php echo base_url('assets/img/slider-image-1.jpg');?>" alt="GTA V"></div>
                 
                </div>
            </div>
            <div class="container slider-content" align="center">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <div style="background:rgba(0,0,0,0.4);padding-top:20px;padding-bottom:40px;border-radius:4px">
                        <h2>Ayo Kerja !</h2>
                        <p>Cari dan dapatkan pekerjaan dengan mudah melalui Bursa Kerja Khusus (BKK) SMK Swagaya 1 Purwokerto</p>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">
                            <form action="<?php echo base_url('lowongan');?>"  method="post" class=" form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Kata kunci" name="kunci">
                                </div>
                                <div class="form-group">
                                    <select name="perusahaan" id="" class="form-control">
                                    <?php 
                                    echo "<option value='0' selected>Semua Perusahaan</option>";
                                    foreach ($rperusahaan as $rp) {
                                        echo "<option value='$rp->id_perusahaan'>$rp->nama_perusahaan</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn" value="Cari">


                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-area">
            <div class="container">
                <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">
                    <h5>Our Process</h5>
                    <h2>How we work for you?</h2>
                    <p><b>BKK SMK Swagaya 1 Purwokerto</b> siap melayani anda sebagai alumni SMK Swagaya 1 Purwokerto. Kami menyediakan informasi dan pendaftaran lowongan kerja dari berbagai perusahaan terpercaya yang telah berkerjasama dengan kami.</p>
                </div>
                
            </div>

            <div class="container">
                <div class="row job-posting wow fadeInUp" data-wow-delay="1s">
                    <div role="tabpanel">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#perusahaan" aria-controls="home" role="tab" data-toggle="tab">Perusahaan</a></li>
                        
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="perusahaan">
                            <ul class="list-inline">
                            <?php
                            foreach ($rperusahaan as $rp) {
                            	echo "
                                <li>
                                    <a href=''>
                                        <img src='".base_url('assets/photos/perusahaan/'.$rp->foto)."' class='img-responsive' style='width:160px;height:160px'>
                                        <div class='overlay'><h3>$rp->nama_perusahaan</h3></div>
                                    </a>
                                </li>";
                                }
                                ?>
                                
                            </ul>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
            <hr>

            <div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Lowongan Kerja Terbaru</h5>
                    <h2><span><?php echo $jloker;?></span> Lowongan Kerja Tersedia</h2>
                </div>
                <div class="row jobs">
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                            <?php
                            foreach ($rloker as $row) {
                            	$jdaftar = $this->model_crud->cekData("daftar","where id_loker='$row->id_loker'");
                            	echo "
                                <tr class='odd wow fadeInUp' data-wow-delay='1s'>
                                    <td class='tbl-logo'><img src='".base_url('assets/photos/perusahaan/'.$row->foto_perusahaan)."' class='img-responsive' style='max-width:120px;max-height:120px'></td>
                                    <td class='tbl-title'><h4>$row->nama_loker <br><span class='job-type'>$row->butuh Orang</span></h4></td>
                                    <td><p>$row->nama_perusahaan</p></td>
                                    <td><p><i class='icon-location'></i>$row->wilayah</p></td>
                                    <td><p>$jdaftar Pendaftar</p></td>
                                    <td class='tbl-apply'><a href='#'>Daftar</a></td>
                                </tr>";
                            }
                            ?>
                                
                            </table>
                        </div>
                        <div class="more-jobs">
                            <a href=""> <i class="fa fa-refresh"></i>Lihat lowongan lainnya</a>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="wow fadeInRight" data-wow-delay="0.5s" style="background-color: rgb(249, 249, 249);padding:5%">
                            <ul class="nav nav-pills nav-stacked">
                              <li role="presentation" <?php if($this->input->get('q')=="") echo "class='active'";?> ><a href="<?php echo base_url('lowongan');?>">Tersedia</a></li>
                              <li role="presentation" <?php if($this->input->get('q')=="terlewat") echo "class='active'";?>><a href="<?php echo base_url('lowongan?q=terlewat');?>">Terlewat</a></li>
                            </ul>
                        </div>
                        <br>
                        <div class="wow fadeInRight" data-wow-delay="0.5s" style="background-color: rgb(249, 249, 249);padding:5%">
                            <form action="<?php echo base_url('lowongan');?>"  method="post" class=" form-inline">
                            <table width="100%">
                                <tr><td style="padding:5px" ><input type="text" class="form-control" placeholder="Kata kunci" style="background-color: #fff" name="kunci"></td></tr>
                                <tr><td style="padding:5px" ><select name="perusahaan" id="" class="form-control" style="background-color: #fff">
                                    <?php 
                                    echo "<option value='0' selected>Semua Perusahaan</option>";
                                    foreach ($rperusahaan as $rp) {
                                        echo "<option value='$rp->id_perusahaan'>$rp->nama_perusahaan</option>";
                                    }
                                    ?>
                                    </select>
                                </td></tr>
                                <tr><td style="padding:5px"><input type="submit" class="btn" value="Cari"></td></tr>
                            </table>                      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            

        </div>