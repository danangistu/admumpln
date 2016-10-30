<?php if ($sub=="") { ?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li class="active">PKL</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Report Data PKL <small>laporan dari data PKL</small></h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-10 -->
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
					<h4 class="panel-title">Tabel Data PKL</h4>
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
					<a href="#modal-import" data-toggle="modal" class="btn btn-inverse btn-md"><span class="fa fa-upload"></span> Import Data From Excel</a>
					<a href="#modal-tambah" data-toggle="modal" class="btn btn-inverse btn-md"><span class="fa fa-plus"></span> Tambah Data Baru</a>
					<a href="/admumpln/pkl/chart" data-toggle="modal" class="btn btn-inverse btn-md"><span class="fa fa-area-chart"></span> Grafik PKL</a> <hr />
					<div class="table-responsive">
						<table id="pkl-data" class="table table-striped table-responsive table-bordered row-border order-column" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th >Nama</th>
									<th >Status</th>
									<th >Sekolah</th>
									<th >Pendidikan</th>
									<th >Fakultas</th>
									<th >Jurusan</th>
									<th >Tanggal Mulai</th>
									<th >Tanggal Selesai</th>
									<th >Lokasi</th>
									<th >Mentor</th>
									<th >Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
<div class="modal fade" id="modal-import">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admumpln/data/pkl-proses.php" method="POST" enctype="multipart/form-data">
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
						<a href="/admumpln/assets/data pkl.xls" class="btn btn-sm btn-primary"><span class="fa fa-arrow-down"></span> Download Contoh Excel</a>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="pklupload" value="Submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="/admumpln/data/pkl-proses.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Tambah Data PKL</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-8">
						<div class="form-group">
							<label class="col-md-12 control-label">Nama</label>
							<div class="col-md-12">
								<input type="text" name="nama" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Status</label>
							<div class="col-md-12">
								<select name="status" class="combobox" data-parsley-group="wizard-step-3" required>
									<option value="">- Pilihan -</option>
									<option value="OJT">OJT</option>
									<option value="PKL">PKL</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-md-12 control-label">Sekolah</label>
							<div class="col-md-6">
								<input type="text" name="sekolah" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Pendidikan</label>
							<div class="col-md-12">
								<select name="pendidikan" class="combobox" data-parsley-group="wizard-step-3" required>
									<option value="">- Pilihan -</option>
									<option value="SMA">SMA</option>
									<option value="D3">D3</option>
									<option value="S1">S1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Fakultas</label>
							<div class="col-md-12">
								<input type="text" name="fakultas" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Jurusan</label>
							<div class="col-md-12">
								<input type="text" name="jurusan" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Tanggal Mulai</label>
							<div class="col-md-12">
								<input type="date" name="tgl_mulai" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="col-md-12 control-label">Tanggal Selesai</label>
							<div class="col-md-6">
								<input type="date" name="tgl_selesai" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="col-md-12 control-label">Lokasi</label>
							<div class="col-md-12">
								<input type="text" name="lokasi" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="col-md-12 control-label">Mentor</label>
							<div class="col-md-12">
								<input type="text" name="mentor" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">&nbsp </div>

				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="submit" value="Tambah" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
}
else if($sub=="edit") include "pkl-edit.php";
else if($sub=="delete") include "pkl-hapus.php";
else if($sub=="chart") include "pkl-chart.php";
?>
