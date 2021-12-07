<?php
if($aksi=="list"){
?>
<style type="text/css">

	tr:hover #link{
		color: #fff;
	}
	tr #link{
		color:#00AEEF
	}

	tr:hover #link2{
		color: #fff;
	}
	tr #link2{
		color:#c7254e;
	}
</style>
<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h2><span><?php echo $jloker;?></span> Lamaran Kerja</h2>
                </div>
                <div class="row jobs">
                <?php 
			    $info = $this->session->flashdata('info');
			    $info1 = $this->session->flashdata('info1');
			    $info2 = $this->session->flashdata('info2');
			    if(!empty($info)){
			      echo "<div class='alert alert-success' role='alert'>".$info."</div>";
			    }
			    if(!empty($info1)){
			      echo "<div class='alert alert-danger' role='alert'>";
			      foreach ($info1 as $i) {
			      	echo $i;
			      }
			      echo "</div>";
			    }
			    if(!empty($info2)){
			      echo "<div class='alert alert-danger' role='alert'>".$info2."</div>";
			    }
			    ?>
                    <div class="col-md-9">
                        <div class="job-posts table-responsive">
                            <table class="table">

                            	<tr class='odd wow fadeInUp' data-wow-delay='1s' style="border-bottom:1px solid #ccc">
                                    <td ></td>
                                    <td >Nama Lowongan</td>
                                    <td>Perusahaan</td>
                                    <td>Wilayah</td>
                                    <td>Lampiran</td>
                                    <td></td>
                                    
                                </tr>
                            <?php
                            foreach ($rloker as $row) {
                            	$rlampran = $this->model_crud->selectData("lampiran","*","id_daftar='$row->id_daftar'");
                            	?>
                                <tr class='odd wow fadeInUp' data-wow-delay='1s' onclick="location='<?php echo base_url('lowongan/detail/'.$row->id_loker);?>'">
                                    <td class='tbl-logo'><img src='<?php echo base_url('assets/photos/perusahaan/'.$row->foto_perusahaan);?>' class='img-responsive' style='max-width:120px;max-height:120px'></td>
                                    <td class='tbl-title'><h4><?php echo $row->nama_loker;?> <br><span class='job-type'></span></h4></td>
                                    <td><p><?php echo $row->nama_perusahaan;?></p></td>
                                    <td><p><i class='icon-location' id='link'></i><?php echo $row->wilayah;?></p></td>
                                    <td><table><?php 
                                    foreach ($rlampran as $rl) {
                                     	echo "<tr><td><a id='link' href='".base_url('assets/file/lampiran/'.$rl->file)."' target='_blank' style='background:none;padding:0'>";
                                     	$format = substr($rl->file, -3);
                                     	if($format=="pdf"){
                                     		echo "<i class='fa fa-file-pdf-o' id='link'></i>";
                                     	}else if($format=="ocx"){
                                     		echo "<i class='fa fa-file-word-o' id='link'></i>";
                                     	}else if($format=="png" || $format=="jpg" || $format=="gif"){
                                     		echo "<i class='fa fa-file-image-o' id='link'></i>";
                                     	}else{
                                     		echo "<i class='fa fa-file-o' id='link'></i>";
                                     	}
                                     	echo " $rl->judul</a> </td><td>";
                                     	if($row->tutup >= date('Y-m-d')){
                                     	?>
                                     	<a href='<?php echo base_url('daftar/hapus_lampiran/'.$rl->id_lampiran);?>'  onclick="return confirm('Apakah anda yakin ingin menghapus lampiran <?php echo $rl->judul;?> ?')"  id='link2' title='hapus' style='background:none;padding:0' ><i class='fa fa-remove'></i></a>
                                     	<?php
                                     	}
                                     	echo "</td></tr>";
                                     } 
                                     ?></table></td>
                                     <td>
                                     <?php
                                     if($row->tutup >= date('Y-m-d')){
                                     	?>
                                     	<a href='<?php echo base_url('daftar/batal/'.$row->id_daftar);?>'  onclick="return confirm('Apakah anda yakin ingin membatalkan lamaran kerja ini ?')"   title='Batal' >Batal</a>
                                     <?php
	                                 }
	                                 ?>
	                                 </td>
                                    
                                </tr>
                                <?php
                            }
                            ?>
                                
                            </table>
                        </div>
                
                    </div>

                    <div class="col-md-3">
                        
                        <div class="wow fadeInRight" data-wow-delay="0.5s" style="background-color: rgb(249, 249, 249);padding:5%">
                        <h4>Tambah Lampiran Lamaran</h4><hr>
                            <form action="<?php echo base_url('daftar/tambah_lampiran');?>"  method="post" class=" form-inline" enctype="multipart/form-data">
                            <table width="100%">
                            	<tr><td style="padding:5px;font-size:14px" >Nama Loker<br><select name="daftar" required class="form-control" style="background-color: #fff">
                                    <?php
                                    foreach ($rloker as $rp) {
                                        echo "<option value='$rp->id_daftar'>$rp->nama_loker</option><br>";
                                    }
                                    ?>
                                    </select>
                                </td></tr>
                                <tr><td style="padding:5px;font-size:14px" >Nama Lampiran<br><input type="text" class="form-control" required style="background-color: #fff" name="judul"></td></tr>
                            	<tr><td style="padding:5px;font-size:14px" >Lampiran<br><input type="file" class="form-control" required style="background-color: #fff" name="file"></td></tr>
                            	<tr><td style="padding:5px"><input type="submit" class="btn" value="Tambah"></td></tr>
                            </table>                      
                            </form>
                        </div>
                        <br>
                    </div>
                    
                </div>
            </div>
<?php
}
?>
