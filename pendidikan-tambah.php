<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pendidikan</a></li>
		<li><a href="/admumpln/pendidikan">Pendidikan Data</a></li>
		<li class="active">Pendidikan Tambah</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Pendidikan Tambah <small>Tambah data Pendidikan secara manual</small></h1>
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
					<h4 class="panel-title">Tambah Data Pendidikan</h4>
				</div>
				<div class="panel-body panel-form">
					<form class="form-horizontal form-bordered" action="/admumpln/data/pendidikan-proses.php" method="post" data-parsley-validate="true" name="demo-form">
						<?php
							$nip=$get_act;
						?>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >NIP * :</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" name="nip" value="<?php echo $nip; ?>" data-parsley-required="true" disabled />
								<input type="text" name="nip" value="<?php echo $nip; ?>" data-parsley-required="true" hidden />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4">Tingkat *</label>
							<div class="col-md-6 col-sm-6">
								<select name="tingkat" class="combobox" data-parsley-required="true" >
									<option value="">- Pilihan -</option>
									<?php
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='1'");
										if ($jumlah<1) echo "<option value='1'>Sekolah Dasar (SD)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='2'");
										if ($jumlah<1) echo "<option value='2'>Sekolah Menengah Pertama (SMP)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='3'");
										if ($jumlah<1) echo "<option value='3'>Sekolah Menengah Atas / Kejuruan</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='4'");
										if ($jumlah<1) echo "<option value='4'>Diploma (D1)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='5'");
										if ($jumlah<1) echo "<option value='5'>Diploma (D3)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='6'");
										if ($jumlah<1) echo "<option value='6'>Sarjana (S1)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='7'");
										if ($jumlah<1) echo "<option value='7'>Magister (S2)</option>";
										$jumlah= R::count('pendidikan',"nip='$nip' AND tingkat='8'");
										if ($jumlah<1) echo "<option value='8'>Doktor (S3)</option>";
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Tahun</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text="  name="tahun"value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Lembaga</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text"  name="lembaga" value=""/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Status</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text"  name="status" value=""/>
							</div>
						</div>	<div class="form-group">
								<label class="control-label col-md-4 col-sm-4" >Gelar</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="text"  name="gelar" value=""/>
								</div>
							</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4"></label>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-primary" name="submit" value="Tambah">Simpan</button>
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
