<?php
  session_start();
  require_once "db-connect.php";
  require_once "../function/function.php";
  if(isset($post_submit)){
    if($post_submit=="Tambah"){
  		$nip    	= $post_nip;
  		$tahun			= $post_tahun;
      $lembaga	= $post_lembaga;
  		$tingkat	= $post_tingkat;
      $status		= $post_status;
  		$gelar		= $post_gelar;
  		try{
  			$row = R::dispense('pendidikan');
  			$row->nip	     = $nip;
  			$row->tahun    = $tahun;
        $row->lembaga	 = $lembaga;
  			$row->tingkat	 = $tingkat;
        $row->status	 = $status;
  			$row->gelar	   = $gelar;
  			$id = R::store( $row );

  			redirect("/admumpln/pendidikan");
  			$_SESSION['admumAlert']='1';

  		}catch (Exception $e){
  			redirect("/admumpln/pendidikan");
  			$_SESSION['admumAlert']='0';
  		}
    }
    else if($post_submit=="Edit"){
      $id				= $post_id;
  		$nip    	= $post_nip;
  		$tahun			= $post_tahun;
      $lembaga	= $post_lembaga;
  		$tingkat	= $post_tingkat;
      $status		= $post_status;
  		$gelar		= $post_gelar;
  		try{
  			$row = R::load('pendidikan',$id);
  			$row->nip	     = $nip;
  			$row->tahun    = $tahun;
        $row->lembaga	 = $lembaga;
  			$row->tingkat	 = $tingkat;
        $row->status	 = $status;
  			$row->gelar	   = $gelar;
  			$id = R::store( $row );

  			redirect("/admumpln/pendidikan");
  			$_SESSION['admumAlert']='1';

  		}catch (Exception $e){
  			redirect("/admumpln/pendidikan");
  			$_SESSION['admumAlert']='0';
  		}
    } else {
      $id		= $post_submit;
      try{
        $row = R::load('pendidikan',$id);
        R::trash($row);
        $_SESSION['admumAlert']='1';
        redirect("/admumpln/pendidikan");
      }catch(Exception $e){
        $_SESSION['admumAlert']='0';
        redirect("/admumpln/pendidikan");
      }
    }
  }
?>
