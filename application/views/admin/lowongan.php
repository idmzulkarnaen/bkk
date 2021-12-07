<div class='row'>
<?php
 
if($aksi=="Daftar"){
	?>
<div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-lokers"></i>&nbsp;&nbsp;Daftar Lowongan</h2>
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
            <a href='<?php echo base_url('admin/lowongan/tambah.html');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus-square'></i> Tambah</a>
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
                        <tr><th>No</th><th>Nama Loker</th><th>Perusahaan</th><th>Wilayah</th><th>Butuh</th><th>Tutup</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $sts=null;
                    foreach ($result as $row) {
                        echo "<tr><td>$no</td><td>$row->nama_loker</td><td>$row->nama_perusahaan</td><td>$row->wilayah</td><td>$row->butuh Orang</td><td>".$this->model_function->tanggal($row->tutup)."</td><td><a href='".base_url('admin/lowongan/ubah/'.$row->id_loker)."' class='btn btn-sm btn-warning'><i class='fa fa-fw fa-edit'></i> Ubah</a>";
                        ?>
                        <a href='<?php echo base_url('admin/lowongan/hapus/'.$row->id_loker);?>' class='btn btn-sm btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class='fa fa-fw fa-trash'></i> Hapus</a>
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
    	$id_loker = $row->id_loker;
        $id_perusahaan = $row->id_perusahaan;
        $nama = $row->nama_loker;
        $wilayah = $row->wilayah;
        $butuh = $row->butuh;
        $syarat = $row->syarat;
        $tempat = $row->tempat_test;
        $tgl = $row->tgl_test;
        $tutup = $row->tutup;
        $ket = $row->ket;

    }
}
?>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Lowongan</h2>
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
                                    <form action="<?php if(isset($result)) echo base_url('admin/lowongan/proses_ubah/'.$id_loker);else echo base_url('admin/lowongan/proses_tambah');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Loker<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nama)) echo $nama;?>">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"> Perusahaan<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="id_perusahaan" required="required" class="form-control col-md-7 col-xs-12">
                                                <?php
                                                $query = $this->model_crud->selectData("perusahaan order by nama_perusahaan");
                                                foreach ($query as $r) {
                                                echo "<option value='$r->id_perusahaan' ";
                                                if(isset($id_perusahaan) && $id_perusahaan==$r->id_perusahaan) echo "selected";
                                                echo " >$r->nama_perusahaan</option>";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Wilayah
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="wilayah" class="form-control col-md-7 col-xs-12" value="<?php if(isset($wilayah)) echo $wilayah;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Butuh
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" name="butuh" class="form-control col-md-7 col-xs-12" value="<?php if(isset($butuh)) echo $butuh;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Terakhir Pendaftaraan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="date" name="tutup" class="form-control col-md-7 col-xs-12" value="<?php if(isset($tutup)) echo $tutup;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Waktu Test
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="TEXT" name="tgl" class="form-control col-md-7 col-xs-12" value="<?php if(isset($tgl)) echo $tgl;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tempat Test
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="tempat" class="form-control col-md-7 col-xs-12" value="<?php if(isset($tempat)) echo $tempat;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Syarat
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="syarat" name="syarat" class="form-control col-md-12 col-xs-12"><?php if(isset($syarat)) echo $syarat;?></textarea> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Keterangan
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="ket" name="ket" class="form-control col-md-12 col-xs-12"><?php if(isset($ket)) echo $ket;?></textarea> 
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
        var editor = CKEDITOR.replace( 'syarat' );
        var editor1 = CKEDITOR.replace( 'ket' );
    }
</script>
	<?php
}
?>
</div>

