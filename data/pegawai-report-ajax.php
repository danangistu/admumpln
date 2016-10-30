<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows= R::find('rpegawai');
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['id']);
			array_push($col,$row['judul']);
			array_push($col,$row['tgl']);
			array_push($col,"
						<a href='/admumpln/pegawai/report/view/".$row['id']."' class='btn btn-info btn-sm btn-block'><span class='fa fa-eye'></span> Lihat</a>
						<a href='/admumpln/pegawai/report/hapus/".$row['id']."' class='btn btn-danger btn-sm btn-block'><span class='fa fa-trash'></span> Hapus</a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){
    echo  $e->getMessage();
	}

?>
