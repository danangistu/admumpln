<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::find("satpam");
		$i=0;
		foreach($rows as $row){
			$i++;
			$col=array();
			array_push($col,$i);
			array_push($col,$row['nama']);
			array_push($col,$row['birthplace']);
			array_push($col,$row['birthdate']);
			array_push($col,$row['alamat']);
			array_push($col,$row['pend_terakhir']);
			array_push($col,$row['gender']);
			array_push($col,$row['agama']);
			array_push($col,$row['garda_I']);
			array_push($col,$row['garda_II']);
			array_push($col,$row['garda_III']);
			array_push($col,$row['ket_listrik']);
			array_push($col,$row['tgl_berlaku']);
			array_push($col,$row['tgl_kadaluarsa']);
			array_push($col,$row['no_reg']);
			array_push($col,$row['lokasi']);
			array_push($col,$row['ket']);
			array_push($col,"
						<a href='/admumppln/satpam/detail/$row[id]' class='btn btn-md btn-icon btn-circle btn-success'><span class='fa fa-eye'></span></a>
						<a href='/admumpln/satpam/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
						<a href='/admumpln/satpam/hapus/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){

	}
?>
