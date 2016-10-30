<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li><a href="/admumpln/pegawai">Data Pegawai</a></li>
		<li class="active">Edit Data Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Edit Data Pegawai <small>input data pegawai secara manual</small></h1>
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
					<h4 class="panel-title">Edit Data Pegawai</h4>
				</div>
				<div class="panel-body">
					<form action="/admumpln/data/pegawai-proses.php" method="POST" data-parsley-validate="true" name="form-wizard">
					<?php
						$id=$get_act;
						$admumAlert=@$_SESSION['admumAlert'];
						$r1= R::load('pegawai',$id);
						if($admumAlert==''){
					?>
						<div id="wizard">
							<ol>
								<li>
									Informasi Pegawai
									<small>Input basic informasi pegawai.</small>
								</li>
								<li>
									Personal Info
									<small>Input informasi seputar personal pegawai.</small>
								</li>
								<li>
									Bank Account
									<small>Input informasi tabungan pegawai.</small>
								</li>
								<li>
									Informasi Tambahan
									<small>Input Informasi tambahan.</small>
								</li>
								<li>
									Konfirmasi Simpan
								</li>
							</ol>
							<!-- begin wizard step-1 -->
							<div class="wizard-step-1">
								<fieldset>
									<legend class="pull-left width-full">Informasi Pegawai</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group block1 col-md-3">
												<label>NIP</label>
												<input type="text" id="nip" name="nip" placeholder="Input NIP" value="<?php echo $r1['nip'] ?>" class="form-control" data-parsley-group="wizard-step-1" required />
												<input type="text" id="id" name="id" value="<?php echo $id; ?>" hidden />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>Nama</label>
												<input type="text" id="nama" name="nama" placeholder="Input Nama Lengap" value="<?php echo $r1['nama'] ?>" class="form-control" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>Jabatan</label>
												<input type="text" id="jabatan" name="jabatan" placeholder="Input Jabatan"value="<?php echo $r1['jabatan'] ?>" class="form-control" data-parsley-group="wizard-step-1" required />
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group col-md-11">
												<label>Organizational Unit</label>
												 <select id="org_unit" name="org_unit" class="default-select2 form-control" data-parsley-group="wizard-step-1" required>
													<option value="">- Pilihan -</option>
													<?php
														$rows= R::find('orgunit');
														$id_org2=$r1['id_org_unit'];
														foreach($rows as $row){
															$id_org=$row['id_org_unit'];
															$org_unit=$row['org_unit'];
															echo "<option value='$id_org'";
															if($id_org==$id_org2) echo "selected='selected'";
															echo ">$org_unit</option>";
														}
													?>
												</select>
											</div>
											<div class="form-group col-md-1">
												<a href='#' class='btn btn-icon btn-circle btn-inverse pull-left' style="margin-top:25px;margin-left:-25px;"><span class='fa fa-plus'></span></a>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group col-md-11">
												<label>Cost Center</label>
												 <select id="cost_ctr" name="cost_ctr" class="default-select2 form-control" data-parsley-group="wizard-step-1" required>
													<option value="">- Pilihan -</option>
													<?php
														$rows= R::find('costctr');
														$id_cost2=$r1['id_cost_ctr'];
														foreach($rows as $row){
															$id_cost_ctr=$row['id_cost_ctr'];
															$cost=$row['cost_ctr'];
															echo "<option value='$id_cost_ctr'";
															if($id_cost_ctr==$id_cost2) echo "selected='selected'";
															echo ">$cost</option>";
														}
													?>
												</select>
											</div>
											<div class="form-group col-md-1">
												<a href='#' class='btn btn-icon btn-circle btn-inverse pull-left' style="margin-top:25px;margin-left:-25px;"><span class='fa fa-plus'></span></a>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-5">
												<label>Alamat Email</label>
												<input type="text" id="email" name="email" placeholder="Alamat Email" value="<?php echo $r1['email'] ?>" class="form-control"  />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Pendidikan Terakhir</label>
												<input type="text" id="pend_terakhir" name="pend_terakhir" placeholder="Input Pendidikan" value="<?php echo $r1['pend_terakhir'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Title</label>
												<input type="text" id="title" name="title" placeholder="Title" value="<?php echo $r1['title'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Second Title</label>
												<input type="text" id="second_title" name="second_title" placeholder="Second Title" value="<?php echo $r1['second_title'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-2">
												<label>Level</label>
												<input type="text" id="lv" name="lv" placeholder="Level" value="<?php echo $r1['lv'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Skala Gaji Dasar</label>
												<input type="text" id="skala_gaji_dasar" name="skala_gaji_dasar" value="<?php echo $r1['skala_gaji_dasar'] ?>" placeholder="Skala Gaji Dasar" class="form-control"  />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Gaji Dasar</label>
												<input type="number" id="gaji_dasar" name="gaji_dasar" placeholder="Gaji Dasar" value="<?php echo $r1['gaji_dasar'] ?>" class="form-control"  />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Employee Group</label>
												<input type="text" id="employee_group" name="employee_group" placeholder="Employee Group" value="<?php echo $r1['employee_group'] ?>" class="form-control" />
											</div>
										</div>
									</div>
									<!-- end row -->
								</fieldset>
							</div>
							<!-- end wizard step-1 -->
							<!-- begin wizard step-2 -->
							<div class="wizard-step-2">
								<fieldset>
									<legend class="pull-left width-full">Personal Info</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tempat Lahir</label>
												<input type="text" id="birthplace" name="birthplace" placeholder="Tempat Lahir" value="<?php echo $r1['birthplace'] ?>" class="form-control" />
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group col-md-4">
												<label>Tanggal Lahir</label>
												<input type="date" name="birthdate" value="<?php echo $r1['birthdate'] ?>" class="form-control"  />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Alamat</label>
												<input type="text" id="alamat" name="alamat" value="<?php echo $r1['alamat'] ?>" placeholder="Alamat" class="form-control" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Kota</label>
												<input type="text" id="kota" name="kota" placeholder="Kota" value="<?php echo $r1['kota'] ?>" class="form-control"  />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Kode Pos</label>
												<input type="number" id="kode_pos" name="kode_pos" placeholder="Kode Pos" value="<?php echo $r1['kode_pos'] ?>" class="form-control"  />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-3">
												<label>Agama</label>
												<select id="religious" name="religious" class="combobox">
													<option value="">- Pilihan -</option>
													<option value="Islam"<?php if($r1['religious']=='Islam')echo " selected='selected'";?>>Islam</option>
													<option value="Protestan"<?php if($r1['religious']=='Protestan')echo " selected='selected'";?>>Kristen</option>
													<option value="Katholik"<?php if($r1['religious']=='Katholik')echo " selected='selected'";?>>Katolik</option>
													<option value="Hindu"<?php if($r1['religious']=='Hindu')echo " selected='selected'";?>>Hindu</option>
													<option value="Budha"<?php if($r1['religious']=='Budha')echo " selected='selected'";?>>Budha</option>
													<option value="Khonghucu"<?php if($r1['religious']=='Khonghucu')echo " selected='selected'";?>>Khonghucu</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Jenis Kelamin</label>
												<select id="gender_key" name="gender_key" class="combobox">
													<option value="">- Pilihan -</option>
													<option value="Male"<?php if($r1['gender_key']=='Male')echo " selected='selected'";?>>Laki-laki</option>
													<option value="Female"<?php if($r1['gender_key']=='Female')echo " selected='selected'";?>>Perempuan</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Golongan Darah</label>
												<select id="gol_darah" name="gol_darah" class="combobox">
													<option value="">- Pilihan -</option>
													<option value="A"<?php if($r1['gol_darah']=='A')echo " selected='selected'";?>>A</option>
													<option value="B"<?php if($r1['gol_darah']=='B')echo " selected='selected'";?>>B</option>
													<option value="O"<?php if($r1['gol_darah']=='O')echo " selected='selected'";?>>O</option>
													<option value="AB"<?php if($r1['gol_darah']=='AB')echo " selected='selected'";?>>AB</option>
												</select>
											</div>
										</div>
									</div>
									<!-- end row -->
								</fieldset>
							</div>
							<!-- end wizard step-2 -->
							<!-- begin wizard step-3 -->
							<div class="wizard-step-3">
								<fieldset>
									<legend class="pull-left width-full">Bank Account</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group col-md-3">
												<label>Pilih Bank</label>
												<select id="bank" name="bank" class="combobox" data-parsley-group="wizard-step-3" required>
													<option value="">- Pilihan -</option>
													<option value="Bank Mandiri"<?php if(ucwords($r1['bank'])=='Bank Mandiri')echo " selected='selected'";?>>Bank Mandiri</option>
													<option value="Bank Rakyat Indonesia"<?php if(ucwords($r1['bank'])=='Bank Rakyat Indonesia')echo " selected='selected'";?>>Bank Rakyat Indonesia (BRI)</option>
													<option value="Bank Negara Indonesia"<?php if(ucwords($r1['bank'])=='Bank Negara Indonesia')echo " selected='selected'";?>>Bank Negara Indonesia (BNI)</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nomor Rekening</label>
												<input type="number" id="no_rekening" name="no_rekening" placeholder="Input Nomor Rekening" value="<?php echo $r1['no_rekening'] ?>" class="form-control" data-parsley-group="wizard-step-3" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nama Pegawai</label>
												<input type="text" id="nama_peg" name="nama_peg" placeholder="Input Nama Pegawai" value="<?php echo $r1['nama_peg'] ?>" class="form-control" data-parsley-group="wizard-step-3" required />
											</div>
										</div>
										<!-- end col-6 -->
									</div>
									<!-- end row -->
								</fieldset>
							</div>
							<!-- end wizard step-3 -->
							<!-- begin wizard step-3 -->
							<div class="wizard-step-4">
								<fieldset>
									<legend class="pull-left width-full">Informasi Tambahan</legend>
									<!-- begin row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group col-md-12">
												<label>Nomor SK</label>
												<input type="text" id="no_sk" name="no_sk" placeholder="Nomor SK" value="<?php echo $r1['no_sk'] ?>" class="form-control" data-parsley-group="wizard-step-4" required />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-8">
												<label>Tanggal SK</label>
												<input type="date"  name="tgl_sk" class="form-control" value="<?php echo $r1['tgl_sk'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Tanggal Grade</label>
												<input type="date"  name="tgl_grade"  class="form-control" value="<?php echo $r1['tgl_grade'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Tarif Grade</label>
												<input type="text" id="tarif_grade" name="tarif_grade" placeholder="Tarif Grade" value="<?php echo $r1['tarif_grade'] ?>" class="form-control" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group col-md-12">
												<label>Tarif Grade Transisi</label>
												<input type="text" id="tarif_grade_transisi" name="tarif_grade_transisi" value="<?php echo $r1['tarif_grade_transisi'] ?>" placeholder="Tarif Grade Transisi" class="form-control" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-4">
												<label>Tunjangan Posisi</label>
												<input type="text" id="tunjangan_posisi" name="tunjangan_posisi" placeholder="Tunjangan Posisi" value="<?php echo $r1['tunjangan_posisi'] ?>" class="form-control" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Mulai</label>
												<input type="date" name="tgl_mulai" class="form-control" value="<?php echo $r1['tgl_mulai'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Masuk</label>
												<input type="date" name="tgl_masuk" class="form-control" value="<?php echo $r1['tgl_masuk'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Capeg</label>
												<input type="date" name="tgl_capeg" class="form-control" value="<?php echo $r1['tgl_capeg'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group col-md-12">
												<label>Tanggal Pegawai</label>
												<input type="date" name="tgl_peg" class="form-control" value="<?php echo $r1['tgl_peg'] ?>" data-parsley-group="wizard-step-4" />
											</div>
										</div>
										<!-- end col-6 -->
									</div>
									<!-- end row -->
								</fieldset>
							</div>
							<!-- end wizard step-3 -->
							<!-- begin wizard step-4 -->
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
						}else if($admumAlert=='1'){
					?>
					<div id="success">
						<div class="note note-success">
							<h1>SUKSES!</h1>
							<p>
								Perubahan data berhasil disimpan, silakan pilih menu berikut untuk melanjutkan. ID : <?php echo $id; ?>
							</p>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="/admumpln/pegawai/edit/<?php echo $id?>" class="btn btn-lg btn-block btn-info"><span class="fa fa-plus"></span> Edit Kembali</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/pegawai/detail/<?php echo $id?>" class="btn btn-lg btn-block btn-warning"><span class="fa fa-eye"></span> Lihat Detail Pegawai</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/pegawai" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali ke Data Pegawai</a>
							</div>
						</div>
					</div>
					<?php
						if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
						if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
						 }else if($admumAlert=='0'){
					?>
					<div id="gagal">
						<div class="note note-danger">
							<h1>GAGAL!</h1>
							<p>
								Perubahan data gagal disimpan, silakan pilih menu berikut untuk melanjutkan.
							</p>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<a href="/admumpln/pegawai/edit/<?php echo $id?>" class="btn btn-lg btn-block btn-info"><span class="fa fa-plus"></span> Edit Data Kembali</a>
							</div>
							<div class="col-md-4">
								<a href="/admumpln/pegawai" class="btn btn-lg btn-block btn-inverse"><span class="fa fa-arrow-left"></span> Kembali ke Data Pegawai</a>
							</div>
						</div>
					</div>
						<?php
						if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
						if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
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
