<?php
foreach ($result as $row) {
	$konten = $row->konten;
	$judul = $row->judul;
}
?>
<br><br><br>
<div class="container">
	<div class="row">
	<legend><?php echo $judul;?></legend>
		<?php echo $konten;?>
	</div>
</div>
<br><br><br>