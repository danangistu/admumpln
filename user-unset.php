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
	<form action="/admumpln/data/user-proses.php" method="POST">
		<div class="note note-danger">
		<?php
			$id = $get_act;
			$row = R::getRow("SELECT u.id, u.nip, p.nama FROM user u, pegawai p WHERE u.nip = p.nip AND u.id=$id");
		?>
		<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden />
			<h1>Anda akan melakukan unset data berikut dari Admin :</h1>
			<h4><?php echo $row['nip']." - ".strtoupper($row['nama']); ?></h4>
		</div>
		<div class="col-md-12">
			<div class="col-md-6">
				<a href="/admumpln/pkl" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Batal</a>
			</div>
			<div class="col-md-6">
					<button class="btn btn-lg btn-block btn-primary" name="submit" value="unset"><span class="fa fa-minus-square"></span> Unset Data As Admin</button>
			</div>
		</div>
	</form>
	</div>
</div>
