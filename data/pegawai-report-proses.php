<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	session_start();

		if(isset($post_submit)){
			$kolom=array();
			if(isset($post_nip)){
				if($post_nip<>""){
					$snip="p.nip,";
					$nip="AND p.nip ='".$post_nip."'";
					$kolom[]="nip";
				}else{
					$snip="p.nip,";
					$nip="";
					$kolom[]="nip";
				}
			}else{
				$snip="";
				$nip="";
			}

			if(isset($post_nama)){
				if($post_nama<>""){
					$snama="p.nama,";
					$nama="AND p.nama LIKE '".$post_nama."'";
					$kolom[]="nama";
				}else{
					$snama="p.nama,";
					$nama="";
					$kolom[]="nama";
				}
			}else{
				$snama="";
				$nama="";
			}

			if(isset($post_jabatan)){
				$sjabatan="p.jabatan,";
				$q=array();
				foreach($post_jabatan as $selected){
					$q[]="p.jabatan ='".$selected."' OR";
				}
				$jabatan="AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="jabatan";
			}else{
				if(isset($post_jabatan2)){
					$sjabatan="p.jabatan,";
					$jabatan="";
					$kolom[]="jabatan";
				}else{
					$sjabatan="";
					$jabatan="";
				}
			}

			if(isset($post_org_unit)){
				$sorg_unit="o.org_unit,";
				$q=array();
				foreach($post_org_unit as $selected){
					$q[]="o.id_org_unit ='".$selected."' OR";
				}
				$org_unit="AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="org_unit";
			}else{
				if(isset($post_org_unit2)){
					$sorg_unit="o.org_unit,";
					$org_unit="";
					$kolom[]="org_unit";
				}else{
					$sorg_unit="";
					$org_unit="";
				}
			}

			if(isset($post_cost_ctr)){
				$scost_ctr="c.cost_ctr,";
				$q=array();
				foreach($post_cost_ctr as $selected){
					$q[]="c.id_cost_ctr ='".$selected."' OR";
				}
				$cost_ctr=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="cost_ctr";
			}else{
				if(isset($post_cost_ctr2)){
					$scost_ctr="c.cost_ctr,";
					$cost_ctr="";
					$kolom[]="cost_ctr";
				}else{
					$scost_ctr="";
					$cost_ctr="";
				}
			}

			if(isset($post_email)){
				$semail="p.email, ";
				$email="";
				$kolom[]="email";
			}else{
				$semail="";
				$email="";
			}

			if(isset($post_pend_terakhir)){
				$spend_terakhir="p.pend_terakhir, ";
				$q=array();
				foreach($post_pend_terakhir as $selected){
					$q[]="p.pend_terakhir ='".$selected."' OR";
				}
				$pend_terakhir=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="pend_terakhir";
			}else{
				if(isset($post_pend_terakhir2)){
					$spend_terakhir="p.pend_terakhir, ";
					$pend_terakhir="";
					$kolom[]="pend_terakhir";
				}else{
					$spend_terakhir="";
					$pend_terakhir="";
				}
			}

			if(isset($post_title)){
				$stitle="p.title, ";
				$q=array();
				foreach($post_title as $selected){
					$q[]="p.title ='".$selected."' OR";
				}
				$title=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="title";
			}else{
				if(isset($post_title2)){
					$stitle="p.title, ";
					$title="";
					$kolom[]="title";
				}else{
					$stitle="";
					$title="";
				}
			}

			if(isset($post_second_title)){
				$ssecond_title="p.second_title, ";
				$q=array();
				foreach($post_second_title as $selected){
					$q[]="p.second_title ='".$selected."' OR";
				}
				$second_title=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="second_title";
			}else{
				if(isset($post_second_title2)){
					$ssecond_title="p.second_title, ";
					$second_title="";
					$kolom[]="second_title";
				}else{
					$ssecond_title="";
					$second_title="";
				}
			}

			if(isset($post_lv)){
				$slv="p.lv, ";
				$lv="";
				$kolom[]="lv";
			}else{
				$slv="";
				$lv="";
			}

			if(isset($post_skala_gaji_dasar)){
				$sskala="p.skala_gaji_dasar, ";
				$skala="";
				$kolom[]="skala_gaji_dasar";
			}else{
				$sskala="";
				$skala="";
			}

			if(isset($post_gaji_dasar)){
				list($bawah, $atas)=explode(";",$post_gaji_dasar);
				$sgaji_dasar="p.gaji_dasar, ";
				$gaji_dasar="AND (p.gaji_dasar BETWEEN $bawah AND $atas)";
				$kolom[]="gaji_dasar";
			}else{
				$sgaji_dasar="";
				$gaji_dasar="";
			}

			if(isset($post_employee_group)){
				$semployee_group="p.employee_group, ";
				$q=array();
				foreach($post_employee_group as $selected){
					$q[]="p.employee_group ='".$selected."' OR";
				}
				$employee_group=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="employee_group";
			}else{
				if(isset($post_employee_group2)){
					$semployee_group="p.employee_group, ";
					$employee_group="";
					$kolom[]="employee_group";
				}else{
					$semployee_group="";
					$employee_group="";
				}
			}

			if(isset($post_birthplace)){
				$sbirthplace="p.birthplace, ";
				$q=array();
				foreach($post_birthplace as $selected){
					$q[]="p.birthplace ='".$selected."' OR";
				}
				$birthplace=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="birthplace";
			}else{
				if(isset($post_birthplace2)){
					$sbirthplace="p.birthplace, ";
					$birthplace="";
					$kolom[]="birthplace";
				}else{
					$sbirthplace="";
					$birthplace="";
				}
			}

			if(isset($post_birthdate)){
				list($bawah, $atas)=explode(" - ",$post_birthdate);
				if($bawah<>"" AND $atas<>""){
					$sbirthdate="p.birthdate, ";
					$birthdate="AND (p.birthdate BETWEEN '$bawah' AND '$atas')";
					$kolom[]="birthdate";
				}else{
					$sbirthdate="p.birthdate, ";
					$birthdate="";
					$kolom[]="birthdate";
				}
			}else{
				$sbirthdate="";
				$birthdate="";
			}

			if(isset($post_alamat)){
				$salamat="p.alamat, ";
				$alamat="";
				$kolom[]="alamat";
			}else{
				$salamat="";
				$alamat="";
			}

			if(isset($post_kota)){
				$skota="p.kota, ";
				$q=array();
				foreach($post_kota as $selected){
					$q[]="p.kota ='".$selected."' OR";
				}
				$kota=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="kota";
			}else{
				if(isset($post_kota2)){
					$skota="p.kota, ";
					$kota="";
					$kolom[]="kota";
				}else{
					$skota="";
					$kota="";
				}
			}

			if(isset($post_kode_pos)){
				$skode_pos="p.kode_pos, ";
				$kode_pos="";
				$kolom[]="kode_pos";
			}else{
				$skode_pos="";
				$kode_pos="";
			}

			if(isset($post_religious)){
				$sreligious="p.religious, ";
				$q=array();
				foreach($post_religious as $selected){
					$q[]="p.religious ='".$selected."' OR";
				}
				$religious=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="religious";
			}else{
				if(isset($post_kota2)){
					$sreligious="p.religious, ";
					$religious="";
					$kolom[]="religious";
				}else{
					$sreligious="";
					$religious="";
				}
			}

			if(isset($post_gender_key)){
				if($post_gender_key<>""){
					$sgender_key="p.gender_key, ";
					$gender_key="AND p.gender_key='$post_gender_key'";
					$kolom[]="gender_key";
				}
				else{
					$sgender_key="p.gender_key, ";
					$gender_key="";
					$kolom[]="gender_key";
				}
			}else{
				$sgender_key="";
				$gender_key="";
			}

			if(isset($post_gol_darah)){
				if($post_gol_darah<>""){
					$sgol_darah="p.gol_darah, ";
					$gol_darah="AND p.gol_darah='$post_gol_darah'";
					$kolom[]="gol_darah";
				}
				else{
					$sgol_darah="p.gol_darah, ";
					$gol_darah="";
					$kolom[]="gol_darah";
				}
			}else{
				$sgol_darah="";
				$gol_darah="";
			}

			if(isset($post_bank)){
				$sbank="p.bank, ";
				$q=array();
				foreach($post_bank as $selected){
					$q[]="p.bank ='".$selected."' OR";
				}
				$bank=" AND (".substr(implode(" ",$q),0,-2).")";
				$kolom[]="bank";
			}else{
				if(isset($post_bank2)){
					$sbank="p.bank, ";
					$bank="";
					$kolom[]="bank";
				}else{
					$sbank="";
					$bank="";
				}
			}

			if(isset($post_no_rekening)){
				$sno_rekening="p.no_rekening, ";
				$no_rekening="";
				$kolom[]="no_rekening";
			}else{
				$sno_rekening="";
				$no_rekening="";
			}

			if(isset($post_nama_peg)){
				$snama_peg="p.nama_peg, ";
				$nama_peg="";
				$kolom[]="nama_peg";
			}else{
				$snama_peg="";
				$nama_peg="";
			}

			if(isset($post_no_sk)){
				$sno_sk="p.no_sk, ";
				$no_sk="";
				$kolom[]="no_sk";
			}else{
				$sno_sk="";
				$no_sk="";
			}

			if(isset($post_tgl_sk)){
				list($bawah, $atas)=explode(" - ",$post_tgl_sk);
				if($bawah<>"" AND $atas<>""){
					$stgl_sk="p.tgl_sk, ";
					$tgl_sk="AND (p.tgl_sk BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_sk";
				}else{
					$stgl_sk="p.tgl_sk, ";
					$tgl_sk="";
					$kolom[]="tgl_sk";
				}
			}else{
				$stgl_sk="";
				$tgl_sk="";
			}

			if(isset($post_tgl_grade)){
				list($bawah, $atas)=explode(" - ",$post_tgl_grade);
				if($bawah<>"" AND $atas<>""){
					$stgl_grade="p.tgl_grade, ";
					$tgl_grade="AND (p.tgl_grade BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_grade";
				}else{
					$stgl_grade="p.tgl_grade, ";
					$tgl_grade="";
					$kolom[]="tgl_grade";
				}
			}else{
				$stgl_grade="";
				$tgl_grade="";
			}

			if(isset($post_tarif_grade)){
				$starif_grade="p.tarif_grade, ";
				$tarif_grade="";
				$kolom[]="tarif_grade";
			}else{
				$starif_grade="";
				$tarif_grade="";
			}

			if(isset($post_tarif_grade_transisi)){
				$starif_grade_transisi="p.tarif_grade_transisi, ";
				$tarif_grade_transisi="";
				$kolom[]="tarif_grade_transisi";
			}else{
				$starif_grade_transisi="";
				$tarif_grade_transisi="";
			}

			if(isset($post_tunjangan_posisi)){
				$stunjangan_posisi="p.tunjangan_posisi, ";
				$tunjangan_posisi="";
				$kolom[]="tunjangan_posisi";
			}else{
				$stunjangan_posisi="";
				$tunjangan_posisi="";
			}

			if(isset($post_tgl_mulai)){
				list($bawah, $atas)=explode(" - ",$post_tgl_mulai);
				if($bawah<>"" AND $atas<>""){
					$stgl_mulai="p.tgl_mulai, ";
					$tgl_mulai="AND (p.tgl_mulai BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_mulai";
				}else{
					$stgl_mulai="p.tgl_mulai, ";
					$tgl_mulai="";
					$kolom[]="tgl_mulai";
				}
			}else{
				$stgl_mulai="";
				$tgl_mulai="";
			}

			if(isset($post_tgl_masuk)){
				list($bawah, $atas)=explode(" - ",$post_tgl_masuk);
				if($bawah<>"" AND $atas<>""){
					$stgl_masuk="p.tgl_masuk, ";
					$tgl_masuk="AND (p.tgl_mulai BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_masuk";
				}else{
					$stgl_masuk="p.tgl_masuk, ";
					$tgl_masuk="";
					$kolom[]="tgl_masuk";
				}
			}else{
				$stgl_masuk="";
				$tgl_masuk="";
			}

			if(isset($post_tgl_capeg)){
				list($bawah, $atas)=explode(" - ",$post_tgl_capeg);
				if($bawah<>"" AND $atas<>""){
					$stgl_capeg="p.tgl_capeg, ";
					$tgl_capeg="AND (p.tgl_mulai BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_capeg";
				}else{
					$stgl_capeg="p.tgl_capeg, ";
					$tgl_capeg="";
					$kolom[]="tgl_capeg";
				}
			}else{
				$stgl_capeg="";
				$tgl_capeg="";
			}

			if(isset($post_tgl_pegawai)){
				list($bawah, $atas)=explode(" - ",$post_tgl_pegawai);
				if($bawah<>"" AND $atas<>""){
					$stgl_pegawai="p.tgl_peg, ";
					$tgl_pegawai="AND (p.tgl_peg BETWEEN '$bawah' AND '$atas')";
					$kolom[]="tgl_peg";
				}else{
					$stgl_pegawai="p.tgl_peg, ";
					$tgl_pegawai="";
					$kolom[]="tgl_peg";
				}
			}else{
				$stgl_pegawai="";
				$tgl_pegawai="";
			}

			if(isset($post_umur)){
				list($bawah, $atas)=explode(";",$post_umur);
				$sumur=" YEAR(CURDATE()) - YEAR(p.birthdate) AS umur, ";
				$umur="AND (YEAR(CURDATE()) - YEAR(p.birthdate) BETWEEN $bawah AND $atas)";
				$kolom[]="umur";
			}else{
				$sumur="";
				$umur="";
			}

			$select=substr(trim("$snip $snama $sjabatan $sorg_unit $scost_ctr $semail $spend_terakhir $stitle $ssecond_title $lv $sskala $sgaji_dasar $semployee_group $sbirthplace $sbirthdate $salamat $skota $skode_pos $sreligious $sgender_key $sgol_darah $sbank $sno_rekening $snama_peg $sno_sk $stgl_sk $stgl_grade $starif_grade $starif_grade_transisi $stunjangan_posisi $stgl_mulai $stgl_masuk $stgl_capeg $stgl_pegawai $sumur"),0,-1);
			$kondisi=trim("$nip $nama $jabatan $org_unit $cost_ctr $email $pend_terakhir $title $second_title $lv $skala $gaji_dasar $employee_group $birthplace $birthdate $alamat $kota $kode_pos $religious $gender_key $gol_darah $bank $no_rekening $nama_peg $no_sk $tgl_sk $tgl_grade $tarif_grade $tarif_grade_transisi $tunjangan_posisi $tgl_mulai $tgl_masuk $tgl_capeg $tgl_pegawai $umur");
			$query="SELECT $select FROM pegawai p, orgunit o, costctr c WHERE p.id_org_unit=o.id_org_unit AND p.id_cost_ctr = c.id_cost_ctr $kondisi";

			$col=implode(";",$kolom);

			try{
				$row = R::dispense('rpegawai');
				$row->judul		= $post_judul_report;
				$row->kolom		= $col;
				$row->kueri		= $query;
				$id = R::store( $row );

				redirect("/admumpln/pegawai/report/view/".$id);

			}catch (Exception $e){
				redirect("/admumpln/pegawai/report");
			}
		}

		if(isset($post_delete)){
			try{
				$id	 =$post_delete;
				$row = R::load('rpegawai',$id);
				R::trash($row);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/pegawai/report");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/pegawai/report");
			}
		}

?>
