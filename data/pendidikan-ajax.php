<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::getAll("SELECT d.id, d.nip, g.nama, d.tingkat, d.tahun, d.lembaga, d.status, d.gelar
						FROM pendidikan d, pegawai g
						WHERE d.nip=g.nip
						ORDER BY d.nip ASC");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			if ($row['tingkat']=='1') array_push($col,"Sekolah Dasar");
			else if ($row['tingkat']=='2') array_push($col,"Sekolah Menengah Pertama");
			else if ($row['tingkat']=='3') array_push($col,"Sekolah Menengah Atas / Kejuruan");
			else if ($row['tingkat']=='4') array_push($col,"Diploma (D1)");
			else if ($row['tingkat']=='5') array_push($col,"Diploma (D3)");
			else if ($row['tingkat']=='6') array_push($col,"Sarjana (S1)");
			else if ($row['tingkat']=='7') array_push($col,"Magister (S2)");
			else array_push($col,"Doktor (S3)");

			array_push($col,$row['tahun']);
			array_push($col,$row['lembaga']);
			array_push($col,$row['status']);
			array_push($col,$row['gelar']);
			array_push($col,"
						<a href='/admumpln/pendidikan/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
						<a href='/admumpln/pendidikan/hapus/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){
		echo $e->getMessage();
	}

?>
