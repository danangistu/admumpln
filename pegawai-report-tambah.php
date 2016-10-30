<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li><a href="javascript:;">Report Pegawai</a></li>
		<li class="active">Input Kondisi</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Input Kondisi</h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-2 -->
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
					<h4 class="panel-title">Report Kondisi</h4>
				</div>
				<div class="panel-body">
				<form action="/admumpln/data/pegawai-report-proses.php" method="POST">
					<div class="note note-info">
						<h4>Form Input Kondisi</h4>
						<p>Kosongkan form untuk melewati input kondisi.</p>
					</div>
					<?php
					if(isset($post_judul_report)){
						echo "<h4>$post_judul_report</h4>";
						echo "<input type='text' name='judul_report' value='$post_judul_report' hidden />";
					}
					if(!empty($post_check)){
						foreach($post_check as $selected){
							if($selected=="nip"){
								echo'
									<div class="col-md-6">
										<div class="form-group block1 col-md-12">
											<label>NIP</label>
											<input type="text" name="nip" placeholder="Masukkan NIP" class="form-control" />
										</div>
									</div>
								';
							}
							if($selected=="nama"){
								echo'
									<div class="col-md-6">
										<div class="form-group block1 col-md-12">
											<label>Nama</label>
											<input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" />
										</div>
									</div>
								';
							}
							if($selected=="jabatan"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Jabatan</label>
										 <select name="jabatan[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY jabatan");
												foreach($rows as $row){
													$jabatan=$row['jabatan'];
													echo "<option value='$jabatan'>$jabatan</option>";
												}
											?>
										</select>
										<input type="text" name="jabatan2" value="jabatan" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="org_unit"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Organizational Unit</label>
										 <select name="org_unit[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('orgunit');
												foreach($rows as $row){
													$id_org=$row['id_org_unit'];
													$org_unit=$row['org_unit'];
													echo "<option value='$id_org'>$org_unit</option>";
												}
											?>
										</select>
										<input type="text" name="org_unit2" value="org_unit" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="cost_ctr"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Cost Center</label>
										 <select name="cost_ctr[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('costctr');
												foreach($rows as $row){
													$id_cost_ctr=$row['id_cost_ctr'];
													$cost=$row['cost_ctr'];
													echo "<option value='$id_cost_ctr'>$cost</option>";
												}
											?>
										</select>
										<input type="text" name="cost_ctr2" value="cost_ctr" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="email"){
								echo'<input type="text" name="email" value="email" hidden />';
							}
							if($selected=="pend_terakhir"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Pendidikan Terakhir</label>
										 <select name="pend_terakhir[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY pend_terakhir");
												foreach($rows as $row){
													$pend_terakhir=$row['pend_terakhir'];
													echo "<option value='$pend_terakhir'>$pend_terakhir</option>";
												}
											?>
										</select>
										<input type="text" name="pend_terakhir2" value="pend_terakhir" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="title"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Title</label>
										 <select name="title[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY title");
												foreach($rows as $row){
													$title=$row['title'];
													echo "<option value='$title'>$title</option>";
												}
											?>
										</select>
										<input type="text" name="title2" value="title" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="second_title"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Second Title</label>
										 <select name="second_title[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY second_title");
												foreach($rows as $row){
													$second_title=$row['second_title'];
													echo "<option value='$second_title'>$second_title</option>";
												}
											?>
										</select>
										<input type="text" name="second_title2" value="second_title" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="lv"){
								echo'<input type="text" name="lv" value="lv" hidden />';
							}
							if($selected=="skala_gaji_dasar"){
								echo'<input type="text" name="skala_gaji_dasar" value="skala_gaji_dasar" hidden />';
							}
							if($selected=="gaji_dasar"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label class="control-label">Gaji Dasar</label>
										<input type="text" id="slider_gaji_dasar" name="gaji_dasar" value="" />
									</div>
								</div>
							<?php
							}
							if($selected=="employee_group"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Employee Group</label>
										 <select name="employee_group[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY employee_group");
												foreach($rows as $row){
													$employee_group=$row['employee_group'];
													echo "<option value='$employee_group'>$employee_group</option>";
												}
											?>
										</select>
										<input type="text" name="employee_group2" value="employee_group" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="birthplace"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Tempat Lahir</label>
										 <select name="birthplace[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY birthplace");
												foreach($rows as $row){
													$birthplace=$row['birthplace'];
													echo "<option value='$birthplace'>$birthplace</option>";
												}
											?>
										</select>
										<input type="text" name="birthplace2" value="birthplace" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="birthdate"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Lahir</label>
										<div class="input-group" id="birthdate">
										    <input type="text" name="birthdate" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="alamat"){
								echo'<input type="text" name="alamat" value="alamat" hidden />';
							}
							if($selected=="kota"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Kota</label>
										 <select name="kota[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY kota");
												foreach($rows as $row){
													$kota=$row['kota'];
													echo "<option value='$kota'>$kota</option>";
												}
											?>
										</select>
										<input type="text" name="kota2" value="kota" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="kode_pos"){
								echo'<input type="text" name="kode_pos" value="kode_pos" hidden />';
							}
							if($selected=="religious"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Agama</label>
										 <select name="religious[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY religious");
												foreach($rows as $row){
													$religious=$row['religious'];
													echo "<option value='$religious'>$religious</option>";
												}
											?>
										</select>
										<input type="text" name="religious2" value="religious" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="gender_key"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Jenis Kelamin</label>
										 <select name="gender_key" class="default-select2 form-control">
											<option value="">- Pilihan -</option>
											<option value="Male">Laki-laki</option>
											<option value="Fenale">Perempuan</option>
										</select>
									</div>
								</div>
							<?php
							}
							if($selected=="gol_darah"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Golongan Darah</label>
										 <select name="gol_darah" class="default-select2 form-control">
											<option value="">- Pilihan -</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="B">O</option>
											<option value="B">AB</option>
										</select>
									</div>
								</div>
							<?php
							}
							if($selected=="bank"){
							?>
								<div class="col-md-6">
									<div class="form-group col-md-12">
										<label>Bank</label>
										 <select name="bank[]" class="multiple-select2 form-control" multiple="multiple">
											<option value="">- Pilihan -</option>
											<?php
												$rows= R::find('pegawai', "GROUP BY bank");
												foreach($rows as $row){
													$bank=$row['bank'];
													echo "<option value='$bank'>$bank</option>";
												}
											?>
										</select>
										<input type="text" name="bank2" value="bank" hidden />
									</div>
								</div>
							<?php
							}
							if($selected=="no_rekening"){
								echo'<input type="text" name="no_rekening" value="no_rekening" hidden />';
							}
							if($selected=="nama_peg"){
								echo'<input type="text" name="nama_peg" value="nama_peg" hidden />';
							}
							if($selected=="no_sk"){
								echo'<input type="text" name="no_sk" value="no_sk" hidden />';
							}
							if($selected=="tgl_sk"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal SK</label>
										<div class="input-group" id="tgl_sk">
										    <input type="text" name="tgl_sk" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="tgl_grade"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Grade</label>
										<div class="input-group" id="tgl_grade">
										    <input type="text" name="tgl_grade" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="tarif_grade"){
								echo'<input type="text" name="tarif_grade" value="tarif_grade" hidden />';
							}
							if($selected=="tarif_grade_transisi"){
								echo'<input type="text" name="tarif_grade_transisi" value="tarif_grade_transisi" hidden />';
							}
							if($selected=="tunjangan_posisi"){
								echo'<input type="text" name="tunjangan_posisi" value="tunjangan_posisi" hidden />';
							}
							if($selected=="tgl_mulai"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Mulai</label>
										<div class="input-group" id="tgl_mulai">
										    <input type="text" name="tgl_mulai" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="tgl_masuk"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Masuk</label>
										<div class="input-group" id="tgl_masuk">
										    <input type="text" name="tgl_masuk" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="tgl_capeg"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Capeg</label>
										<div class="input-group" id="tgl_capeg">
										    <input type="text" name="tgl_capeg" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="tgl_pegawai"){
							?>
								<div class="col-md-12">
									<div class="form-group col-md-12">
										<label>Tanggal Pegawai</label>
										<div class="input-group" id="tgl_pegawai">
										    <input type="text" name="tgl_pegawai" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							<?php
							}
							if($selected=="umur"){
								?>
									<div class="col-md-6">
										<div class="form-group col-md-12">
											<label class="control-label">Umur</label>
											<input type="text" id="slider_umur" name="umur" value="" />
										</div>
									</div>
								<?php
							}
						}
					}
					?>
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<button class="btn btn-lg btn-block btn-info" name="submit" value="Simpan"><span class="fa fa-arrow-right"></span> Lanjut</button>
						</div>
					</div>
				</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
