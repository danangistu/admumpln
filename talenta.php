<?php if($sub==""){ ?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Talenta</a></li>
		<li class="active">Data Talenta Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Talenta Pegawai<small> data talenta dari pegawai</small></h1>
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
					<h4 class="panel-title">Tabel Data Talenta</h4>
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
					<a href="#modal-tambah" data-toggle="modal" class="btn btn-inverse btn-md"><span class="fa fa-plus"></span> Tambah Data Talenta</a> <hr />
					<div class="table-responsive">
						<table id="data-talenta" class="table table-striped table-responsive table-bordered row-border order-column" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th >NIP</th>
									<th >Nama</th>
									<th >Jabatan</th>
									<th >Org Unit</th>
									<th >Tanggal Akhir</th>
									<th >Talenta</th>
									<th >Description</th>
									<th >Start Date</th>
									<th >End Date</th>
									<th >Status</th>
									<th >No SK</th>
									<th >Tanggal SK</th>
									<th >NSK</th>
									<th >Sasaran K</th>
									<th >NKI</th>
									<th >ISK</th>
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
			<form action="/admumpln/data/talenta-upload.php" method="POST" enctype="multipart/form-data">
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
						<a href="/admumpln/assets/Talenta Pegawai.xls" class="btn btn-sm btn-primary"><span class="fa fa-arrow-down"></span> Download Contoh Excel</a>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="upload" value="Submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Cari Pegawai</h4>
			</div>
			<div class="modal-body">
				<table id="pendidikan-pegawai" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
							<?php
								$rows = R::find('pegawai');
								foreach ($rows as $row) {
									echo "<tr>";
									echo "<td>$row->nip</td>";
									echo "<td>$row->nama</td>";
									echo "<td>$row->jabatan</td>";
									echo "<td><a class='btn btn-sm btn-info btn-block' href='/admumpln/talenta/tambah/$row->id'><span class='fa fa-check'></span> Pilih</a></td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
					<br /><br />
			</div>
			<div class="modal-footer">
				Tabel Data Pegawai
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
}
else if($sub=="tambah") include "talenta-tambah.php";
else if($sub=="edit") include "talenta-edit.php";
else if($sub=="delete") include "talenta-hapus.php";
else if($sub=="grafik") include "talenta-grafik.php";
?>
