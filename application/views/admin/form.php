<?php
if(isset($result)){
    foreach ($result as $row) {
    	$konten2 = $row->konten;
        $judul2 = $row->judul;
        $id_modul = $row->id_modul;
    }
}

$info=$this->session->flashdata('info');
?>
<div class="row">
    <div class="col-md-12"><?php
    if($info!=""){
      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    ?>
    <form method="post" action="<?php echo base_url('admin/profil/ubah_modul?id='.$id_modul.'&j='.$j);?>">
    Judul :
    <input type="text" value="<?php if(!empty($judul2))echo $judul2;?>" name="judul" class="form-control">
    <br>
    Konten :
    	<textarea name="konten" id="konten" required placeholder='Post'><?php if(!empty($konten2))echo $konten2;?></textarea>
        
    	<br><input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
        var editor = CKEDITOR.replace( 'konten' );
    }
</script>