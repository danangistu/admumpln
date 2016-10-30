<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="/admumpln/User">User</a></li>
		<li class="active">User </li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">User Set Admin</h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-6 -->
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="form-validation-1">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Set Admin User</h4>
				</div>
				<?php
					$id = $get_act;
					$row = R::getRow("SELECT u.id, u.nip, p.nama FROM user u, pegawai p WHERE u.nip = p.nip AND u.id=$id");
				?>
				<div class="panel-body panel-form">
					<form action="/admumpln/data/user-proses.php" method="POST">
						<div class="modal-body">
							<div>
								<div class="note note-info">
									<h1>Anda akan menjadikan Admin dari user : </h1>
									<h4>	<?php echo $row['nip']." - ".strtoupper($row['nama']); ?></h4>
									<h4>Selanjutnya pilih role Admin </h4>
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden />
								</div>
							</div>
							<div class="col-md-12">
								<h4>Pilih Role Admin</h4>
							</div>
							<div class="checkbox col-md-3">
								<div class="checkbox col-md-3 pull-right" style="margin-top:-4px;">
									<h4>
										<input type="checkbox" name="check[]" value="a"  checked="checked"/>
										Dashboard
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="b" />
										Pegawai
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="c" />
										Diklat
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="d" />
										Talenta
									</h4>
								</div>
							</div>
							<div class="checkbox col-md-3">
								<div class="checkbox col-md-3 pull-right">
									<h4>
										<input type="checkbox" name="check[]" value="e" />
										Keluarga
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="f" />
										Pendidikan
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="g" />
										PKL
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="h" />
										Keamanan
									</h4>
								</div>
							</div>
							<div class="checkbox col-md-3">
								<div class="checkbox col-md-3 pull-right">
									<h4>
										<input type="checkbox" name="check[]" value="i" />
										Management Users
									</h4>
									<h4>
										<input type="checkbox" name="check[]" value="j" />
										Admum CSR
									</h4>
								</div>
							</div>
							<div class="fom-group">
								<div class="col-md-12" style="margin-top:-10px;">
									<div class="col-md-2 pull-right">
										<button type="submit" name="submit" value="set" class="btn btn-lg btn-success pull-right"><span class="fa fa-save"></span> Simpan</button>
									</div>
									<div class="col-md-2 pull-right">
										<a href="/admumpln/user" class="btn btn-lg btn-inverse pull-right" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</a>
									</div>
									<div class="col-md-12 pull-right"> &nbsp <div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-6 -->
	</div>
	<!-- end row -->
</div>
