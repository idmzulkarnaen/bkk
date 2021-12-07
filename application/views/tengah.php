<div class="container">
<div class="row">
	<div class="col-md-6">
	<br><br><br><br>
	<h2><i class="fa fa-meh-o"></i> Data Lowongan Kerja</h2>
	<br>
		<table class="table table-bordered">
			<tr>
			<th>NO</th><th>Nama Loker</th><th>Wilayah</th><th>Aksi</th>
			</tr>

			<?php
			$no =0;
			foreach ($rloker as $row) {
				$no++;
				echo"
			<tr>
			<td>$no</td><td>$row->nama_loker</td><td>$row->wilayah</td><td><a href='".base_url('contoh/daftar/'.$row->id_loker)."' class='btn'>Daftar</a></td>
			</tr>";
			}
			?>

		</table>

		<br><br><br><br>
	</div>

	
</div>
</div>