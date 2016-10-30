<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::getAll("SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit FROM pegawai p, orgunit o WHERE p.id_org_unit=o.id_org_unit ORDER BY p.id DESC");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['jabatan']);
			array_push($col,$row['org_unit']);
			array_push($col,"
						<a href='/admumpln/diklat/tambah/$row[id]' class='btn btn-primary btn-block'><span class='fa fa-check'></span> Pilih</a>
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
