<?php
if($aksi=="Daftar"){
	echo "
		<div class='container'>
                <div class='row page-title text-center wow bounce'  data-wow-delay='1s'>
                    <h2>BERITA</h2>
                </div>
                <div class='row jobs'>
                    <div class='col-md-12'>";
	foreach ($result as $row) {
		echo "
						<h3 class='post-title'><a href='".base_url('berita/detail_berita/'.$row->id_berita)."'>$row->judul</a></h3>
						<span style='font-size:10px'><i class='fa fa-clock-o' ></i>  ".$this->model_function->tanggal($row->tgl)."</span>
						<div class='post-content'><br>
							<p> ";
							echo substr(strip_tags($row->isi),0,350);
			                  if(strlen(strip_tags($row->isi))>350)echo "............  ";
			                echo "<BR><a href='".base_url('berita/detail_berita/'.$row->id_berita)."' class='more-link'>Lanjut Baca <span class='meta-nav'>&rarr;</span></a></p>
						</div>
					<hr>";
}
		echo "		<div align='center'>".$halaman."</div>
					</div>
				</div>
				
		</div>";

}else{


	foreach ($result as $row) {
		echo "
		<div class='container'>
                <div class='row page-title text-center wow bounce'  data-wow-delay='1s'>
                    <h2><span>$row->judul</h2>
                </div>
                <div class='row jobs'>
                    <div class='col-md-12'>
						<span style='font-size:10px'><i class='fa fa-clock-o' ></i>  ".$this->model_function->tanggal($row->tgl)."</span>
						<div class='post-content'><br>
							<p> $row->isi 
						</div>
					<hr>";
}
		echo "		
					</div>
				</div>
				
		</div>";

		?>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				<div class="panel panel-default">
				<div class="panel-body">
				<h4><i class="fa fa-fw fa-comments"></i> <?php echo $cekkomen;?> Komentar</h4>
				<table class="table">
				<?php
				foreach ($reskomen as $r) {
					if($r->id_admin!="0"){
						$resdet=$this->model_crud->selectData("admin","*","id_admin='".$r->id_admin."'");
						foreach ($resdet as $rs) {
							$nama=$rs->user;
						}
					}else{
						$resdet=$this->model_crud->selectData("user","*","id_user='".$r->id_user."'");
						foreach ($resdet as $rs) {
							$nama=$rs->nama;
						}
					}

					
					
					echo "<tr><td style='font-size:12px'><b>$nama    </b>
					<i class='fa fa-clock-o'  style='font-size:9px;color:#6F7678'></i><time style='font-size:9px;color:#6F7678'>&nbsp;".$this->model_function->tanggal($r->tgl)."</time>
					<hr style='margin-top:0px'>$r->komentar</td></tr>";
				}
				?>
				</table>
				<br>
				<hr>
				<h4>  Tinggalkan Komentar</h4>
				<br>
				<form method="post" action="<?php echo base_url('berita/komentar_user/'.$idp);?>">
					<textarea name="komen" class="form-control" placeholder='Komentar . . . . ' required></textarea>
					<br>
					<input type="submit" name="komentar" value="Komentar" class="btn btn-success"/>
				</form>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php

}
?>