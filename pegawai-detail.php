<?php
	$id	 	 =$get_act;
	$divider = '<tr class="divider"><td colspan="2"></td></tr>';
	$row 	 = R::getRow("SELECT * FROM pegawai p, orgunit o, costctr c WHERE p.id='$id' AND o.id_org_unit=p.id_org_unit AND c.id_cost_ctr=p.id_cost_ctr");
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Master Data</a></li>
		<li><a href="/admumpln/pegawai">Data Pegawai</a></li>
		<li class="active">Detail Pegawai</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Detail Pegawai</h1>
	<!-- end page-header -->
	<!-- begin profile-container -->
	<div class="profile-container">
		<?php
			$admumAlert =@$_SESSION['admumAlert'];
			$admumMessage =@$_SESSION['admumMessage'];
			if($admumAlert=='1'){
				echo '<div class="alert alert-success fade in">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
						</button>
						Success!<br /> Perubahan data berhasil disimpan.
					</div>';
			}else if(($admumAlert=='0')){
				if($admumMessage==''){
					echo '<div class="alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
							</button>
							Gagal!<br /> Data gagal disimpan
						</div>';
				}else{
					echo '<div class="alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
							</button>
							Gagal!<br /> Data gagal disimpan : $admumMessage
						</div>';
				}
			}
		?>
		<!-- begin profile-section -->
		<div class="profile-section">
			<!-- begin profile-left -->
			<div class="profile-left">
				<!-- begin profile-image -->
				<div class="m-b-10">
					<a href="/admumpln/pegawai" class="btn btn-inverse btn-block"><span class="fa fa-arrow-left"></span> Data Pegawai</a>
				</div>
				<div class="profile-image">
					<img src="/admumpln/foto/pegawai/<?php echo $row['foto']; ?>" />
					<i class="fa fa-user hide"></i>
				</div>
				<!-- end profile-image -->
				<div class="m-b-10">
					<a href="#modal-foto" class="btn btn-primary btn-block" data-toggle="modal"><span class="fa fa-camera"></span> Ganti Foto</a>
				</div>
				<div class="m-b-10">&nbsp </div>
				<!-- begin profile-highlight -->
				<div class="m-b-10">
					<a href="/admumpln/pegawai/edit/<?php echo $id ?>" class="btn btn-warning btn-block"><span class="fa fa-edit"></span> Edit Data</a>
					<a href="#modal-hapus" class="btn btn-danger btn-block" data-toggle="modal"><span class="fa fa-remove"></span> Hapus Data</a>
				</div>
				<!-- end profile-highlight -->
			</div>
			<!-- end profile-left -->
			<!-- begin profile-right -->
			<div class="profile-right">
				<!-- begin profile-info -->
				<div class="profile-info">
					<!-- begin table -->
					<div class="table-responsive">
						<table class="table table-profile">
							<thead>
								<tr>
									<th></th>
									<th>
										<h4><?php echo $row['nama']."<small>".$row['email']."</small>"; ?></h4>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="highlight">
									<td class="field">NIP</td>
									<td><?php echo $row['nip']; ?></td>
								</tr>
								<?php echo $divider; ?>
								<tr>
									<td class="field">Pendidikan Terakhir</td>
									<td><?php echo $row['pend_terakhir'] ?></td>
								</tr>
								<tr>
									<td class="field">Jabatan</td>
									<td><?php echo $row['jabatan'] ?></td>
								</tr>
								<tr>
									<td class="field">Organizational Unit</td>
									<td><?php echo $row['org_unit'] ?></td>
								</tr>
								<?php echo $divider; ?>
								<tr>
									<td class="field">Title</td>
									<td><?php echo $row['title'] ?></td>
								</tr>
								<tr>
									<td class="field">Second Title</td>
									<td><?php echo $row['second_title'] ?></td>
								</tr>
								<?php echo $divider; ?>
								<tr>
									<td class="field">Level</td>
									<td><?php echo $row['lv'] ?></td>
								</tr>
								<tr>
									<td class="field">Skala Gaji Dasar</td>
									<td><?php echo $row['skala_gaji_dasar'] ?></td>
								</tr>
								<?php echo $divider; ?>
								<tr class="highlight">
									<td class="field">Gaji Dasar</td>
									<td><?php echo "Rp. ".number_format($row['gaji_dasar'],2,",","."); ?></td>
								</tr>
								<?php echo $divider; ?>
								<tr>
									<td class="field">Cost Center</td>
									<td><?php echo $row['cost_ctr'] ?></td>
								</tr>

							</tbody>
						</table>
					</div>
					<!-- end table -->
				</div>
				<!-- end profile-info -->
			</div>
			<!-- end profile-right -->
		</div>
		<!-- end profile-section -->
		<!-- begin profile-section -->
		<div class="profile-section">
			<!-- begin row -->
			<div class="row">
				<!-- begin col-4 -->
				<div class="col-md-6">
					<h4 class="title">Personal Info</h4>
					<table class="table table-profile">
						<thead></thead>
						<tbody>
							<tr class="highlight">
								<td class="field">Tempat Lahir</td>
								<td><?php echo $row['birthplace']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Jenis Kelamin</td>
								<td><?php if ($row['gender_key']=='Male') echo "Laki-laki"; else echo "Perempuan"; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Agama</td>
								<td><?php echo $row['religious']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Golongan Darah</td>
								<td><?php echo $row['gol_darah']; ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Alamat</td>
								<td><?php echo $row['alamat']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Kota</td>
								<td><?php echo $row['kota']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Kode Pos</td>
								<td><?php echo $row['kode_pos']; ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Tanggal Lahir</td>
								<td><?php echo date("d M Y", strtotime($row['birthdate'])); ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Umur</td>
								<td>
								<?php
									$biday = new DateTime($row['birthdate']);
									$today = new DateTime();
									$umur = $today->diff($biday);
									echo $umur->y;
								?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- end col-4 -->
				<!-- begin col-4 -->
				<div class="col-md-6">
					<h4 class="title">Bank Account</small></h4>
					<?php
						if($row['bank']=='Bank Mandiri' || $row['bank']=='Mandiri') echo '<img src="/admumpln/foto/bank/mandiri.png" width="50%" />';
						if($row['bank']=='Bank Rakyat Indonesia' || $row['bank']=='Mandiri') echo '<img src="/admumpln/foto/bank/bri.png" width="50%" />';
						if($row['bank']=='Bank Negara Indonesia' || $row['bank']=='BNI') echo '<img src="/admumpln/foto/bank/bni.png" width="50%" />';
					?>
					<table class="table table-profile">
						<thead></thead>
						<tbody>
							<tr class="field">
								<td class="field">Nama Bank</td>
								<td><?php echo $row['bank']; ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Nomor Rekening</td>
								<td><?php echo $row['no_rekening']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Nama Pegawai</td>
								<td><?php echo $row['nama_peg']; ?></td>
							</tr>

						</tbody>
					</table>
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<div class="profile-section">
			<div class="row">
				<!-- begin col-4 -->
				<div class="col-md-6">
					<h4 class="title">User Information</small></h4>
					<table class="table table-profile">
						<thead></thead>
						<tbody>
							<tr class="field">
								<td class="field">Nomor SK</td>
								<td><?php echo $row['no_sk']; ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Tanggal Mulai</td>
								<td><?php echo date("d M Y", strtotime($row['tgl_mulai'])); ?></td>
							</tr>
							<tr class="field">
								<td class="field">Tanggal Grade</td>
								<td><?php echo date("d M Y", strtotime($row['tgl_grade'])); ?></td>
							</tr>
							<tr class="field">
								<td class="field">Tarif Grade</td>
								<td><?php echo $row['tarif_grade']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Tarif Grade Transisi</td>
								<td><?php echo $row['tarif_grade_transisi']; ?></td>
							</tr>
							<tr class="field">
								<td class="field">Tunjangan Posisi</td>
								<td><?php echo $row['tunjangan_posisi']; ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Tanggal Masuk</td>
								<td><?php echo date("d M Y", strtotime($row['tgl_masuk'])); ?></td>
							</tr>
							<tr class="field">
								<td class="field">Tanggal Capeg</td>
								<td><?php echo date("d M Y", strtotime($row['tgl_capeg'])); ?></td>
							</tr>
							<tr class="highlight">
								<td class="field">Tanggal Pegawai</td>
								<td><?php echo date("d M Y", strtotime($row['tgl_peg'])); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end profile-section -->
	</div>
	<!-- end profile-container -->
</div>
<!-- Upload Foto -->
<div class="modal fade" id="modal-foto">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admumpln/data/pegawai-proses.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Upload Foto</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Pilih File</label>
						<div class="col-md-9">
							<input type="text" name="id" id="id" value="<?php echo $id;?>" hidden />
							<input type="text" name="foto" id="foto" value="<?php echo $row['foto'];?>" hidden />
							<input type="file" name="file" id="file" class="form-control"/>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="submit" value="Foto" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Peringatan</h4>
			</div>
			<div class="modal-body">
				<div class="note note-danger">
					<h1>HAPUS DATA!</h1>
					<p>
						Apakah anda yakin untuk menghapus data? Klik hapus untuk melanjutkan.<br>
						*data yang sudah terhapus tidak dapat dikembalikan lagi.
					</p>
				</div>
			</div>
			<div class="modal-footer">
				<form method="POST" action="/admumpln/data/pegawai-proses.php">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" class="btn btn-sm btn-success" name="submit" value="<?php echo $id; ?>"><span class="fa fa-save"></span> Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
?>
