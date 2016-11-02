<?php
	require_once "rb.php";
	$conn = R::setup( 'mysql:host=219.83.68.91;dbname=danisnuc_admumpln','danisnuc_admin', 'yukihime27' );
	R::freeze(TRUE);
	if(!$conn) die("Koneksi gagal");
	//error_reporting(0);
?>
