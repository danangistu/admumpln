<?php
require_once "db-connect.php";
require_once "excel_reader.php";
require_once "../function/function.php";
session_start();
//jika tombol import ditekan
if(isset($post_submit)){

    $target = basename($_FILES['file']['name']) ;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);

    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

    $baris = $data->rowcount($sheet_index=0);

    for ($i=2; $i<=$baris; $i++)
    {
		$nip			= $data->val($i, 2);
		$nama   		= $data->val($i, 3);
		$jabatan		= $data->val($i, 5);
		$id_org_unit	= $data->val($i, 6);
		$org_unit		= $data->val($i, 8);
		$title				= $data->val($i, 9);
		$second_title		= $data->val($i, 10);
		$lv					= $data->val($i, 21);
		$skala_gaji_dasar	= $data->val($i, 23);
		$gaji_dasar			= $data->val($i, 30);
		$id_cost_ctr		= $data->val($i, 32);
		$cost_ctr			= $data->val($i, 33);
		$pend_terakhir	= $data->val($i, 42);
		$birthplace		= $data->val($i, 43);
		$gender_key		= $data->val($i, 47);
		$religious		= $data->val($i, 49);
		$gol_darah		= $data->val($i, 51);
		$alamat			= $data->val($i, 53);
		$kota			= $data->val($i, 54);
		$kode_pos		= $data->val($i, 55);
		$employee_group	= $data->val($i, 58);
		$email			= $data->val($i, 52);
		$bank			= ucwords($data->val($i, 65));
		$no_rekening	= $data->val($i, 64);
		$nama_peg		= $data->val($i, 66);
		$no_sk			= $data->val($i, 61);
		$tgl_mulai		= $data->val($i, 62);
		$tgl_grade		= $data->val($i, 22);
		$tarif_grade	= $data->val($i, 24);
		$tarif_grade_transisi = $data->val($i, 26);
		$tunjangan_posisi	  = $data->val($i, 28);
		$tgl_masuk		= $data->val($i, 39);
		$tgl_capeg		= $data->val($i, 40);
		$tgl_peg		= $data->val($i, 41);
		$birthdate		= $data->val($i, 44);
		$umur			= $data->val($i, 45);
		$tgl_sk			= $data->val($i, 62);
		$foto			= "basic.png";
		try{
			R::begin();
			$jumlah_pegawai = R::count('pegawai',"nip=?",[$nip]);
			if($jumlah_pegawai < 1){
				$row = R::dispense('pegawai');
				$row->nip				= $nip;
				$row->nama				= $nama;
				$row->jabatan			= $jabatan;
				$row->id_org_unit		= $id_org_unit;
				$row->title				= $title;
				$row->second_title		= $second_title;
				$row->lv				= $lv;
				$row->skala_gaji_dasar	= $skala_gaji_dasar;
				$row->gaji_dasar		= $gaji_dasar;
				$row->id_cost_ctr		= $id_cost_ctr;
				$row->pend_terakhir		= $pend_terakhir;
				$row->birthplace		= $birthplace;
				$row->gender_key		= $gender_key;
				$row->religious			= $religious;
				$row->gol_darah			= $gol_darah;
				$row->alamat			= $alamat;
				$row->kota				= $kota;
				$row->kode_pos			= $kode_pos;
				$row->employee_group	= $employee_group;
				$row->email				= $email;
				$row->bank				= $bank;
				$row->no_rekening		= $no_rekening;
				$row->nama_peg			= $nama_peg;
				$row->no_sk				= $no_sk;
				$row->tgl_mulai			= $tgl_mulai;
				$row->tgl_grade			= $tgl_grade;
				$row->tarif_grade		= $tarif_grade;
				$row->tarif_grade_transisi	= $tarif_grade_transisi;
				$row->tunjangan_posisi		= $tunjangan_posisi;
				$row->tgl_masuk			= $tgl_masuk;
				$row->tgl_capeg			= $tgl_capeg;
				$row->tgl_peg			= $tgl_peg;
				$row->birthdate			= $birthdate;
				$row->tgl_sk			= $tgl_sk;
				$row->foto				= $foto;
				$id = R::store( $row );

			} else if($jumlah_pegawai > 0){
				$row = R::findOne('pegawai',"nip=?",[$nip]);
				$row->nip				= $nip;
				$row->nama				= $nama;
				$row->jabatan			= $jabatan;
				$row->id_org_unit		= $id_org_unit;
				$row->title				= $title;
				$row->second_title		= $second_title;
				$row->lv				= $lv;
				$row->skala_gaji_dasar	= $skala_gaji_dasar;
				$row->gaji_dasar		= $gaji_dasar;
				$row->id_cost_ctr		= $id_cost_ctr;
				$row->pend_terakhir		= $pend_terakhir;
				$row->birthplace		= $birthplace;
				$row->gender_key		= $gender_key;
				$row->religious			= $religious;
				$row->gol_darah			= $gol_darah;
				$row->alamat			= $alamat;
				$row->kota				= $kota;
				$row->kode_pos			= $kode_pos;
				$row->employee_group	= $employee_group;
				$row->email				= $email;
				$row->bank				= $bank;
				$row->no_rekening		= $no_rekening;
				$row->nama_peg			= $nama_peg;
				$row->no_sk				= $no_sk;
				$row->tgl_mulai			= $tgl_mulai;
				$row->tgl_grade			= $tgl_grade;
				$row->tarif_grade		= $tarif_grade;
				$row->tarif_grade_transisi	= $tarif_grade_transisi;
				$row->tunjangan_posisi		= $tunjangan_posisi;
				$row->tgl_masuk			= $tgl_masuk;
				$row->tgl_capeg			= $tgl_capeg;
				$row->tgl_peg			= $tgl_peg;
				$row->birthdate			= $birthdate;
				$row->tgl_sk			= $tgl_sk;
				$row->foto				= $foto;
				$id = R::store( $row );

			}

			$jumlah_org_unit = R::count('orgunit',"id_org_unit=?",[$id_org_unit]);
			if($jumlah_org_unit < 1){
				$r1 = R::dispense('orgunit');
				$r1->id_org_unit= $id_org_unit;
				$r1->org_unit	= $org_unit;
				$id1 = R::store( $r1 );
			}

			$jumlah_cost_ctr = R::count('costctr',"id_cost_ctr=?",[$id_cost_ctr]);
			if($jumlah_cost_ctr < 1){
				$r2 = R::dispense('costctr');
				$r2->id_cost_ctr= $id_cost_ctr;
				$r2->cost_ctr	= $cost_ctr;
				$id2 = R::store( $r2 );
			}
			R::commit();

		}catch (Exception $e){
			$admumMessage=$e->getMessage();
			R::rollback();
      redirect("/admumpln/pegawai");
			$_SESSION['admumAlert']='2';
			$_SESSION['admumMessage']=$admumMessage;
		}
    }

	unlink($_FILES['file']['name']);
	redirect("/admumpln/pegawai");
	$_SESSION['admumAlert']='1';
}else {
  redirect("/admumpln/pegawai");
	$_SESSION['admumAlert']='2';
}
?>
