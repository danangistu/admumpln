<?php
	$nip=$get_act;
	$r= R::findOne('pegawai','nip=?',[$nip]);
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Diklat</a></li>
		<li class="active">Data Diklat Report</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Report Data Diklat <small>laporan dari data diklat</small></h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
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
					<h4 class="panel-title">Tabel Data Diklat Report</h4>
				</div>

				<div class="panel-body">
					<h3> DIKLAT REPORT <?php echo $r['nama'];?></h3>
					<hr />
					<div class="table-responsive">
						<table id="diklat-view" class="table table-striped table-responsive table-bordered row-border order-column" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th >NIP</th>
									<th >Nama</th>
									<th >Jabatan</th>
									<th >Org Unit</th>
									<th >Nama Diklat</th>
									<th >Tanggal Mulai</th>
									<th >Tanggal Selesai</th>
									<th >Penyelenggara</th>
									<th >Bidang Diklat</th>
									<th >Nilai</th>
									<th >Grade</th>
									<th >Kriteria</th>
									<th >Nomor Sertifikat</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									try{
										$sql="SELECT d.id, d.nip, p.nama, p.jabatan,o.org_unit, d.kode_diklat, a.judul_diklat, d.tgl_mulai, d.tgl_selesai, d.penyelenggara, d.lokasi,d.nilai,d.bidang_diklat,
											SUBSTRING(d.kode_diklat,1,1) as k1,
											SUBSTRING(d.kode_diklat,2,1) as k2,
											SUBSTRING(d.kode_diklat,3,1) as k3,
											SUBSTRING(d.kode_diklat,4,1) as k4,
											SUBSTRING(d.kode_diklat,5,1) as k5,
											SUBSTRING(d.kode_diklat,6,1) as k6,
											SUBSTRING(d.kode_diklat,7,1) as k7,
											SUBSTRING(d.kode_diklat,8,1) as k8,
											SUBSTRING(d.kode_diklat,9,1) as k9
											FROM diklat d, pegawai p, diklatdata a, orgunit o
											WHERE d.nip=p.nip AND d.kode_diklat=a.kode_diklat AND p.id_org_unit=o.id_org_unit AND d.nip='$nip'";

										$rows=R::getAll($sql);
										foreach($rows as $row){
											echo "<tr>";
											echo "<td>$row[nip]</td>";
											echo "<td>$row[nama]</td>";
											echo "<td>$row[jabatan]</td>";
											echo "<td>$row[org_unit]</td>";
											echo "<td>$row[judul_diklat]</td>";
											echo "<td>$row[tgl_mulai]</td>";
											echo "<td>$row[tgl_selesai]</td>";
											echo "<td>$row[penyelenggara]</td>";
											echo "<td>$row[bidang_diklat]</td>";
											echo "<td>$row[nilai]</td>";

											if($row['nilai']>=90) $grade="A";
											else if($row['nilai']>=85 && $row['nilai']< 90) $grade="B";
											else if($row['nilai']>=80 && $row['nilai']< 85) $grade="C";
											else if($row['nilai']>=75 && $row['nilai']< 80) $grade="D";
											else if($row['nilai']>=70 && $row['nilai']< 75) $grade="E";
											else $grade="-";
											echo "<td>$grade</td>";

											if($grade=="A") $kriteria ="Ekselen";
											if($grade=="B") $kriteria ="Sangat Memuaskan";
											if($grade=="C") $kriteria ="Memuaskan";
											if($grade=="D") $kriteria ="Cukup Memuaskan";
											if($grade=="E") $kriteria ="Cukup";
											else $kriteria=="-";
											echo "<td>$kriteria</td>";

											$tgl=explode("-",$row['tgl_selesai']);
											$thn=substr($tgl[0],-2);
											$nomor_sertifikat=$row['k1'].".".$row['k2'].".".$row['k3'].".".$row['k4'].".".$row['k5'].".".$row['k6'].".".$row['k7'].".".$row['k8'].".".$row['k9'].".".$tgl[2].".".$tgl[1].".".$thn.".".$row['nip'];
											echo "<td>$nomor_sertifikat</td>";
											echo "<td><a href='/admumpln/diklat/report/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
														<a href='/admumpln/diklat/report/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
														</td>";
											echo "</tr>";
										}
									}
									catch(Exception $e){
										echo  $e->getMessage();
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>
<div class="modal fade" id="modal-import">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admumpln/data/diklat-proses.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Upload File Excel</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Pilih File</label>
						<div class="col-md-9">
							<input type="file" name="file" id="file" class="form-control"/>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
					<div class="form-group">
						<a href="/admumpln/assets/Report Diklat.xls" class="btn btn-sm btn-primary"><span class="fa fa-arrow-down"></span> Download Contoh Excel</a>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="diklatreportupload" value="Submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
