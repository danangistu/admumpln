<?php
	if ($act==""){
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home/">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li class="active">Data Report Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Report Pegawai <small>master data report pegawai</small></h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-2 -->
		<div class="col-md-2">
			<p class="m-b-20">
				<a href="#modal-tambah" data-toggle="modal" class="btn btn-inverse btn-block"><span class="fa fa-plus"></span> Tambah Data</a>
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
					<h4 class="panel-title">Tabel Data Report Pegawai</h4>
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
					}
				?>

				<div class="panel-body">
					<div class="table-responsive">
						<table id="pegawai-report" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>ID Report</th>
									<th>Judul Report</th>
									<th>Tanggal</th>
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
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="/admumpln/pegawai/report/tambah" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title">Input Report Baru</h3>
				</div>
				<div class="modal-body">
					<div class="panel panel-inverse">
						<div class="panel panel-body">
							<div class="col-md-12">
								<label>Judul Report</label>
								<input type="text" name="judul_report" placeholder="Masukkan Judul Laporan" class="form-control" /><br>
								<label>Pilih Kolom</label><br>
							</div>
							<div class="checkbox col-md-3" style="margin-top:-4px;">
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="nip" />
									NIP Pegawai
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="nama" />
									Nama
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="jabatan" />
									Jabatan
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="org_unit" />
									Organizational Unit
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="cost_ctr" />
									Cost Center
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="email" />
									Alamat Email
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="pend_terakhir" />
									Pendidikan Terakhir
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="title" />
									Title
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="second_title" />
									Second Title
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="lv" />
									Level
								</label>
							</div>
							<div class="checkbox col-md-3">
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="skala_gaji_dasar" />
									Skala Gaji Dasar
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="gaji_dasar" />
									Gaji Dasar
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="employee_group" />
									Employee Group
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="birthplace" />
									Tempat Lahir
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="birthdate" />
									Tanggal Lahir
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="alamat" />
									Alamat
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="kota" />
									Kota
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="kode_pos" />
									Kode Pos
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="religious" />
									Agama
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="gender_key" />
									Jenis Kelamin
								</label>
							</div>
							<div class="checkbox col-md-3">
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="gol_darah" />
									Golongan Darah
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="bank" />
									Bank
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="no_rekening" />
									Nomor Rekening
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="nama_peg" />
									Nama Pegawai
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="no_sk" />
									Nomor SK
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_sk" />
									Tanggal SK
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_grade" />
									Tanggal Grade
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tarif_grade" />
									Tarif Grade
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tarif_grade_transisi" />
									Tarif Grade Transisi
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tunjangan_posisi" />
									Tunjangan Posisi
								</label>
							</div>
							<div class="checkbox col-md-3">
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_mulai" />
									Tanggal Mulai
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_masuk" />
									Tanggal Masuk
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_capeg" />
									Tanggal Capeg
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="tgl_pegawai" />
									Tanggal Pegawai
								</label>
								<label class="col-md-12">
									<input type="checkbox" name="check[]" value="umur" />
									Umur
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="submit" value="Simpan" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
}
else if($act=="view") include "pegawai-report-view.php";
else if($act=="hapus") include "pegawai-report-hapus.php";
else if($act=="tambah") include "pegawai-report-tambah.php";

?>
