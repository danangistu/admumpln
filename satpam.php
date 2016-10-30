<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Keamanan</a></li>
		<li class="active">Personil Satpam</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Data Personil Satpam <small>master data satpam</small></h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-2 -->
		<div class="col-md-2">
			<h5>
				Menu Data Personil Satpam
			</h5>
			<p class="m-b-20">
				<a href="/admumpln/satpam/tambah" class="btn btn-inverse btn-block"><span class="fa fa-plus"></span> Tambah Data</a>
				<a href="#modal-import" data-toggle="modal" class="btn btn-inverse btn-block"><span class="fa fa-arrow-up"></span> Import dari Excel</a>
				<a href="/admumpln/satpam/laporan" data-toggle="modal" class="btn btn-inverse btn-block"><span class="fa fa-file-text"></span> Buat Laporan</a>
			</p>
		</div>
		<!-- end col-2 -->
		<!-- begin col-10 -->
		<div class="col-md-10">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Tabel Data Personil Satpam</h4>
				</div>
				<?php
					$admumAlert =@$_SESSION['admumAlert'];
					$admumMessage =@$_SESSION['admumAlert'];
					if($admumAlert=='1'){
						echo '
						<div class="alert alert-success fade in">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
							</button>
							Success<br /> Perubahan data berhasil disimpan.
						</div>
						';
					}else if($admumAlert=='0') {
						echo '
						<div class="alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
							</button>
							Gagal<br /> Perubahan data gagal disimpan.
						</div>
						';
					}else if($admumAlert=='2') {
						echo '
						<div class="alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
							</button>
							Gagal<br /> Data gagal disimpan, periksa kembali file excel anda, pastikan berformat .xls (Excel 2003)
						</div>
						';
					}
				?>

				<div class="panel-body">
					<div class="table-responsive">
						<table id="data-satpam" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tempat Lahir</th>
									<th>Tanggal Lahir</th>
									<th>Alamat</th>
									<th>Pendidikan Terakhir</th>
									<th>Jenis Kelamin</th>
									<th>Agama</th>
									<th>Garda Pertama</th>
									<th>Garda Madya</th>
									<th>Garda Utama</th>
									<th>Ketenaga Listrikan</th>
									<th>Tanggal Berlaku</th>
									<th>Tanggal Kadaluarsa</th>
									<th>No Reg</th>
									<th>Lokasi Kerja</th>
									<th>Keterangan</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
						<tbody>

						</tbody>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
<!-- Upload Excel -->
<div class="modal fade" id="modal-import">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="satpam-upload-excel.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Upload File Excel</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Pilih File</label>
						<div class="col-md-9">
							<input type="file" name="file" id="file" class="form-control"/>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="form-group">
						<a href="assets/Personil Satpam.xls" class="btn btn-sm btn-primary"><span class="fa fa-arrow-down"></span> Download Contoh Excel</a>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="submit" value="Submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
?>
