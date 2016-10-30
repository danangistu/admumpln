<?php
require_once "db-connect.php";
require_once "excel_reader.php";
require_once "../function/function.php";
session_start();
//jika tombol import ditekan
if(isset($post_upload)){

    $target = basename($_FILES['file']['name']) ;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);

    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);

    $baris = $data->rowcount($sheet_index=0);

    for ($i=2; $i<=$baris; $i++)
    {
  		$nip		    = $data->val($i, 3);
      $tgl_akhir  = $data->val($i, 16);
      $talenta  	= $data->val($i, 17);
      $tgl_mulai 	= $data->val($i, 19);
      $tgl_selesai= $data->val($i, 20);
      $no_sk      = $data->val($i, 22);
      $tgl_sk     = $data->val($i, 23);
      $nsk        = $data->val($i, 24);
      $sasaran_k  = $data->val($i, 25);
      $nki        = $data->val($i, 26);
  		$isk        = $data->val($i, 27);
  		$active			= "true";
  		try{
  			$jumlah_data = R::count('talenta',"nip='$nip' AND no_sk='$no_sk'");
        if ($jumlah_data< 1){
  				$row = R::dispense('talenta');
          $row->nip				 = $nip;
          $row->tgl_akhir	 = $tgl_akhir;
  				$row->talenta		 = $talenta;
          $row->tgl_mulai	 = $tgl_mulai;
          $row->tgl_selesai= $tgl_selesai;
          $row->no_sk			 = $no_sk;
          $row->tgl_sk		 = $tgl_sk;
          $row->nsk				 = $nsk;
          $row->sasaran_k	 = $sasaran_k;
          $row->nki				 = $nki;
          $row->isk				 = $isk;
          $row->active		 = $active;
  				$id = R::store( $row );
  			}else {
  				$row = R::findOne('talenta',"nip='$nip' AND no_sk='$no_sk'");
          $row->tgl_akhir	 = $tgl_akhir;
  				$row->talenta		 = $talenta;
          $row->tgl_mulai	 = $tgl_mulai;
          $row->tgl_selesai= $tgl_selesai;
          $row->nsk				 = $nsk;
          $row->tgl_sk		 = $tgl_sk;
          $row->sasaran_k	 = $sasaran_k;
          $row->nki				 = $nki;
          $row->isk				 = $isk;
  				$id = R::store( $row );
  			}

  		}catch (Exception $e){
  			$admumMessage=$e->getMessage();
  			R::rollback();
        redirect("/admumpln/talenta");
  			$_SESSION['admumAlert']='2';
  			$_SESSION['admumMessage']=$admumMessage;
  		}
    }

	unlink($_FILES['file']['name']);
	redirect("/admumpln/talenta");
	$_SESSION['admumAlert']='1';
}else {
  redirect("/admumpln/talenta");
	$_SESSION['admumAlert']='2';
}
?>
