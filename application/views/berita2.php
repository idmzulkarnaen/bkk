
<?php
if($halaman=="1"){

?>
<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Daftar Berita</h5>
                </div>

                <div>
                	<?php 
                	foreach ($result as $row) {
                		echo "<h3><a href='".base_url('berita2/detail_berita/'.$row->id_berita)."'>".$row->judul."</a></h3><br>
                		".$this->model_function->tanggal($row->tgl)."<br>

                		$row->isi";
                	}
                	 ?>
                </div>
            </div>
<?php
}
else
{

?>

<div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Detail Berita</h5>
                </div>

                <div>
                	<?php 
                	foreach ($result as $row) {
                		echo "<h3><a href='".base_url('berita2/detail_berita/'.$row->id_berita)."'>".$row->judul."</a></h3><br>
                		".$this->model_function->tanggal($row->tgl)."<br>

                		$row->isi";
                	}
                	 ?>
                </div>
            </div>


<?php
}
?>
