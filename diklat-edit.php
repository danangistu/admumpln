<?php
	$id=$get_id;
	$r= R::load('diklat',$id);
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Diklat</a></li>
		<li><a href="/admumpln/diklat;">Diklat Pegawai</a></li>
		<li class="active">Tambah Diklat Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Edit Diklat Pegawai <small>input data diklat pegawai</small></h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-12 -->
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
					<h4 class="panel-title">Tambah Diklat Pegawai</h4>
				</div>
				<div class="panel-body">
					<form action="/admumpln/data/diklat-proses.php" method="POST" data-parsley-validate="true" name="form-wizard">
					<?php
						$pegawai= R::findOne('pegawai','nip=?',[$r['nip']]);
						$admumAlert=@$_SESSION['admumAlert'];
						if($admumAlert==''){
					?>
						<div id="wizard">
							<ol>
								<li>
									Input
									<small>Input data diklat.</small>
								</li>
								<li>
									Konfirmasi Simpan
									<small>Input selesai, simpan atau batal?</small>
								</li>
							</ol>
							<!-- begin wizard step-1 -->
							<div class="wizard-step-1">
								<fieldset>
									<legend class="pull-left width-full">Diklat Pegawai</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-3">
											<div class="form-group block1 col-md-12">
												<label>NIP</label>
												<input type="text" id="nip" name="nip" value="<?php echo $r['nip'] ?>" class="form-control" data-parsley-group="wizard-step-1" disabled />
												<input name="id" value="<?php echo $r['id'] ?>" hidden />
												<input name="nip" value="<?php echo $r['nip'] ?>" hidden />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nama</label>
												<input type="text" value="<?php echo $pegawai['nama'] ?>" class="form-control" data-parsley-group="wizard-step-1" disabled />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>Kode Diklat</label>
												<select id="kode_diklat" name="kode_diklat" class="default-select2 form-control" data-parsley-group="wizard-step-1" required>
													<option value="">- Pilihan -</option>
													<?php
														$rows= R::find('diklatdata','ORDER BY kode_diklat');
														$array = "var judul = new Array();\n";
														foreach($rows as $row){
															$kode=$row['kode_diklat'];
															$judul=$row['judul_diklat'];
															echo "<option value='$kode'";
															if($kode==$r['kode_diklat']) echo "selected='selected'";
															echo ">$kode | $judul</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Mulai</label>
												<input type="date" name="tgl_mulai" class="form-control" value="<?php echo $r['tgl_mulai']; ?>" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group col-md-4">
												<label>Tanggal Selesai</label>
												<input type="date" name="tgl_selesai" class="form-control" value="<?php echo $r['tgl_selesai']; ?>"  data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Penyelenggara</label>
												<input type="text" name="penyelenggara" placeholder="Penyelenggara" value="<?php echo $r['penyelenggara']; ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group col-md-6">
												<label>Lokasi</label>
												<input type="text" name="lokasi" placeholder="Lokasi" value="<?php echo $r['lokasi']; ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-5">
												<label>Bidang Diklat</label>
												<input type="text" name="bidang_diklat" placeholder="Bidang Diklat" value="<?php echo $r['bidang_diklat']; ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group block1 col-md-2">
												<label>Nilai</label>
												<input type="number" name="nilai" placeholder="Input Nilai" class="form-control" value="<?php echo $r['nilai']; ?>" data-parsley-type="number" data-parsley-maxlength="3" data-parsley-max="100" data-parsley-group="wizard-step-1" />
											</div>
										</div>
									</div>
									<!-- end row -->
								</fieldset>
							</div>
							<div>
								<div class="jumbotron m-b-0 text-center">
									<h1>Input Selesai</h1>
									<p>Klik tombol simpan untuk melanjutkan menyimpan data.</p>
									<p><button class="btn btn-success btn-lg" type="submit" name="diklatreport" value="Edit">Simpan</button></p>
								</div>
							</div>
							<!-- end wizard step-4 -->
						</div>
					<?php
						}else {
						 if($admumAlert=='1'){
							$kode=$get_id;
					?>
					<div id="success">
						<div class="note note-success">
							<h1>SUKSES!</h1>
							<p>
								Data berhasil diubah, silakan pilih menu berikut untuk melanjutkan. ID : <?php echo $kode; ?>
							</p>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="/admumpln/diklat/report/<?php echo $kode ?>" class="btn btn-lg btn-block btn-warning"><span class="fa fa-eye"></span> Lihat Report Diklat Pegawai</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/diklat/report" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali</a>
							</div>
						</div>
					</div>
					<?php
						 }else{
					?>
					<div id="gagal">
						<div class="note note-danger">
							<h1>GAGAL!</h1>
							<p>
								Data gagal disimpan, silakan pilih menu berikut untuk melanjutkan. <br>
								<?php echo $_SESSION['admumMessage']; ?>
							</p>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="/admumpln/diklat/report/edit/<?php echo $kode ?>" class="btn btn-lg btn-block btn-info"><span class="fa fa-plus"></span> Edit Kembali</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/diklat/report" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali ke Diklat Pegawai</a>
							</div>
						</div>
					</div>
						<?php
						if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
						if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
						}
						}
						?>
					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-12 -->
	</div>
	<!-- end row -->
</div>
