<?php
	session_start();
	require_once "db-connect.php";
	require_once "../function/function.php";
	if(isset($post_diklattambah)){
		$nip				= $post_nip;
		$kode_diklat		= $post_kode_diklat;
		$tgl_mulai			= $post_tgl_mulai;
		$tgl_selesai		= $post_tgl_selesai;
		$penyelenggara		= $post_penyelenggara;
		$lokasi				= $post_lokasi;
		$bidang_diklat		= $post_bidang_diklat;
		$nilai				= $post_nilai;
		try{
			$row = R::dispense('diklat');
			$row->nip				= $nip;
			$row->kode_diklat		= $kode_diklat;
			$row->tgl_mulai			= $tgl_mulai;
			$row->tgl_selesai		= $tgl_selesai;
			$row->penyelenggara		= $penyelenggara;
			$row->lokasi			= $lokasi;
			$row->bidang_diklat		= $bidang_diklat;
			$row->nilai				= $nilai;
			$id = R::store( $row );
			redirect("/admumpln/diklat/tambah/$id");
			$_SESSION['admumAlert']='1';
		}catch (Exception $e){
			redirect("/admumpln/diklat/tambah/$id");
			$_SESSION['admumAlert']='0';
			$_SESSION['admumMessage']= $e->getMessage();
		}
	}

	if(isset($post_diklatreport)){
		if ($post_diklatreport=="Edit"){
			$id				= $post_id;
			$nip				= $post_nip;
			$kode_diklat		= $post_kode_diklat;
			$tgl_mulai			= $post_tgl_mulai;
			$tgl_selesai		= $post_tgl_selesai;
			$penyelenggara		= $post_penyelenggara;
			$lokasi				= $post_lokasi;
			$bidang_diklat		= $post_bidang_diklat;
			$nilai				= $post_nilai;
			try{
				$row = R::load('diklat', $id);
				$row->nip				= $nip;
				$row->kode_diklat		= $kode_diklat;
				$row->tgl_mulai			= $tgl_mulai;
				$row->tgl_selesai		= $tgl_selesai;
				$row->penyelenggara		= $penyelenggara;
				$row->lokasi			= $lokasi;
				$row->bidang_diklat		= $bidang_diklat;
				$row->nilai				= $nilai;
				$id = R::store( $row );
				redirect("/admumpln/diklat/report/edit/$id");
				$_SESSION['admumAlert']='1';
			}catch (Exception $e){
				redirect("/admumpln/diklat/report/edit/$id");
				$_SESSION['admumAlert']='0';
				$_SESSION['admumMessage']= $e->getMessage();
			}
		}else {
			$id		= $post_diklatreport;
			try{
				$row = R::load('diklat',$id);
				R::trash($row);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/diklat/report");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/diklat/report");
			}
		}
	}

	if(isset($post_diklatdata)){
		if ($post_diklatdata=="Simpan"){
			$kode_diklat	= $post_kode_diklat;
			$judul_diklat	= $post_judul_diklat;
			$bidang			= $post_bidang;
			$edisi			= $post_edisi;
			$kelompok		= $post_kelompok;
			try{
				$row = R::dispense('diklatdata');
				$row->kode_diklat	= $kode_diklat;
				$row->judul_diklat	= $judul_diklat;
				$row->bidang		= $bidang;
				$row->edisi			= $edisi;
				$row->kelompok		= $kelompok;
				$id = R::store( $row );

				redirect("/admumpln/diklat/data");
				$_SESSION['admumAlert']='1';

			}catch (Exception $e){
				redirect("/admumpln/diklat/data");
				$_SESSION['admumAlert']='0';
			}
		}
		else if($post_diklatdata=="Edit"){
			$id				= $post_id;
			$kode_diklat	= $post_kode_diklat;
			$judul_diklat	= $post_judul_diklat;
			$bidang			= $post_bidang;
			$edisi			= $post_edisi;
			$kelompok		= $post_kelompok;
			try{
				$row = R::load('diklatdata',$id);
				$row->kode_diklat	= $kode_diklat;
				$row->judul_diklat	= $judul_diklat;
				$row->bidang		= $bidang;
				$row->edisi			= $edisi;
				$row->kelompok		= $kelompok;
				$id = R::store( $row );

				redirect("/admumpln/diklat/data");
				$_SESSION['admumAlert']='1';

			}catch (Exception $e){
				redirect("/admumpln/diklat/data");
				$_SESSION['admumAlert']='0';
			}
		}else{
			$id		= $post_diklatdata;
			try{
				$row = R::load('diklatdata',$id);
				R::trash($row);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/diklat/data");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/diklat/data");
			}
		}
	}

	if(isset($post_diklatupload)){
		require_once "excel_reader.php";
		$target = basename($_FILES['file']['name']) ;
		move_uploaded_file($_FILES['file']['tmp_name'], $target);

		$data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

		$baris = $data->rowcount($sheet_index=0);

		for ($i=2; $i<=$baris; $i++){
			$kode_diklat	= $data->val($i, 2);
			$judul_diklat	= $data->val($i, 3);
			$bidang			= $data->val($i, 4);
			$edisi			= $data->val($i, 5);
			$kelompok		= $data->val($i, 6);

			try{
				$jumlah_diklat = R::count('diklatdata',"kode_diklat=?",[$kode_diklat]);
				if($jumlah_diklat < 1){
					$row = R::dispense('diklatdata');
					$row->kode_diklat	= $kode_diklat;
					$row->judul_diklat	= $judul_diklat;
					$row->bidang		= $bidang;
					$row->edisi			= $edisi;
					$row->kelompok		= $kelompok;
					$id = R::store( $row );

				} else if($jumlah_diklat > 0){
					$row = R::findOne('diklatdata',"kode_diklat=?",[$kode_diklat]);
					$row->kode_diklat	= $kode_diklat;
					$row->judul_diklat	= $judul_diklat;
					$row->bidang		= $bidang;
					$row->edisi			= $edisi;
					$row->kelompok		= $kelompok;
					$id = R::store( $row );

				}

			}catch (Exception $e){
				$admumMessage=$e->getMessage();
				redirect("/admumpln/diklat/data");
				header("location:$page");
				$_SESSION['admumAlert']='2';
				$_SESSION['admumMessage']=$admumMessage;
			}
		}

		unlink($_FILES['file']['name']);
		redirect("/admumpln/diklat/data");
		$_SESSION['admumAlert']='1';
	}

	if (isset($post_diklatreportupload)){
			require_once "excel_reader.php";
	    $target = basename($_FILES['file']['name']) ;
	    move_uploaded_file($_FILES['file']['tmp_name'], $target);

	    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

	    $baris = $data->rowcount($sheet_index=0);

	    for ($i=2; $i<=$baris; $i++)
	    {
			$nip	        = $data->val($i, 2);
	    $kode_diklat	= $data->val($i, 6);
	    $nama_diklat	= $data->val($i, 7);
	    $tgl_mulai    = $data->val($i, 8);
	    $tgl_selesai  = $data->val($i, 9);
	    $penyelenggara= $data->val($i, 10);
	    $lokasi       = $data->val($i, 11);
	    $bidang_diklat= $data->val($i, 17);
	    $nilai        = $data->val($i, 13);
	    $nilai        = str_replace(',','.',$nilai);

			try{
	      R::begin();
				$jumlah_report = R::count('diklat',"nip='$nip' AND kode_diklat='$kode_diklat'");
				if($jumlah_report < 1){
					$row = R::dispense('diklat');
	        $row->nip       	  = $nip;
					$row->kode_diklat	  = $kode_diklat;
	        $row->tgl_mulai 	  = $tgl_mulai;
	        $row->tgl_selesai	  = $tgl_selesai;
	        $row->penyelenggara = $penyelenggara;
	        $row->lokasi    	  = $lokasi;
	        $row->bidang_diklat	= $bidang_diklat;
	        $row->nilai     	  = $nilai;

					$id = R::store( $row );

				} else if($jumlah_report > 0){
					$row = R::findOne('diklat',"nip=$nip AND kode_diklat=$kode_diklat");
	        $row->nip       	  = $nip;
	        $row->kode_diklat	  = $kode_diklat;
	        $row->tgl_mulai 	  = $tgl_mulai;
	        $row->tgl_selesai	  = $tgl_selesai;
	        $row->penyelenggara = $penyelenggara;
	        $row->lokasi    	  = $lokasi;
	        $row->bidang_diklat	= $bidang_diklat;
	        $row->nilai     	  = $nilai;
					$id = R::store( $row );
				}

	      $jumlah_data = R::count('diklatdata',"kode_diklat=?",[$kode_diklat]);
	      if($jumlah_data < 1){
	        $r1 = R::dispense('diklatdata');
	        $r1->kode_diklat = $kode_diklat;
	        $r1->nama_diklat = $nama_diklat;
	        $id1 = R::store( $r1 );
	      }
	      R::commit();

				}catch (Exception $e){
					$admumMessage=$e->getMessage();
					redirect("/admumpln/diklat/report");
					$_SESSION['admumAlert']='2';
					$_SESSION['admumMessage']=$admumMessage;
		      R::rollback();
				}
		  }

			unlink($_FILES['file']['name']);
			$_SESSION['admumAlert']='1';
			redirect("/admumpln/diklat/report");
	}
?>
