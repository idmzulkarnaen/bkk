<?php
if($aksi=="list"){
?>
<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Lowongan Kerja Terbaru</h5>
                    <h2><span><?php echo $jloker;?></span> Lowongan Kerja Tersedia</h2>
                </div>
                <div class="row jobs">
                	<div class="col-md-3">
                        
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
                        <br>
                    </div>

                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                            <?php
                            foreach ($rloker as $row) {
                            	$jdaftar = $this->model_crud->cekData("daftar","where id_loker='$row->id_loker'");
                            	?>
                                <tr class='odd wow fadeInUp' data-wow-delay='1s' onmouseover="this.style.cursor='pointer'" onclick="location='<?php echo base_url('lowongan/detail/'.$row->id_loker);?>'">
                                    <td class='tbl-logo'><img src='<?php echo base_url('assets/photos/perusahaan/'.$row->foto_perusahaan);?>' class='img-responsive' style='max-width:120px;max-height:120px'></td>
                                    <td class='tbl-title'><h4><?php echo $row->nama_loker;?> <br><span class='job-type'></span></h4></td>
                                    <td><p><?php echo $row->nama_perusahaan;?></p></td>
                                    <td><p><i class='icon-location'></i><?php echo $row->wilayah;?></p></td>
                                    <td><p><?php echo $jdaftar;?> Pendaftar</p></td>
                                    <td class='tbl-apply'>
                                    <?php
                                if($row->tutup >= date('Y-m-d')){
                                    echo "<a href='".base_url('daftar/proses_daftar/'.$row->id_loker)."'>Daftar</a>";
                                }
                                ?>
                                </td>
                                </tr>
                                <?php
                            }
                            ?>
                                
                            </table>
                        </div>
                        <div class="more-jobs">
                            <a href=""> <i class="fa fa-refresh"></i>Lihat lowongan lainnya</a>
                        </div>
                    </div>
                    
                </div>
            </div>
<?php
}else if($aksi=="detail"){

	foreach ($result as $row) {
                            	$jdaftar = $this->model_crud->cekData("daftar","where id_loker='$row->id_loker'");
                            	$foto = $row->foto_perusahaan;
                            	$nama_perusahaan = $row->nama_perusahaan;
                            	$butuh = $row->butuh;
                            	$id_loker = $row->id_loker;
                            	$nama_loker = $row->nama_loker;
                            	$wilayah = $row->wilayah;
                            	$syarat = $row->syarat;
                            	$tempat = $row->tempat_test;
                            	$waktu = $row->tgl_test;
                            	$tutup = $row->tutup;
                            	$ket = $row->ket;
                            }
?>
<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Detail Lowongan Kerja</h5>
                    <h2><?php echo $nama_loker;?></h2>
                </div>
                <div class="row jobs">
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">
                                <tr class='odd wow fadeInUp' data-wow-delay='1s' style="border-bottom:3px solid #fff;">
                                    <td class='tbl-logo' colspan="2"  width='20%' align="center"><img src='<?php echo base_url('assets/photos/perusahaan/'.$foto);?>' class='img-responsive' style='max-width:120px;max-height:120px'></td>
                                    <td class='tbl-title' width='80%' align='left' >
                                    <table width="100%">
                                    	<tr><td><h4><?php echo $nama_perusahaan;?></h4></td><td class='tbl-apply' align="right"><div class="wow fadeInRight text-right" data-wow-delay="1.5s">
			                            <?php
			                            if($row->tutup >= date('Y-m-d')){
			                            	echo "<a href='".base_url('daftar/proses_daftar/'.$id_loker)."'>Daftar</a>";
			                            }
			                            ?>
			                        </div></td></tr>
                                    </table>

                                    
			                        </td>

                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='15%'>Wilayah</td>
                                    <td width='5%'>:</td>
                                    <td width='80%' align='left'><?php echo $wilayah;?></td>
                                </tr> 
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='15%'>Butuh</td>
                                    <td width='5%'>:</td>
                                    <td width='80%' align='left'><?php echo $butuh;?> Orang</td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td ><br>Syarat</td>
                                    <td colspan="2"><br>:</td>
                                </tr> 
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='15%' valign="top"></td>
                                    <td width='5%' valign="top"></td>
                                    <td width='80%' align='left'><?php echo $syarat;?></td>
                                </tr>  
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s' style="border-bottom:3px solid #fff;">
                                    <td width='15%'>Terakhir Pendaftaran</td>
                                    <td width='5%'>:</td>
                                    <td width='80%' align='left'><?php if($tutup!="0000-00-00") echo $this->model_function->tanggal($tutup);?></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td colspan="3">Test</td>
                                </tr>  
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='15%' align="right">Tempat</td>
                                    <td width='5%'>:</td>
                                    <td width='80%' align='left'><?php echo $tempat;?></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s' style="border-bottom:3px solid #fff;">
                                    <td width='15%' align="right">Waktu</td>
                                    <td width='5%'>:</td>
                                    <td width='80%' align='left'><?php if($waktu!="0000-00-00 00:00:00") echo $this->model_function->tanggal($waktu);?></td>
                                </tr> 
                                <tr class='odd wow fadeInUp' data-wow-delay='1.30s'>
                                    <td colspan="3" align='text-justify' style="padding:10px"><br><?php echo $ket;?></td>
                                </tr>                             
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        
                    </div>
                </div>
            </div>
<?php
}
?>
