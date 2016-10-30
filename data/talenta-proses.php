<?php
require_once "db-connect.php";
require_once "../function/function.php";
session_start();

if(isset($post_submit)){
  if($post_submit=="Tambah"){
    $nip		    = $post_nip;
    $tgl_akhir  = $post_tgl_akhir;
    $talenta  	= $post_talenta;
    $tgl_mulai 	= $post_tgl_mulai;
    $tgl_selesai= $post_tgl_selesai;
    $no_sk      = $post_no_sk;
    $tgl_sk     = $post_tgl_sk;
    $nsk        = $post_nsk;
    $sasaran_k  = $post_sasaran_k;
    $nki        = $post_nki;
    $isk        = $post_isk;
    $active			= "true";
    try{
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
      redirect("/admumpln/talenta");
      $_SESSION['admumAlert']='1';

    }catch (Exception $e){
      $admumMessage=$e->getMessage();
      R::rollback();
      redirect("/admumpln/talenta");
      $_SESSION['admumAlert']='2';
      $_SESSION['admumMessage']=$admumMessage;
    }
  }
  else if($post_submit=="Edit"){
    $id		      = $post_id;
    $nip		    = $post_nip;
    $tgl_akhir  = $post_tgl_akhir;
    $talenta  	= $post_talenta;
    $tgl_mulai 	= $post_tgl_mulai;
    $tgl_selesai= $post_tgl_selesai;
    $no_sk      = $post_no_sk;
    $tgl_sk     = $post_tgl_sk;
    $nsk        = $post_nsk;
    $sasaran_k  = $post_sasaran_k;
    $nki        = $post_nki;
    $isk        = $post_isk;
    try{
      $row = R::load('talenta',$id);
      $row->nip				 = $nip;
      $row->tgl_akhir	 = $tgl_akhir;
      $row->talenta		 = $talenta;
      $row->tgl_mulai	 = $tgl_mulai;
      $row->tgl_selesai= $tgl_selesai;
      $row->no_sk			 = $no_sk;
      $row->nsk				 = $nsk;
      $row->tgl_sk		 = $tgl_sk;
      $row->sasaran_k	 = $sasaran_k;
      $row->nki				 = $nki;
      $row->isk				 = $isk;
      $id = R::store( $row );
      redirect("/admumpln/talenta");
      $_SESSION['admumAlert']='1';

    }catch (Exception $e){
      $admumMessage=$e->getMessage();
      R::rollback();
      redirect("/admumpln/talenta");
      $_SESSION['admumAlert']='2';
      $_SESSION['admumMessage']=$admumMessage;
    }
  }else{
    $id		= $post_submit;
    try{
      $row = R::load('talenta',$id);
      R::trash($row);
      $_SESSION['admumAlert']='1';
      redirect("/admumpln/talenta");
    }catch(Exception $e){
      $_SESSION['admumAlert']='0';
      redirect("/admumpln/talenta");
    }
  }
}
if(isset($post_on)){
  try{
    $row = R::load('pegawai',$post_on);
    $row->talenta_khusus = 'off';
    $id = R::store( $row );
    $_SESSION['admumAlert']='1';
    redirect("/admumpln/talenta/grafik");
  }catch(Exception $e){
    $_SESSION['admumAlert']='0';
    redirect("/admumpln/talenta/grafik");
  }
}
if(isset($post_off)){
  try{
    $row = R::load('pegawai',$post_off);
    $row->talenta_khusus = 'on';
    $id = R::store( $row );
    $_SESSION['admumAlert']='1';
    redirect("/admumpln/talenta/grafik");
  }catch(Exception $e){
    $_SESSION['admumAlert']='0';
    redirect("/admumpln/talenta/grafik");
  }
}
?>
