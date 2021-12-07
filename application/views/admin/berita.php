<div class='row'>
<?php
 
if($aksi=="Daftar"){
	?>
<div class='col-md-12'>
<a href='<?php echo base_url('admin/berita/tambah_berita.html');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus'></i> Posting Baru</a>
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
            <tr><th>No</th><th>Waktu Post</th><th>Judul</th><th>Komentar</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        $sts=null;
        foreach ($result as $row) {
            $jkomen=$this->model_crud->cekData("detail_berita where id_berita='".$row->id_berita."'");
            echo "<tr><td>$no</td><td>".$this->model_function->tanggal($row->tgl)."</td><td>$row->judul</td><td>$jkomen Komentar</td><td>";
            echo "<a href='".base_url('admin/berita/lihat_berita/'.$row->id_berita)."' class='btn btn-sm btn-success'><i class='fa fa-fw fa-share'></i> Lihat</a>
            <a href='".base_url('admin/berita/sunting/'.$row->id_berita)."' class='btn btn-sm btn-warning'><i class='fa fa-fw fa-edit'></i> Sunting</a>
            <a href='".base_url('admin/berita/hapus/'.$row->id_berita)."' class='btn btn-sm btn-danger'><i class='fa fa-fw fa-trash'></i> Hapus</a>";
            echo "</td></tr>";
            $no++;
        }
        ?>
            
        </tbody>
    </table>
    </div>
</div>
<?php
}else if($aksi=="Lihat"){
	foreach ($result as $row) {
		$idp=$row->id_berita;
		$isip=$row->isi;
		$judulp=$row->judul;
		$tglp=$row->tgl;
	}
	?>
<div class="col-md-12">
	<div class="panel panel-default">\
		<div class="panel-body">
        <h4><i class="fa fa-fw fa-desktop"></i> <?php echo $judulp."<br><font style='font-size:12px'>".$this->model_function->tanggal($tglp)."</font>";?></h4>
        <hr>
		<?php echo $isip;?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
		<h4><i class="fa fa-fw fa-comments"></i> <?php echo $cekkomen;?> Komentar</h4>
		<hr>
		<table class="table table-striped">
		<?php
		foreach ($reskomen as $r) {
			if($r->id_admin!="0"){
				$resdet=$this->model_crud->selectData("admin","*","id_admin='".$r->id_admin."'");
				foreach ($resdet as $rs) {
					$nama=$rs->user;
				}
			}else{
				$nama=$r->nama;
			}

			
			
			echo "<tr><td><b>$nama    </b>
			<i class='fa fa-clock-o'  style='font-size:9px;color:#6F7678'></i><time style='font-size:9px;color:#6F7678'>&nbsp;".$this->model_function->tanggal($r->tgl)."</time>
			<hr style='margin-top:0px'>$r->komentar</td></tr>";
		}
		?>
		</table>
		<form method="post" action="<?php echo base_url('admin/berita/komentar_admin/'.$idp);?>">
			<textarea name="komen" class="form-control" placeholder='Komentar . . . . ' required></textarea>
			
			<input type="submit" name="komentar" value="Komentar" class="btn btn-primary"/>
		</form>
		</div>
	</div>
</div>
	<?php
}else{

if(isset($result)){
    foreach ($result as $row) {
    	$judul2 = $row->judul;
        $id_berita = $row->id_berita;
    	$isi = $row->isi;
    }
}
?>
<div class="col-md-12">
    <form method="post" action="<?php if(isset($result)){ echo base_url('admin/berita/proses_sunting/'.$id_berita);} else { echo base_url('admin/berita/proses_tambah');}?>">
        <?php
            echo "Judul<input type='text' name='judul' required class='form-control' ";
            if(isset($judul2))echo "value='".$judul2."' ";
            echo "/><br>Post";
        
        ?>
    	<textarea name="isi" id="isi" required placeholder='Post'><?php if(isset($isi))echo $isi;?></textarea><br>
    	<input type="submit" name="simpan" value="<?php
            if(!isset($result)){
                echo "Post";
            }else{
                echo "Sunting";
            }
        ?>" class="btn btn-primary">
    </form>
    </div>

<script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write('CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'isi' );
    }
</script>
	<?php
}
?>
</div>

