<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb hidden-print pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li><a href="/admumpln/pegawai/report">Pegawai Pensiun</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header hidden-print">Pegawai Report View<small> menampilkan report yang dibuat dari data pegawai</small></h1>
	<!-- end page-header -->

	<!-- begin invoice -->
	<div class="invoice">
		<div class="invoice-company">
			<span class="pull-right hidden-print">
			<a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
			<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
			</span>
			LAPORAN PEGAWAI PENSIUN
		</div>
		<div class="invoice-header">

			<div>
				<img src="/admumpln/assets/img/logo.png" height="100px">
			</div>
			<div style="margin-top:-100px">
				<h4 class="text-center">PT PLN (PERSERO) P3B </h4>
				<h4 class="text-center">TRANSMISI JAWA BAGIAN TENGAH</h4>
				<h4 class="text-center">APP SEMARANG</h4>
				<h3 class="text-center">LAPORAN PEGAWAI PENSIUN</h3>
				<?php
					$tahunini= date('Y');
					$tahundepan= date('Y')+1;
				?>
				<h3 class="text-center"><?php echo $tahunini." / ".$tahundepan ?></h3>
			</div>

		</div>
		<div class="invoice-content">
			<div class="table-responsive">
				<table class="table table-invoice table-bordered table-striped">
					<thead>
						<tr>
							<?php
							if(!empty($post_check)){
								foreach($post_check as $selected){
									if($selected=="nip"){
										echo '<th class="col-md-1 text-center">NIP</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="nama"){
										echo '<th class="col-md-3 text-center">NAMA</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="jabatan"){
										echo '<th class="col-md-2 text-center">JABATAN</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="org_unit"){
										echo '<th class="col-md-2 text-center">ORG UNIT</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="tgl_lahir"){
										echo '<th class="col-md-2 text-center">TGL LAHIR</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="tgl_pensiun"){
										echo '<th class="col-md-2 text-center">TGL PENSIUN</th>';
									}
								}
								foreach($post_check as $selected){
									if($selected=="umur"){
										echo '<th class="col-md-1 text-center">UMUR</th>';
									}
								}
							}
							?>
							<th class="col-md-1 text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						try{
							if($post_status=="semua"){
								$rows=R::getAll("	SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit, p.birthdate,FLOOR(DATEDIFF(CURDATE(),birthdate)/365) as umur ,DATE_ADD(p.birthdate, INTERVAL 55 YEAR) as tgl_pensiun
																	FROM pegawai p, orgunit o
																	WHERE p.id_org_unit=o.id_org_unit AND (FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='54' OR FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='55')
																	ORDER BY p.birthdate ASC
																");
							} else if($post_status=="aktif"){
								$rows=R::getAll("	SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit, p.birthdate,FLOOR(DATEDIFF(CURDATE(),birthdate)/365) as umur ,DATE_ADD(p.birthdate, INTERVAL 55 YEAR) as tgl_pensiun
																	FROM pegawai p, orgunit o
																	WHERE p.id_org_unit=o.id_org_unit AND (FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='54')
																	ORDER BY p.birthdate ASC
																");
							}else{
								$rows=R::getAll("	SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit, p.birthdate,FLOOR(DATEDIFF(CURDATE(),birthdate)/365) as umur ,DATE_ADD(p.birthdate, INTERVAL 55 YEAR) as tgl_pensiun
																	FROM pegawai p, orgunit o
																	WHERE p.id_org_unit=o.id_org_unit AND (FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='55')
																	ORDER BY p.birthdate ASC
																");
							}

							foreach($rows as $row){
								echo "<tr>";
								if(!empty($post_check)){
									foreach($post_check as $selected){
										if($selected=="nip"){
											echo "<td>$row[nip]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="nama"){
											echo "<td>$row[nama]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="jabatan"){
											echo "<td>$row[jabatan]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="org_unit"){
											echo "<td>$row[org_unit]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="tgl_lahir"){
											echo "<td>$row[birthdate]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="tgl_pensiun"){
											echo "<td>$row[tgl_pensiun]</td>";
										}
									}
									foreach($post_check as $selected){
										if($selected=="umur"){
											echo "<td>$row[umur]</td>";
										}
									}
								}

								if($row['umur']<=54)
									echo "<td>Aktif</td>";
								else
									echo "<td>Sudah Pensiun</td>";

								echo "</tr>";
							}
						}catch(Exception $e){
							echo $e->getMessage();
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="invoice-footer text-muted">
			<p class="text-center m-b-5">
				POWERED BY PLN APP SEMARANG
			</p>
			<p class="text-center">
				<span class="m-r-10"><i class="fa fa-globe"></i> appsemarang.co.id</span>
				<span class="m-r-10"><i class="fa fa-phone"></i> T:024-18192302</span>
				<span class="m-r-10"><i class="fa fa-envelope"></i> admum@gmail.com</span>
			</p>
		</div>
	</div>
	<!-- end invoice -->
</div>
