<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$sql="SELECT t.id, p.id as id_pegawai, t.nip, p.nama, p.talenta_khusus, p.jabatan, o.org_unit, t.tgl_akhir, t.talenta, t.tgl_mulai, t.tgl_akhir, t.no_sk, t.tgl_sk, t.nsk, t.sasaran_k, t.nki, t.isk FROM talenta t, pegawai p, orgunit o WHERE t.nip=p.nip AND o.id_org_unit=p.id_org_unit AND t.active='true' GROUP BY t.nip";
		$rows=R::getAll($sql);
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			if ($row['talenta_khusus']=='on'){
				array_push($col,"
				<form method='POST' action='/admumpln/data/talenta-proses.php'>
					<button type='submit' class='btn btn-xs btn-block btn-success' name='on' value='$row[id_pegawai]'>On</button>
				</form>
				");
			}else{
				array_push($col,"
				<form method='POST' action='/admumpln/data/talenta-proses.php'>
					<button type='submit' class='btn btn-xs btn-block btn-danger' name='off' value='$row[id_pegawai]'>Off</button>
				</form>
				");
			}
			$lbs = R::count('talenta',"nip='$row[nip]' AND talenta='LBS'");
			if($lbs==0) $lbs="";
			array_push($col,$lbs);
			$sop = R::count('talenta',"nip='$row[nip]' AND talenta='SOP'");
			if($sop==0) $sop="";
			array_push($col,$sop);
			$spo = R::count('talenta',"nip='$row[nip]' AND talenta='SPO'");
			if($spo==0) $spo="";
			array_push($col,$spo);
			$opt = R::count('talenta',"nip='$row[nip]' AND talenta='OPT'");
			if($opt==0) $opt="";
			array_push($col,$opt);
			$pot = R::count('talenta',"nip='$row[nip]' AND talenta='POT'");
			if($pot==0) $pot="";
			array_push($col,$pot);
			$kpo = R::count('talenta',"nip='$row[nip]' AND talenta='KPO'");
			if($kpo==0) $kpo="";
			array_push($col,$kpo);
			$pps = R::count('talenta',"nip='$row[nip]' AND talenta='PPS'");
			if($pps==0) $pps="";
			array_push($col,$pps);
			$ppe = R::count('talenta',"nip='$row[nip]' AND talenta='PPE'");
			if($ppe==0) $ppe="";
			array_push($col,$ppe);
			$spp = R::count('talenta',"nip='$row[nip]' AND talenta='SPP'");
			if($spp==0) $spp="";
			array_push($col,$spp);
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){

	}

?>
