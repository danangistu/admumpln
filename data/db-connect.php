<?php
	require_once "rb.php";
	$conn = R::setup( 'mysql:host=localhost;dbname=admumpln','root', '' );
	R::freeze(TRUE);
	if(!$conn) die("Koneksi gagal");
	//error_reporting(0);
?>
