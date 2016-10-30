<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb hidden-print pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="/admumpln/pkl">PKL</a></li>
		<li class="active">Hapus PKL Data</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header hidden-print">Hapus PKL Data</h1>
	<!-- end page-header -->

	<div class="invoice col-lg-12">
		<div class="note note-danger">
		<?php
			$id = $get_act;
			$row= R::load('pkl',$id);
		?>
			<h1>Peringatan! Anda akan menghapus data :</h1>
			<p><?php echo $row['nama']." - ".strtoupper($row['status']); ?></p>
			<p>
				Data yang telah dihapus, tidak dapat dikembalikan lagi. Untuk melanjutkan pilih hapus.
			</p>
		</div>
		<div class="col-md-12">
			<div class="col-md-6">
				<a href="/admumpln/pkl" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Batal</a>
			</div>
			<div class="col-md-6">
				<form action="/admumpln/data/pkl-proses.php" method="POST">
					<button class="btn btn-lg btn-block btn-primary" name="submit" value="<?php echo $row['id'] ?>"><span class="fa fa-trash"></span> Hapus Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
