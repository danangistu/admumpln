<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="/admumpln/pkl">pkl</a></li>
		<li class="active">PKL Edit</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">PKL Edit <small>Edit PKL secara manual</small></h1>
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
					<h4 class="panel-title">Edit PKL</h4>
				</div>
				<?php
					$id = $get_act;
					$row = R::load('pkl',$id);
				?>
				<div class="panel-body panel-form">
					<form action="/admumpln/data/pkl-proses.php" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="col-md-8">
								<div class="form-group">
									<label class="col-md-12 control-label">Nama</label>
									<div class="col-md-12">
										<input type="text" name="nama" value="<?php echo $row->nama ?>" class="form-control"/>
										<input type="text" name="id" value="<?php echo $row->id ?>" hidden />
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-12 control-label">Status</label>
									<div class="col-md-12">
										<select name="status" class="combobox" data-parsley-group="wizard-step-3" required>
											<option value="">- Pilihan -</option>
											<option value="OJT" <?php if($row['status']=="OJT") echo "selected='selected'"; ?>>OJT</option>
											<option value="PKL" <?php if($row['status']=="PKL") echo "selected='selected'"; ?>>PKL</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">&nbsp </div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-12 control-label">Sekolah</label>
									<div class="col-md-6">
										<input type="text" name="sekolah" value="<?php echo $row->sekolah ?>" class="form-control"/>
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
											<option value="SMA" <?php if($row['pendidikan']=="SMA") echo "selected='selected'"; ?>>SMA</option>
											<option value="D3" <?php if($row['pendidikan']=="D3") echo "selected='selected'"; ?>>D3</option>
											<option value="S1" <?php if($row['pendidikan']=="S1") echo "selected='selected'"; ?>>S1</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-12 control-label">Fakultas</label>
									<div class="col-md-12">
										<input type="text" name="fakultas" value="<?php echo $row->fakultas ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-12 control-label">Jurusan</label>
									<div class="col-md-12">
										<input type="text" name="jurusan" value="<?php echo $row->jurusan ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="form-group">&nbsp </div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-12 control-label">Tanggal Mulai</label>
									<div class="col-md-12">
										<input type="date" name="tgl_mulai" value="<?php echo $row->tgl_mulai ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label class="col-md-12 control-label">Tanggal Selesai</label>
									<div class="col-md-6">
										<input type="date" name="tgl_selesai" value="<?php echo $row->tgl_selesai ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="form-group">&nbsp </div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-12 control-label">Lokasi</label>
									<div class="col-md-12">
										<input type="text" name="lokasi" value="<?php echo $row->lokasi ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="col-md-8">
									<label class="col-md-12 control-label">Mentor</label>
									<div class="col-md-12">
										<input type="text" name="mentor" value="<?php echo $row->mentor ?>" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="form-group">&nbsp </div>
							<div class="col-md-12">
								<div class="col-md-2 pull-right">
									<button type="submit" name="submit" value="Edit" class="btn btn-lg btn-success pull-right"><span class="fa fa-save"></span> Simpan</button>
								</div>
								<div class="col-md-2 pull-right">
									<a href="/admumpln/pkl" class="btn btn-lg btn-inverse pull-right" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</a>
								</div>
							</div>
							<div class="form-group">&nbsp </div>
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
