<div class='row'>
<?php
 
if($aksi=="Daftar"){
	?>
<div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-perusahaans"></i>&nbsp;&nbsp;Daftar perusahaan</h2>
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
            <a href='<?php echo base_url('admin/perusahaan/tambah.html');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus-square'></i> Tambah</a>
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
                        <tr><th>No</th><th>Nama</th><th>Alamat</th><th>Email</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $sts=null;
                    foreach ($result as $row) {
                        echo "<tr><td>$no</td><td>$row->nama_perusahaan</td><td>$row->alamat</td><td>$row->email</td><td><a href='".base_url('admin/perusahaan/ubah/'.$row->id_perusahaan)."' class='btn btn-sm btn-warning'><i class='fa fa-fw fa-edit'></i> Ubah</a>";
                        ?>
                        <a href='<?php echo base_url('admin/perusahaan/hapus/'.$row->id_perusahaan);?>' onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class='btn btn-sm btn-danger'><i class='fa fa-fw fa-trash'></i> Hapus</a>
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
    	$id_perusahaan = $row->id_perusahaan;
        $nama = $row->nama_perusahaan;
        $email = $row->email;
        $pwd = $row->pwd;
        $alamat = $row->alamat;
        $hp = $row->hp;
        $ket = $row->keterangan;
        $foto = $row->foto;

    }
}
?>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Data perusahaan</h2>
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
                                    <form action="<?php if(isset($result)) echo base_url('admin/perusahaan/proses_ubah/'.$id_perusahaan);else echo base_url('admin/perusahaan/proses_tambah');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Perusahaan<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nama)) echo $nama;?>">
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Email<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($email)) echo $email;?>">
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
                                                <?php if(isset($foto) && $foto!="") echo "<img src='".base_url('assets/photos/perusahaan/'.$foto)."' class='img-responsive' style='max-width:200px;'><br>Ubah :<br> ";?>
                                                <input type="file" id="foto" name="foto" <?php if($aksi=="tambah") echo "required='required'";?> class="btn btn-default col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Keterangan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="ket" name="ket" class="form-control col-md-7 col-xs-12"><?php if(isset($ket)) echo $ket;?></textarea> 
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


<script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write('CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'ket' );
    }
</script>

	<?php
}
?>
</div>

