<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Diklat</a></li>
		<li><a href="/admumpln/diklat/data">Diklat Data</a></li>
		<li class="active">Diklat Data Edit</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Diklat Data Edit <small>Edit data diklat secara manual</small></h1>
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
					<h4 class="panel-title">Edit Data Diklat</h4>
				</div>
				<div class="panel-body panel-form">
					<form class="form-horizontal form-bordered" action="/admumpln/data/diklat-proses.php" method="post" data-parsley-validate="true" name="demo-form">
						<?php
							$id=$get_id;
							$r1= R::load('diklatdata',$id);
						?>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Kode Diklat * :</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" id="kode_diklat" name="kode_diklat" value="<?php echo $r1['kode_diklat']; ?>" placeholder="Masukkan Kode Diklat" data-parsley-required="true" />
								<input type="text" id="id" name="id" value="<?php echo $id; ?>" hidden />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Judul Diklat * :</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" id="judul_diklat" name="judul_diklat" value="<?php echo $r1['judul_diklat']; ?>" placeholder="Masukkan Judul Diklat" data-parsley-required="true" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Bidang</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" id="bidang" name="bidang" value="<?php echo $r1['bidang']; ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Edisi</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text=" id="edisi" name="edisi"value="<?php echo $r1['edisi']; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4" >Kelompok</label>
							<div class="col-md-6 col-sm-6">
								<input class="form-control" type="text" id="kelompok" name="kelompok" value="<?php echo $r1['kelompok']; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4"></label>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-primary" name="diklatdata" value="Edit">Simpan</button>
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
