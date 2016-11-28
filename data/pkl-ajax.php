<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::find("pkl","ORDER BY id DESC");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nama']);
			array_push($col,$row['status']);
			array_push($col,$row['sekolah']);
			array_push($col,$row['pendidikan']);
			array_push($col,$row['fakultas']);
			array_push($col,$row['jurusan']);
			array_push($col,$row['tgl_mulai']);
			array_push($col,$row['tgl_selesai']);
			array_push($col,$row['lokasi']);
			array_push($col,$row['mentor']);
			$now = date("Y-m-d");
			if($row['tgl_mulai']==$now){
				array_push($col,"<span class='label label-success'>Mulai</span>");
			}else{
				if($row['tgl_selesai']>=$now){
					array_push($col,"<span class='label label-warning'>Proses</span>");
				}else{
					array_push($col,"<span class='label label-danger'>Selesai</span>");
				}
			}
			array_push($col,"
								<a href='/admumpln/pkl/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
								<a href='/admumpln/pkl/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
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
