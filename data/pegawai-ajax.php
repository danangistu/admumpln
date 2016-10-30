<?php
	require_once "db-connect.php";
	try{
		$rows=R::getAll("SELECT p.id, p.nip, p.nama, p.jabatan, o.org_unit, p.alamat FROM pegawai p, orgunit o WHERE p.id_org_unit=o.id_org_unit ORDER BY p.id DESC");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['jabatan']);
			array_push($col,$row['org_unit']);
			array_push($col,$row['alamat']);
			array_push($col,"
						<a href='./pegawai/detail/$row[id]' class='btn btn-md btn-icon btn-circle btn-success'><span class='fa fa-eye'></span></a>
						<a href='./pegawai/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
						<a href='./pegawai/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
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
