<?php

	foreach ($result as $row) {
                            	$foto = $row->foto;
                            	$nama = $row->nama;
                            	$nis = $row->nis;
                            	$id_user = $row->id_user;
                            	$jurusan = $row->jurusan;
                            	$email = $row->email;
                            	$jk = $row->jk;
                            	$alamat = $row->alamat;
                            	$hp = $row->hp;
                                $thn = $row->thn;
                                $status = $row->status;
                                $tempat = $row->tempat;

                                
                            }
                            
                                    $ipwd= $this->session->flashdata('ipwd');
?>
<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h2>Profil</h2>
                </div>
                <div class="row jobs">
                    <div class="col-md-3 hidden-sm">
                        <!-- Nav tabs -->
					  <ul class="nav nav-tabs nav-stacked" role="tablist" style="border-left:2px #ccc solid;border-top:1px #ccc solid">
					    <li role="presentation" class="<?php if($ipwd=="")echo "active";?>" ><a href="#profil" aria-controls="profil" role="tab" data-toggle="tab">Profil</a></li>
					    <li role="presentation" class="<?php if($ipwd!="")echo "active";?>" ><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Ubah Password</a></li>
					    
					  </ul>
                    </div>
                    <div class="col-md-9">
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
                    <div role="tabpanel">

					  

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane <?php if($ipwd=="")echo "active";?>" id="profil">

					    <div class="job-posts table-responsive">
                        <form action="<?php echo base_url('profil/proses_ubah');?>" method='post' enctype="multipart/form-data">
                            <table class="table">
                                <tr class='odd wow fadeInUp' data-wow-delay='1s' style="border-bottom:3px solid #fff;">
                                    <td class='tbl-logo' colspan="2"  width='20%'>Foto :<img src='<?php 
                                    if($foto!=""){
                                        echo base_url('assets/photos/siswa/'.$foto);
                                    }else{
                                        echo base_url('assets/img/how-work3.png');
                                    }
                                    ?>' class='img-responsive' style='max-width:120px;max-height:120px'>
                                    Ubah : <input type="file" name='foto' class='form-control input-sm'></td>
                                    <td class='tbl-title' width='80%' align='left' >
                                    <table width="100%">
                                    	<tr><td><h4><?php echo $nama;?></h4></td><td class='tbl-apply' align="right"><div class="wow fadeInRight text-right" data-wow-delay="1.5s">
			                           
			                        </div></td></tr>
                                    </table>

                                    
			                        </td>

                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Nis</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><?php echo $nis;?></td>
                                </tr> 
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Jurusan</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><?php echo $jurusan;?></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Tahun Lulus</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><?php echo $thn;?></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Jenis Kelamin</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><input type='Radio' name='jk' value="l" <?php if($jk=="l") echo "checked";?> /> Laki - laki <input type='Radio' name='jk' value="p" <?php if($jk=="p") echo "checked";?> /> Perempuan</td>
                                </tr>
                                
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Alamat</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><textarea name='alamat' class='form-control' ><?php echo $alamat;?></textarea></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Email</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><input type='email' name='email' class='form-control' value="<?php echo $email;?>" /></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Kontak</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><input type='number' name='hp' class='form-control' value="<?php echo $hp;?>" /></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Status</td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'>
                                    <select name="status" class="form-control">
                                        <option value="0" <?php if($status=="0")echo "selected";?> >Belum Kerja</option>
                                        <option value="1" <?php if($status=="1")echo "selected";?> >Kerja</option>
                                        <option value="2" <?php if($status=="2")echo "selected";?> >Kuliah</option>
                                    </select></td>
                                </tr>
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='20%'>Tempat Kerja / Kuliah <p>(Bagi yg kuliah / kerja)</p></td>
                                    <td width='5%'>:</td>
                                    <td width='75%' align='left'><input type='text' name='tempat' class='form-control' value="<?php echo $tempat;?>" /></td>
                                </tr>
                                
                                <tr class='odd wow fadeInUp' data-wow-delay='1.30s'>
                                	<td colspan="2"></td>
                                    <td ><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
                                </tr>                             
                            </table>
                        </form>
                        </div></div>
					    <div role="tabpanel" class="tab-pane <?php if($ipwd!="")echo "active";?>" id="password">
					    <div class="job-posts table-responsive">
                        <form action="<?php echo base_url('profil/ubah_password');?>" method='post'>
                            <table class="table">
                                
                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='25%'>Password Sekarang</td>
                                    <td width='5%'>:</td>
                                    <td width='70%' align='left'><input type='password' name='pwd' class='form-control' /></td>
                                </tr>

                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='25%'>Password Baru</td>
                                    <td width='5%'>:</td>
                                    <td width='70%' align='left'><input type='password' name='pwd1' class='form-control' /></td>
                                </tr>

                                <tr class='odd wow fadeInUp' data-wow-delay='1.25s'>
                                    <td width='25%'>Ulangi Password Baru</td>
                                    <td width='5%'>:</td>
                                    <td width='70%' align='left'><input type='password' name='pwd2' class='form-control' /></td>
                                </tr>
                                
                                <tr class='odd wow fadeInUp' data-wow-delay='1.30s'>
                                	<td colspan="2"></td>
                                    <td ><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td>
                                </tr>                             
                            </table>
                        </form>
                        </div>
                        </div>
					  </div>

					</div>


                        
                    </div>
                </div>
            </div>
