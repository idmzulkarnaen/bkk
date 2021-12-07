<div class='row'>

    <?php
    if($halaman=="tampil"){
    ?>

    <div class='col-md-12'>
        <a href='<?php echo base_url('admin/alumni/tambah');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus'></i> Posting Baru</a>
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
                    <tr><th>No</th><th>NIS</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($query as $row) {
                    echo "<tr><td>$no</td><td>$row->nis</td><td>$row->nama</td><td>$row->jurusan</td><td>

                    <a href='".base_url('admin/alumni/edit/'.$row->id_user)."' class='btn btn-warning'><i class='fa fa-pencil'></i> Edit</a>
                    <a href='".base_url('admin/alumni/hapus/'.$row->id_user)."' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a>
                    </td></tr>";

                    $no++;
                   
                }
                ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php
    }else{

        if(isset($query)){
            foreach ($query as $row) {
                $id = $row->id_user;
                $nama = $row->nama;
                $nis = $row->nis;
                $jk = $row->jk;
                $jurusan = $row->jurusan;
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
                                    <form action="<?php  if(isset($query)){ echo base_url('admin/alumni/proses_ubah');}else{ echo base_url('admin/alumni/proses_tambah');}?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                         <input type="hidden"  name="id" value="<?php if(isset($id))echo $id;?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nama))echo $nama;?>">
                                            </div>
                                        </div>

                                       

                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">NIS<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="nis" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($nis))echo $nis;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Jenis Kelamin<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="radio" name="jk" value="l" <?php if($jk=="l")echo "checked";?> >&nbsp;Laki - laki&nbsp;&nbsp;
                                                <input type="radio" name="jk" value="p" <?php if($jk=="p")echo "checked";?> >&nbsp;Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"> Jurusan<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="jurusan" required="required" class="form-control col-md-7 col-xs-12">
                                                    <option value="Akuntansi" <?php if($jurusan=="Akuntansi")echo "selected";?> >Akuntansi</option>
                                                    <option value="Administrasi Perkantoran" <?php if($jurusan=="Administrasi Perkantoran")echo "selected";?>>Administrasi Perkantoran</option>
                                                    <option value="Multimedia" <?php if($jurusan=="Multimedia")echo "selected";?>>Multimedia</option>
                                                    <option value="Teknik Mesin Motor" <?php if($jurusan=="Teknik Mesin Motor")echo "selected";?>>Teknik Mesin Motor</option>
                                                </select>
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
