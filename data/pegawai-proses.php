<?php
	session_start();
	require_once "db-connect.php";
	require_once "../function/function.php";
	if(isset($post_submit)){
		if($post_submit == "Simpan"){
			$nip				= $post_nip;
			$nama   			= $post_nama;
			$jabatan			= $post_jabatan;
			$id_org_unit		= $post_org_unit;
			$title				= $post_title;
			$second_title		= $post_second_title;
			$lv					= $post_lv;
			$skala_gaji_dasar	= $post_skala_gaji_dasar;
			$gaji_dasar			= $post_gaji_dasar;
			$id_cost_ctr		= $post_cost_ctr;
			$pend_terakhir		= $post_pend_terakhir;
			$birthplace			= $post_birthplace;
			$gender_key			= $post_gender_key;
			$religious			= $post_religious;
			$gol_darah			= $post_gol_darah;
			$alamat				= $post_alamat;
			$kota				= $post_kota;
			$kode_pos			= $post_kode_pos;
			$employee_group		= $post_employee_group;
			$email				= $post_email;
			$bank				= $post_bank;
			$no_rekening		= $post_no_rekening;
			$nama_peg			= $post_nama_peg;
			$no_sk				= $post_no_sk;
			$tgl_mulai			= $post_tgl_mulai;
			$tgl_grade			= $post_tgl_grade;
			$tarif_grade		= $post_tarif_grade;
			$tarif_grade_transisi = $post_tarif_grade_transisi;
			$tunjangan_posisi	  = $post_tunjangan_posisi;
			$tgl_masuk			= $post_tgl_masuk;
			$tgl_capeg			= $post_tgl_capeg;
			$tgl_peg			= $post_tgl_peg;
			if($post_birthdate=='') $birthdate		= new DateTime('today');
			else $birthdate		= $post_birthdate;
			$biday = new DateTime($birthday);
			$today = new DateTime();
			$umur = $today->diff($biday);
			$tgl_sk				= $post_tgl_sk;
			$foto				= "basic.png";
			try{
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
				redirect("/admumpln/pegawai/tambah/".$id);
				$_SESSION['admumAlert']='1';
			}catch (Exception $e){
				redirect("/admumpln/pegawai/tambah/".$id);
				$_SESSION['admumAlert']='0';
			}
		}
		else if($post_submit=="Edit"){
			$id					= $post_id;
			$nip				= $post_nip;
			$nama   			= $post_nama;
			$jabatan			= $post_jabatan;
			$id_org_unit		= $post_org_unit;
			$title				= $post_title;
			$second_title		= $post_second_title;
			$lv					= $post_lv;
			$skala_gaji_dasar	= $post_skala_gaji_dasar;
			$gaji_dasar			= $post_gaji_dasar;
			$id_cost_ctr		= $post_cost_ctr;
			$pend_terakhir		= $post_pend_terakhir;
			$birthplace			= $post_birthplace;
			$gender_key			= $post_gender_key;
			$religious			= $post_religious;
			$gol_darah			= $post_gol_darah;
			$alamat				= $post_alamat;
			$kota				= $post_kota;
			$kode_pos			= $post_kode_pos;
			$employee_group		= $post_employee_group;
			$email				= $post_email;
			$bank				= $post_bank;
			$no_rekening		= $post_no_rekening;
			$nama_peg			= $post_nama_peg;
			$no_sk				= $post_no_sk;
			$tgl_mulai			= $post_tgl_mulai;
			$tgl_grade			= $post_tgl_grade;
			$tarif_grade		= $post_tarif_grade;
			$tarif_grade_transisi = $post_tarif_grade_transisi;
			$tunjangan_posisi	  = $post_tunjangan_posisi;
			$tgl_masuk			= $post_tgl_masuk;
			$tgl_capeg			= $post_tgl_capeg;
			$tgl_peg			= $post_tgl_peg;
			if($post_birthdate=='') $birthdate		= new DateTime('today');
			else $birthdate		= $post_birthdate;
			$biday = new DateTime($birthday);
			$today = new DateTime();
			$umur = $today->diff($biday);
			$tgl_sk				= $post_tgl_sk;

			try{
				$row = R::load('pegawai',$id);
				$row->nip				= $nip;
				$row->nama				= $nama;
				$row->jabatan			= $jabatan;
				$row->id_org_unit		= $id_org_unit;
				$row->title				= $title;
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
				$id = R::store( $row );

				$r3 = R::dispense('user');
				$r3->nip      = $nip;
        $r3->username	= $nip;
        $r3->password	= md5($nip);
        $r3->level  	= 'User';
				$r3->role   	= '1,11';
				$id3 = R::store( $r3 );

				redirect("/admumpln/pegawai/edit/".$id);
				$_SESSION['admumAlert']='1';
			}catch (Exception $e){
				redirect("/admumpln/pegawai/edit/".$id);
				$_SESSION['admumAlert']='0';
			}
		}else if ($post_submit=="Foto"){
			$id		= $post_id;
			$foto	= $post_foto;
			if ($_FILES["file"]["error"] > 0) {
				redirect("/admumpln/pegawai/detail/".$id);
				$_SESSION['admumAlert']='0';
			} else {
				@mkdir('/admumpln/foto/pegawai');
				$file=$id." ".$_FILES["file"]["name"];
				if($foto <> 'basic.png'){
					if(file_exists('/admumpln/foto/pegawai/'.$foto)){
						unlink('/admumpln/foto/pegawai/'.$foto);
					}
				}
				try{
					$row = R::load('pegawai',$id);
					$row->foto	= $file;
					$id = R::store( $row );
					move_uploaded_file($_FILES["file"]["tmp_name"],"../foto/pegawai/".$file);
					$_SESSION['admumAlert']='1';
					redirect("/admumpln/pegawai/detail/".$id);
				} catch (Exception $e){
					$_SESSION['admumAlert']='0';
					$_SESSION['admumMessage']=$e->getMessage();
					redirect("/admumpln/pegawai/detail/".$id);
			}
		}
	}
		else {
			$id		= $post_submit;
			$del 	= R::load('pegawai',$id);
			$fname	= $del['foto'];
			$nip  	= $del['nip'];
			if($fname<>'basic.png'){
				if(file_exists('/admumpln/foto/pegawai/'.$fname)){
					unlink('/admumpln/foto/pegawai/'.$fname);
				}
			}
			try{
				$row = R::load('pegawai',$id);
				R::trash($row);
				$del_user = R::findOne('user',"nip=?",[$nip]);
				R::trash($del_user);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/pegawai");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/pegawai");
			}
		}
	}
?>
