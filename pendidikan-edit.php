<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pendidikan</a></li>
		<li><a href="/admumpln/pendidikan">Pendidikan Data</a></li>
		<li class="active">Pendidikan Edit</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Pendidikan Edit <small>Edit data Pendidikan secara manual</small></h1>
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
					<h4 class="panel-title">Edit Data Pendidikan</h4>
				</div>
				<div class="panel-body panel-form">
					<form class="form-horizontal form-bordered" action="/admumpln/data/pendidikan-proses.php" method="post" data-parsley-validate="true" name="demo-form">
						<?php
							$id=$get_act;
							$r1= R::load('pendidikan',$id);
						?>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >NIP * :</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" name="nip" value="<?php echo $r1['nip']; ?>" data-parsley-required="true"  disabled/>
								<input type="text" name="nip" value="<?php echo $r1['nip']; ?>" data-parsley-required="true"  hidden/>
								<input type="text" name="id" value="<?php echo $id; ?>" hidden />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4">Tingkat *</label>
							<div class="col-md-6 col-sm-6">
								<select name="tingkat" class="combobox" data-parsley-required="true" >
									<option value="">- Pilihan -</option>
									<option value="1"<?php if($r1['tingkat']=='1') echo " selected='selected'";?>>Sekolah Dasar (SD)</option>
									<option value="2"<?php if($r1['tingkat']=='2') echo " selected='selected'";?>>Sekolah Menengah Pertama (SMP)</option>
									<option value="3"<?php if($r1['tingkat']=='3') echo " selected='selected'";?>>Sekolah Menengah Atas / Kejuruan</option>
									<option value="4"<?php if($r1['tingkat']=='4') echo " selected='selected'";?>>Diploma (D1)</option>
									<option value="5"<?php if($r1['tingkat']=='5') echo " selected='selected'";?>>Diploma (D3)</option>
									<option value="6"<?php if($r1['tingkat']=='6') echo " selected='selected'";?>>Sarjana (S1)</option>
									<option value="7"<?php if($r1['tingkat']=='7') echo " selected='selected'";?>>Magister (S2)</option>
									<option value="8"<?php if($r1['tingkat']=='8') echo " selected='selected'";?>>Doktor (S3)</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Tahun</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text="  name="tahun"value="<?php echo $r1['tahun']; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Lembaga</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text"  name="lembaga" value="<?php echo $r1['lembaga']; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Status</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text"  name="status" value="<?php echo $r1['status']; ?>"/>
							</div>
						</div>	<div class="form-group">
								<label class="control-label col-md-4 col-sm-4" >Gelar</label>
								<div class="col-md-6 col-sm-6">
									<input class="form-control" type="text"  name="gelar" value="<?php echo $r1['gelar']; ?>"/>
								</div>
							</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4"></label>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-primary" name="submit" value="Edit">Simpan</button>
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
