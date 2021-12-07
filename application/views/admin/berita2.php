<div class='row'>
<?php
 
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
                        <tr><th>No</th><th>ID Berita</th><th>Judul</th><th>Isi</th>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $sts=null;
                    foreach ($result as $row) {
                               
                                ?>
                                <tr class='odd wow fadeInUp' data-wow-delay='1s'">
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row->id_berita;?></td>
                                    <td><?php echo $row->judul;?></td>
                                    <td><p><?php echo $row->isi;?></p></td>
                                    
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

</div>

