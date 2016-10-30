<?php
	$row= R::load('rpegawai',$id);
	$date = new DateTime($row['tgl']);
?>
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb hidden-print pull-right">
		<li><a href="/admumpln/home">Home</a></li>
		<li><a href="javascript:;">Pegawai</a></li>
		<li><a href="/admumpln/pegawai/report">Pegawai Report</a></li>
		<li class="active">Data Pegawai Report View</li>
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
			<?php echo strtoupper($row['judul']);?>
		</div>
		<div class="invoice-header">

			<div>
				<img src="/admumpln/assets/img/logo.png" height="100px">
			</div>
			<div style="margin-top:-100px">
				<h4 class="text-center">PT PLN (PERSERO) P3B </h4>
				<h4 class="text-center">TRANSMISI JAWA BAGIAN TENGAH</h4>
				<h4 class="text-center">APP SEMARANG</h4>
				<h3 class="text-center"><?php echo strtoupper($row['judul']);?></h3>
				<h3 class="text-center"><?php echo $date->format('Y');?></h3>
			</div>

		</div>
		<div class="invoice-content">
			<div class="table-responsive">
				<table class="table table-invoice table-bordered table-striped">
					<thead>
						<tr>
						<?php
							$head = explode(";", $row['kolom']);
							foreach($head as $header){
								echo "<th class='text-center'>".strtoupper($header)."</th>";
							}
						?>
						</tr>
					</thead>
					<tbody>
						<?php
							$query=$row['kueri'];
							try{
								$rs=R::getAll($query);
								foreach($rs as $r){
									echo "<tr>";
									$bod = explode(";", $row['kolom']);
									foreach($bod as $body){
										echo "<td>".$r[$body]."</td>";
									}
									echo "</tr>";
								}
							}catch(Exception $e){
								echo "gagal mengambil data";
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
