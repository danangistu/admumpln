<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	try{
		$sql="SELECT t.id, t.nip, p.nama, p.jabatan, o.org_unit, t.tgl_akhir, t.talenta, t.tgl_mulai, t.tgl_akhir, t.no_sk, t.tgl_sk, t.nsk, t.sasaran_k, t.nki, t.isk FROM talenta t, pegawai p, orgunit o WHERE t.nip=p.nip AND o.id_org_unit=p.id_org_unit AND t.active='true'";
		$rows=R::getAll($sql);
		foreach($rows as $row){
			$col=array();
			array_push($col,$row['nip']);
			array_push($col,$row['nama']);
			array_push($col,$row['jabatan']);
			array_push($col,$row['org_unit']);
			array_push($col,$row['tgl_akhir']);
			if ($row['talenta']<>''){
				array_push($col,$row['talenta']);
				if ($row['talenta']=='LBS') array_push($col,"Luar Biasa");
				else if ($row['talenta']=='SOP') array_push($col,"Sangat Optimal");
				else if ($row['talenta']=='SPO') array_push($col,"Sangat Potensial");
				else if ($row['talenta']=='OPT') array_push($col,"Optimal");
				else if ($row['talenta']=='POT') array_push($col,"Potensial");
				else if ($row['talenta']=='KPO') array_push($col,"Kandidat Penyesuaian");
				else if ($row['talenta']=='PPS') array_push($col,"Perlu Penyesuaian");
				else if ($row['talenta']=='PPE') array_push($col,"Perlu Perhatian");
				else array_push($col,"Sangat Perlu Perhatian");

				array_push($col,$row['tgl_mulai']);
				array_push($col,$row['tgl_akhir']);
				array_push($col,"");
				array_push($col,$row['no_sk']);
				array_push($col,$row['tgl_sk']);
				array_push($col,$row['nsk']);
				array_push($col,$row['sasaran_k']);
				array_push($col,$row['nki']);
				array_push($col,$row['isk']);
			} else {
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"Tidak Ada Talenta");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
				array_push($col,"");
			}


			array_push($col,"
						<a href='/admumpln/talenta/edit/$row[id]' class='btn btn-md btn-icon btn-circle btn-warning'><span class='fa fa-edit'></span></a>
						<a href='/admumpln/talenta/delete/$row[id]' class='btn btn-md btn-icon btn-circle btn-danger'><span class='fa fa-remove'></span></a>
					   ");
			$data[]=$col;
		}
		if(empty($data)) $data['length']=0;
		$jdata['data']=$data;
		echo json_encode($jdata);
	}catch(Exception $e){

	}

?>
