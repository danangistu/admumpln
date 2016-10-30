<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="/admumpln/User">User</a></li>
		<li class="active">User Edit</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">User Edit <small>Edit User secara manual</small></h1>
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
					<h4 class="panel-title">Edit User</h4>
				</div>
				<?php
					$id = $get_act;
					$row = R::load('user',$id);
				?>
				<div class="panel-body panel-form">
					<form action="/admumpln/data/user-proses.php" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-12 control-label">Username</label>
									<div class="col-md-6">
										<input type="text" name="username" value="<?php echo $row->username ?>" class="form-control"/>
										<input type="text" name="id" value="<?php echo $row->id ?>" hidden />
									</div>
								</div>
							</div>
							<div class="col-md-12"> &nbsp</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-12 control-label">Password</label>
									<div class="col-md-5">
										<input type="password" name="password" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="col-md-12"> &nbsp</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-12 control-label">Re-Password</label>
									<div class="col-md-5">
										<input type="password" name="password2" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="col-md-12"> &nbsp</div>
							<?php if ($row->level == "Admin") :?>
								<div class="col-md-12">
									<h4>Pilih Role Admin</h4>
								</div>
								<?php
									$roles = explode(',',$row['role']);
								?>
								<div class="checkbox col-md-3">
									<div class="checkbox col-md-3 pull-right" style="margin-top:-4px;">
										<h4>
											<input type="checkbox" name="check[]" value="a" <?php foreach ($roles as $role) : if($role == 'a') echo "checked='checked'"; endforeach;?> />
											Dashboard
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="b" <?php foreach ($roles as $role) : if($role == 'b') echo "checked='checked'"; endforeach;?> />
											Pegawai
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="c" <?php foreach ($roles as $role) : if($role == 'c') echo "checked='checked'"; endforeach;?> />
											Diklat
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="d" <?php foreach ($roles as $role) : if($role == 'd') echo "checked='checked'"; endforeach;?> />
											Talenta
										</h4>
									</div>
								</div>
								<div class="checkbox col-md-3">
									<div class="checkbox col-md-3 pull-right">
										<h4>
											<input type="checkbox" name="check[]" value="e" <?php foreach ($roles as $role) : if($role == 'e') echo "checked='checked'"; endforeach;?> />
											Keluarga
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="f" <?php foreach ($roles as $role) : if($role == 'f') echo "checked='checked'"; endforeach;?> />
											Pendidikan
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="g" <?php foreach ($roles as $role) : if($role == 'g') echo "checked='checked'"; endforeach;?> />
											PKL
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="h" <?php foreach ($roles as $role) : if($role == 'h') echo "checked='checked'"; endforeach;?> />
											Keamanan
										</h4>
									</div>
								</div>
								<div class="checkbox col-md-3">
									<div class="checkbox col-md-3 pull-right">
										<h4>
											<input type="checkbox" name="check[]" value="i" <?php foreach ($roles as $role) : if($role == 'i') echo "checked='checked'"; endforeach;?> />
											Management Users
										</h4>
										<h4>
											<input type="checkbox" name="check[]" value="j" <?php foreach ($roles as $role) : if($role == 'j') echo "checked='checked'"; endforeach;?> />
											Admum CSR
										</h4>
									</div>
								</div>
							<?php endif; ?>
							</div>
							<div class="form-group">&nbsp </div>
							<div class="col-md-12">
								<div class="col-md-2 pull-right">
									<button type="submit" name="submit" value="Edit" class="btn btn-lg btn-success pull-right" style="margin-top:-10px;"><span class="fa fa-save"></span> Simpan</button>
								</div>
								<div class="col-md-2 pull-right">
									<a href="/admumpln/User" class="btn btn-lg btn-inverse pull-right" data-dismiss="modal" style="margin-top:-10px;"><span class="fa fa-arrow-left"></span> Kembali</a>
								</div>
							</div>
							<div class="col-md-12">&nbsp </div>
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
