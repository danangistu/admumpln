<?php
if($sub==""){
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li class="active">Data Pegawai Pensiun Tahun Ini</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Data Pegawai Pensiun Tahun Ini</h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Tabel Data Pegawai Pensiun & Akan Pensiun</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<a href="#modal-report" data-toggle="modal" class="btn btn-inverse pull-right"><span class="fa fa-clipboard"></span> Buat Laporan</a><br><br><br>
						<table id="pegawai-pensiun" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="col-md-1">NIP</th>
									<th class="col-md-3">Nama</th>
									<th class="col-md-2">Jabatan</th>
									<th class="col-md-2">Org Unit</th>
									<th class="col-md-2">Tanggal Lahir</th>
									<th class="col-md-2">Tanggal Pensiun</th>
									<th class="col-md-1">Status</th>
									<th >Action</th>
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
<div class="modal fade" id="modal-report">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admumpln/pensiun/report" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Buat Laporan</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-12"><h5>Status</h5></label>
						<div class="col-md-12">
							<select id="status" name="status" class="combobox">
								<option value="semua">Tampilkan Semua</option>
								<option value="aktif">Aktif</option>
								<option value="pensiun">Sudah Pensiun</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-12"><h5>Pilih Kolom</h5></label>
						<div class="col-md-12">
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="nip" />
								NIP PEGAWAI
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="nama" />
								NAMA
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="jabatan" />
								JABATAN
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="org_unit" />
								ORGANIZATIONAL UNIT
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="tgl_lahir" />
								TANGGAL LAHIR
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="tgl_pensiun" />
								TANGGAL PENSIUN
							</label>
							<label class="col-md-12">
								<input type="checkbox" name="check[]" value="umur" />
								UMUR
							</label>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
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
}
else if($sub=="report") include "pensiun-report.php";
?>
