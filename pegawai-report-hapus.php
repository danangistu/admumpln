<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb hidden-print pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li><a href="/admumpln/pegawai/report">Pegawai Report</a></li>
		<li class="active">Hapus Pegawai Report</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header hidden-print">Hapus Pegawai Report</h1>
	<!-- end page-header -->

	<div class="invoice col-lg-12">
		<div class="note note-danger">
		<?php
			$row= R::load('rpegawai',$id);
		?>
			<h1>Peringatan! Anda akan menghapus data :</h1>
			<p><?php echo $row['id']." - ".strtoupper($row['judul']); ?></p>
			<p>
				Data yang telah dihapus, tidak dapat dikembalikan lagi. Untuk melanjutkan pilih hapus.
			</p>
		</div>
		<div class="col-md-12">
			<form method="POST" action="/admumpln/data/pegawai-report-proses.php">
				<div class="col-md-6">
					<a href="/admumpln/pegawai/report" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Batal</a>
				</div>
				<div class="col-md-6">
					<button name="delete" value="<?php echo $row['id'] ?>" class="btn btn-lg btn-block btn-primary"><span class="fa fa-trash"></span> Hapus Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
