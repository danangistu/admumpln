<?php
	session_start();
	require_once "db-connect.php";
	require_once "../function/function.php";
	if (isset($post_pklupload)){
			require_once "excel_reader.php";
	    $target = basename($_FILES['file']['name']) ;
	    move_uploaded_file($_FILES['file']['tmp_name'], $target);

	    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

	    $baris = $data->rowcount($sheet_index=0);

	    for ($i=2; $i<=$baris; $i++)
	    {
			$nama	        = $data->val($i, 2);
	    $status 			= $data->val($i, 3);
	    $sekolah 			= $data->val($i, 4);
	    $pendidikan   = $data->val($i, 5);
	    $fakultas 	  = $data->val($i, 6);
	    $jurusan			= $data->val($i, 7);
	    $tgl_mulai    = $data->val($i, 8);
	    $tgl_selesai  = $data->val($i, 9);
			$lokasi       = $data->val($i, 11);
	    $mentor       = $data->val($i, 12);

			try{
				$jumlah_report = R::count('pkl',"nama='$nama' AND tgl_mulai='$tgl_mulai'");
				if($jumlah_report < 1){
					$row = R::dispense('pkl');
	        $row->nama       	= $nama;
					$row->status	  	= $status;
	        $row->sekolah 	  = $sekolah;
	        $row->pendidikan  = $pendidikan;
	        $row->fakultas		= $fakultas;
	        $row->jurusan  	  = $jurusan;
	        $row->tgl_mulai		= $tgl_mulai;
	        $row->tgl_selesai	= $tgl_selesai;
					$row->lokasi			= $lokasi;
					$row->mentor 			= $mentor;
					$id = R::store( $row );

				} else if($jumlah_report > 0){
					$row = R::findOne('pkl',"nama='$nama' AND status='$status'");
					$row->status	  	= $status;
	        $row->sekolah 	  = $sekolah;
	        $row->pendidikan  = $pendidikan;
	        $row->fakultas		= $fakultas;
	        $row->jurusan  	  = $jurusan;
	        $row->tgl_mulai		= $tgl_mulai;
	        $row->tgl_selesai	= $tgl_selesai;
					$row->lokasi			= $lokasi;
					$row->mentor 			= $mentor;
					$id = R::store( $row );
				}

				} catch (Exception $e){
					$admumMessage=$e->getMessage();
					redirect("/admumpln/pkl");
					$_SESSION['admumAlert']='2';
					$_SESSION['admumMessage']=$admumMessage;
				}
		  }

			unlink($_FILES['file']['name']);
			$_SESSION['admumAlert']='1';
			redirect("/admumpln/pkl");
	}

	if (isset($post_submit)){
		if($post_submit=="Tambah"){
			$nama	        = $post_nama;
	    $status 			= $post_status;
	    $sekolah 			= $post_sekolah;
	    $pendidikan   = $post_pendidikan;
	    $fakultas 	  = $post_fakultas;
	    $jurusan			= $post_jurusan;
	    $tgl_mulai    = $post_tgl_mulai;
	    $tgl_selesai  = $post_tgl_selesai;
			$lokasi       = $post_lokasi;
	    $mentor       = $post_mentor;

			try{
				$row = R::dispense('pkl');
				$row->nama       	= $nama;
				$row->status	  	= $status;
				$row->sekolah 	  = $sekolah;
				$row->pendidikan  = $pendidikan;
				$row->fakultas		= $fakultas;
				$row->jurusan  	  = $jurusan;
				$row->tgl_mulai		= $tgl_mulai;
				$row->tgl_selesai	= $tgl_selesai;
				$row->lokasi			= $lokasi;
				$row->mentor 			= $mentor;
				$id = R::store( $row );
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/pkl");

			}catch (Exception $e){
				$admumMessage=$e->getMessage();
				redirect("/admumpln/pkl");
				$_SESSION['admumAlert']='2';
				$_SESSION['admumMessage']=$admumMessage;
			}
		}
		else if($post_submit=="Edit"){
			$id	        = $post_id;
			$nama	        = $post_nama;
	    $status 			= $post_status;
	    $sekolah 			= $post_sekolah;
	    $pendidikan   = $post_pendidikan;
	    $fakultas 	  = $post_fakultas;
	    $jurusan			= $post_jurusan;
	    $tgl_mulai    = $post_tgl_mulai;
	    $tgl_selesai  = $post_tgl_selesai;
			$lokasi       = $post_lokasi;
	    $mentor       = $post_mentor;

			try{
				$row = R::load('pkl',$id);
				$row->nama       	= $nama;
				$row->status	  	= $status;
				$row->sekolah 	  = $sekolah;
				$row->pendidikan  = $pendidikan;
				$row->fakultas		= $fakultas;
				$row->jurusan  	  = $jurusan;
				$row->tgl_mulai		= $tgl_mulai;
				$row->tgl_selesai	= $tgl_selesai;
				$row->lokasi			= $lokasi;
				$row->mentor 			= $mentor;
				$id = R::store( $row );
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/pkl");

			}catch (Exception $e){
				$admumMessage=$e->getMessage();
				redirect("/admumpln/pkl");
				$_SESSION['admumAlert']='2';
				$_SESSION['admumMessage']=$admumMessage;
			}
		}
		else{
			$id		= $post_submit;
			try{
				$row = R::load('pkl',$id);
				R::trash($row);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/pkl");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/pkl");
			}
		}
	}
?>
