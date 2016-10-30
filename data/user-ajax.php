<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$rows=R::getAll("SELECT u.id, u.nip, p.nama, u.username, u.level, u.role FROM user u, pegawai p WHERE u.nip = p.nip AND u.level <> 'Master'");
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['username']);
			array_push($col,$row['level']);

			$asal 	= array("a","b", "c", "d", "e", "f", "g", "h", "i", "j", "k");
			$alias  = array("DASHBOARD", " PEGAWAI", " DIKLAT", " TALENTA", " KELUARGA", " PENDIDIKAN", " PKL", " KEAMANAN", " MANAGEMENT USERS", " ADMUM CSR", " DATA DIRI");
			$role		= str_replace($asal, $alias, $row['role']);
			if ($role == "DASHBOARD, PEGAWAI, DIKLAT, TALENTA, KELUARGA, PENDIDIKAN, PKL, KEAMANAN, MANAGEMENT USERS, ADMUM CSR") $role = "ALL";
			
			array_push($col,$role);
			if ($row['level']=='User'){
				array_push($col,"
				<a href='/admumpln/user/set/$row[id]' class='btn btn-xs btn-block btn-info'>Set Admin</a>
				");
			} else {
				array_push($col,"
				<a href='/admumpln/user/unset/$row[id]' class='btn btn-xs btn-block btn-inverse'>Hapus Admin</a>
				");
			}
			array_push($col,"
								<a href='/admumpln/user/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
								<a href='/admumpln/user/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
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
