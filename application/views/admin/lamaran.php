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
            <?php
            	$info = $this->session->flashdata('info');
            	if($info!=""){
            	echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
            	}
            ?>
            <div class="box-body table-responsive">
                <table  id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr><th>No</th><th>Nama Alumni</th><th>Nama Loker</th><th>Perusahaan</th><th>Wilayah</th><th>Lampiran</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $sts=null;
                    foreach ($result as $row) {
                                $rlampran = $this->model_crud->selectData("lampiran","*","id_daftar='$row->id_daftar'");
                                ?>
                                <tr class='odd wow fadeInUp' data-wow-delay='1s' onclick="location='<?php echo base_url('lowongan/detail/'.$row->id_loker);?>'">
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row->nama;?></td>
                                    <td><?php echo $row->nama_loker;?></td>
                                    <td><p><?php echo $row->nama_perusahaan;?></p></td>
                                    <td><p><?php echo $row->wilayah;?></p></td>
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
                                        
                                        echo "</td></tr>";
                                     } 
                                     ?></table></td>
                                     <td>
                                        <a href='<?php echo base_url('daftar/batal/'.$row->id_daftar);?>'  onclick="return confirm('Apakah anda yakin ingin menghapus lamaran kerja ini ?')"   title='Batal' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</a>
                                     </td>
                                    
                                </tr>
                                <?php
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
}
?>
</div>

