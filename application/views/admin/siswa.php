<div class='row'>
<?php
 
if($aksi=="Daftar"){
	?>
<div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-users"></i>&nbsp;&nbsp;Daftar Alumni</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link" href="#"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link" href="#"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class='col-md-12'>
            <a href='<?php echo base_url('admin/siswa/tambah.html');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus-square'></i> Tambah</a>
            <hr>
            <?php
            	$info = $this->session->flashdata('info');
            	if($info!=""){
            	echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
            	}
            ?>
            <div class="box-body table-responsive">
                <table  id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr><th>No</th><th>NIS</th><th>Nama</th><th>Jurusan</th><th>Tahun Lulus</th><th>Status</th><th>Tempat kerja / kuliah</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $sts ="";
                    foreach ($result as $row) {
                        switch ($row->status) {
                            case '0' : $sts = "Blm Kerja";break;
                            case '1' : $sts = "Kerja";break;
                            case '2' : $sts = "Kuliah";break;
                        }
                        echo "<tr><td>$no</td><td>$row->nis</td><td>$row->nama</td><td>$row->jurusan</td><td>$row->thn</td><td>$sts</td><td>$row->tempat</td><td><a href='".base_url('admin/siswa/ubah/'.$row->id_user)."' class='btn btn-sm btn-warning' title='Ubah'><i class='fa fa-fw fa-edit'></i> </a>";
                        ?>
                        <a href='<?php echo base_url('admin/siswa/hapus/'.$row->id_user);?>' class='btn btn-sm btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" title='Hapus' ><i class='fa fa-fw fa-trash'></i> </a>
                        <?php
                        echo "</td></tr>";
                        $no++;
                    }
                    ?>
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
</div>
<?php
}else{

if(isset($result)){
    foreach ($result as $row) {
    	$id_user = $row->id_user;
        $nama = $row->nama;
        $nis = $row->nis;
        $jurusan = $row->jurusan;
        $email = $row->email;
        $pwd = $row->pwd;
        $jk = $row->jk;
        $alamat = $row->alamat;
        $hp = $row->hp;
        $foto = $row->foto;
        $thn = $row->thn;
        $status = $row->status;
        $tempat = $row->tempat;

    }
}
?>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Alumni</h2>
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
                                    <form action="<?php if(isset($result)) echo base_url('admin/siswa/proses_ubah/'.$id_user);else echo base_url('admin/siswa/proses_tambah');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nama)) echo $nama;?>">
                                            </div>
                                        </div>
                                       

                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">NIS<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="nis" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nis)) echo $nis;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Jenis Kelamin<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="radio" name="jk" <?php if(isset($jk)){ if($jk =="l") echo "checked";}else{echo "checked";};?> value="l">&nbsp;Laki - laki&nbsp;&nbsp;
                                                <input type="radio" name="jk" <?php if(isset($jk) && $jk =="p"){  echo "checked";};?> value="p">&nbsp;Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"> Jurusan<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="jurusan" required="required" class="form-control col-md-7 col-xs-12">
                                                <option value="Akuntansi" <?php if(isset($jurusan) && $jurusan=="Akuntansi")echo "selected";?>>Akuntansi</option>
                                                <option value="Administrasi Perkantoran" <?php if(isset($jurusan) && $jurusan=="Administrasi Perkantoran")echo "selected";?>>Administrasi Perkantoran</option>
                                                <option value="Multimedia" <?php if(isset($jurusan) && $jurusan=="Multimedia")echo "selected";?>>Multimedia</option>
                                                <option value="Teknik Mesin Motor" <?php if(isset($jurusan) && $jurusan=="Teknik Mesin Motor")echo "selected";?>>Teknik Mesin Motor</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">   Tahun Lulus<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="thn" required="required" class="form-control col-md-7 col-xs-12">
                                                <?php
                                                $th = date('Y');
                                                for($i=$th-7;$i<=$th+3;$i++){
                                                    echo "<option value='$i' ";
                                                    if(isset($thn)){if ($thn==$i)echo "selected";}elseif ($th==$i){echo "selected";}
                                                    
                                                    echo " >$i</option>";
                                                }
                                                ?>
                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="alamat" class="form-control col-md-7 col-xs-12"><?php if(isset($alamat)) echo $alamat;?></textarea> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Email
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php if(isset($email)) echo $email;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Kontak
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="hp" class="form-control col-md-7 col-xs-12" value="<?php if(isset($hp)) echo $hp;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Password<?php if(!isset($result)) echo "<sup style='color:red'>*</sup>";?>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" name="pwd" <?php if(!isset($result)) echo "required";else echo"placeholder='Kosongi jika tidak diubah'";?> class="form-control col-md-7 col-xs-12" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php if(isset($foto) && $foto!="") echo "<img src='".base_url('assets/photos/siswa/'.$foto)."' class='img-responsive' style='max-width:200px;'><br>Ubah :<br> ";?>
                                                <input type="file" id="foto" name="foto" <?php if($aksi=="tambah") echo "required='required'";?> class="btn btn-default col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"> Status
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="status" class="form-control col-md-7 col-xs-12">
                                                <option value="0" <?php if(isset($status) && $status=="0")echo "selected";?>>Belum Kerja</option>
                                                <option value="1" <?php if(isset($status) && $status=="1")echo "selected";?>>Kerja</option>
                                                <option value="2" <?php if(isset($status) && $status=="2")echo "selected";?>>Kuliah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tempat Kerja / Kuliah <p style="font-size:12px">(Jika kerja / kuliah)</p>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="tempat"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($tempat)) echo $tempat;?>">
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                        NB :<BR>
                                        <sup style="color:red">*</sup>  Harus diisi
                                    </form>
                                </div>
                            </div>
	<?php
}
?>
</div>

