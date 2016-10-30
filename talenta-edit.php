<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="/admumpln/talenta;">Talenta</a></li>
		<li class="active">Edit Talenta Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Edit Talenta Pegawai <small>input data talenta pegawai</small></h1>
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
					<h4 class="panel-title">Edit Talenta Pegawai</h4>
				</div>
				<div class="panel-body">
					<form action="/admumpln/data/talenta-proses.php" method="POST" data-parsley-validate="true" name="form-wizard">
					<?php
						$id=$get_act;
						$r= R::load('talenta',$id);
						$nip = $r['nip'];
						$nama= R::findOne('pegawai',"nip=?",[$nip]);
						$admumAlert=@$_SESSION['admumAlert'];
						if($admumAlert==''){
					?>
						<div id="wizard">
							<ol>
								<li>
									Edit
									<small>Edit data Talenta.</small>
								</li>
								<li>
									Konfirmasi Simpan
									<small>Input selesai, simpan atau batal?</small>
								</li>
							</ol>
							<!-- begin wizard step-1 -->
							<div class="wizard-step-1">
								<fieldset>
									<legend class="pull-left width-full">Data Talenta</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-3">
											<div class="form-group block1 col-md-12">
												<label>NIP</label>
												<input type="text" id="nip" name="nip" value="<?php echo $r['nip'] ?>" class="form-control" data-parsley-group="wizard-step-1" disabled />
												<input name="nip" value="<?php echo $r['nip'] ?>" hidden />
												<input name="id" value="<?php echo $r['id'] ?>" hidden />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nama</label>
												<input type="text" value="<?php echo $nama['nama'] ?>" class="form-control" data-parsley-group="wizard-step-1" disabled />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-3">
												<label>Tanggal Akhir</label>
												<input type="date" name="tgl_akhir" class="form-control"  value="<?php echo $r['tgl_akhir'] ?>" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>Talenta</label>
												<select name="talenta" class="default-select2 form-control" data-parsley-group="wizard-step-1" required>
													<option value="">- Pilihan -</option>
													<option value="LBS" <?php if ($r['talenta']=="LBS") echo "selected='selected'" ?>>LBS - Luar Biasa</option>
													<option value="SOP" <?php if ($r['talenta']=="SOP") echo "selected='selected'" ?>>SOP - Sangat Optimal</option>
													<option value="SPO" <?php if ($r['talenta']=="SPO") echo "selected='selected'" ?>>SPO - Sangat Potensial</option>
													<option value="OPT" <?php if ($r['talenta']=="OPT") echo "selected='selected'" ?>>OPT - Optimal</option>
													<option value="POT" <?php if ($r['talenta']=="POT") echo "selected='selected'" ?>>POT - Potensial</option>
													<option value="KPO" <?php if ($r['talenta']=="KPO") echo "selected='selected'" ?>>KPO - Kandidat Penyesuaian</option>
													<option value="PPS" <?php if ($r['talenta']=="PPS") echo "selected='selected'" ?>>PPS - Perlu Penyesuaian</option>
													<option value="PPE" <?php if ($r['talenta']=="PPE") echo "selected='selected'" ?>>PPE - Perlu Perhatian</option>
													<option value="SPP" <?php if ($r['talenta']=="SPP") echo "selected='selected'" ?>>SPP - Sangat Perlu Perhatian</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Mulai</label>
												<input type="date" name="tgl_mulai" class="form-control" value="<?php echo $r['tgl_mulai'] ?>" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group col-md-4">
												<label>Tanggal Akhir</label>
												<input type="date" name="tgl_akhir" class="form-control" value="<?php echo $r['tgl_akhir'] ?>" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nomor SK</label>
												<input type="text" name="no_sk" placeholder="Nomor SK" value="<?php echo $r['no_sk'] ?>" class="form-control" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-6">
												<label>Tanggal SK</label>
												<input type="date" name="tgl_sk" class="form-control" value="<?php echo $r['tgl_sk'] ?>" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>NSK</label>
												<input type="text" name="nsk" placeholder="NSK" value="<?php echo $r['nsk'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Sasaran K</label>
												<input type="text" name="sasaran_k" placeholder="Sasaran K"  value="<?php echo $r['sasaran_k'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>NKI</label>
												<input type="text" name="nki" placeholder="NKI" value="<?php echo $r['nki'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>ISK</label>
												<input type="text" name="isk" placeholder="ISK"  value="<?php echo $r['isk'] ?>" class="form-control" />
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
									<p><button class="btn btn-success btn-lg" type="submit" name="submit" value="Edit">Simpan</button></p>
								</div>
							</div>
							<!-- end wizard step-4 -->
						</div>
					<?php
						}else {
						 if($admumAlert=='1'){
							$kode=$r['nip'];
					?>
					<div id="success">
						<div class="note note-success">
							<h1>SUKSES!</h1>
							<p>
								Data berhasil disimpan, silakan pilih menu berikut untuk melanjutkan. NIP : <?php echo $kode; ?>
							</p>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="/admumpln/talenta/report/<?php echo $kode ?>" class="btn btn-lg btn-block btn-warning"><span class="fa fa-eye"></span> Lihat Report Talenta Pegawai</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/talenta" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali ke Talenta</a>
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
								<a href="/admumpln/talenta/Edit/<?php echo $kode ?>" class="btn btn-lg btn-block btn-info"><span class="fa fa-plus"></span> Input Data Kembali</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/talenta" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali ke Talenta</a>
							</div>
						</div>
					</div>
						<?php
						if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
						if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
						}
						}?>
					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-12 -->
	</div>
	<!-- end row -->
</div>
