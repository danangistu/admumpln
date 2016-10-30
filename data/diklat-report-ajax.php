<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$sql="SELECT d.id, d.nip, p.nama, p.jabatan,o.org_unit, d.kode_diklat, a.judul_diklat, d.tgl_mulai, d.tgl_selesai, d.penyelenggara, d.lokasi,d.nilai,d.bidang_diklat,
			SUBSTRING(d.kode_diklat,1,1) as k1,
			SUBSTRING(d.kode_diklat,2,1) as k2,
			SUBSTRING(d.kode_diklat,3,1) as k3,
			SUBSTRING(d.kode_diklat,4,1) as k4,
			SUBSTRING(d.kode_diklat,5,1) as k5,
			SUBSTRING(d.kode_diklat,6,1) as k6,
			SUBSTRING(d.kode_diklat,7,1) as k7,
			SUBSTRING(d.kode_diklat,8,1) as k8,
			SUBSTRING(d.kode_diklat,9,1) as k9
			FROM diklat d, pegawai p, diklatdata a, orgunit o
			WHERE d.nip=p.nip AND d.kode_diklat=a.kode_diklat AND p.id_org_unit=o.id_org_unit";
		$rows=R::getAll($sql);
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['jabatan']);
			array_push($col,$row['org_unit']);
			array_push($col,$row['judul_diklat']);
			array_push($col,$row['tgl_mulai']);
			array_push($col,$row['tgl_selesai']);
			array_push($col,$row['penyelenggara']);
			array_push($col,$row['bidang_diklat']);
			array_push($col,$row['nilai']);
			if($row['nilai']>=90) $grade="A";
			else if($row['nilai']>=85 && $row['nilai']< 90) $grade="B";
			else if($row['nilai']>=80 && $row['nilai']< 85) $grade="C";
			else if($row['nilai']>=75 && $row['nilai']< 80) $grade="D";
			else if($row['nilai']>=70 && $row['nilai']< 75) $grade="E";
			else $grade="-";
			array_push($col,$grade);
			if($grade=="A") $kriteria ="Ekselen";
			if($grade=="B") $kriteria ="Sangat Memuaskan";
			if($grade=="C") $kriteria ="Memuaskan";
			if($grade=="D") $kriteria ="Cukup Memuaskan";
			if($grade=="E") $kriteria ="Cukup";
			else $kriteria=="-";
			array_push($col,$kriteria);
			$tgl=explode("-",$row['tgl_selesai']);
			$thn=substr($tgl[0],-2);
			$nomor_sertifikat=$row['k1'].".".$row['k2'].".".$row['k3'].".".$row['k4'].".".$row['k5'].".".$row['k6'].".".$row['k7'].".".$row['k8'].".".$row['k9'].".".$tgl[2].".".$tgl[1].".".$thn.".".$row['nip'];
			array_push($col,$nomor_sertifikat);
			array_push($col,"
						<a href='/admumpln/diklat/report/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
						<a href='/admumpln/diklat/report/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){

	}

?>
