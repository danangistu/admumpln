<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::getAll("	SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit, p.birthdate,FLOOR(DATEDIFF(CURDATE(),birthdate)/365) as umur ,DATE_ADD(p.birthdate, INTERVAL 55 YEAR) as tgl_pensiun
							FROM pegawai p, orgunit o
							WHERE p.id_org_unit=o.id_org_unit AND (FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='54' OR FLOOR(DATEDIFF(CURDATE(),birthdate)/365)='55')
							ORDER BY p.birthdate ASC
						");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['jabatan']);
			array_push($col,$row['org_unit']);
			array_push($col,$row['birthdate']);
			array_push($col,$row['tgl_pensiun']);
			if($row['umur']<=54)
				array_push($col,"Aktif");
			else
				array_push($col,"Sudah Pensiun");
			array_push($col,"
						<a href='/admumpln/pegawai/detail/$row[id]' class='btn btn-md btn-icon btn-circle btn-success'><span class='fa fa-eye'></span></a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){
		echo	$e->getMessage();
	}

?>
