<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::find("diklatdata","ORDER BY id DESC");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['kode_diklat']);
			array_push($col,$row['judul_diklat']);
			array_push($col,$row['bidang']);
			array_push($col,$row['edisi']);
			array_push($col,$row['kelompok']);
			array_push($col,"
								<a href='/admumpln/diklat/data/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
								<a href='/admumpln/diklat/data/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
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
