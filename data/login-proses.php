<?php
	require_once "db-connect.php";
	require_once "../function/function.php";
	session_start();
	$postdata = file_get_contents("php://input");
	$datalogin = json_decode($postdata);

	$respon 	= "";
	$username = $datalogin->data->username;
	$password = md5($datalogin->data->password);

	try{
		$row=R::findOne("user","username='".$username."' AND password='".$password."'");
		if($row){
			$_SESSION['admumUName'] = $row['username'];
			$_SESSION['admumLvl']   = $row['level'];
			$_SESSION['admumRole']  = $row['role'];
			$respon = "true";
		}
		else $respon = "false";
	}catch(Exception $e){
		$respon = $e->getMessage();
	}

	echo $respon;
?>
