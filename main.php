<?php
	require_once "function/function.php";
	require_once "data/db-connect.php";

	session_start();
	if (!isset($_SESSION['admumUName']) || empty($_SESSION['admumUName'])) {
		header('location:/admumpln/login');
	}
	$admumUName	= ucwords($_SESSION['admumUName']);
	$admumNip	= $_SESSION['admumNip'];
	if(isset($get_page)) $page = $get_page; else $page = "";
	if(isset($get_sub)) $sub	= $get_sub; else $sub = "";
	if(isset($get_act)) $act = $get_act; else $act = "";
	if(isset($get_id)) $id = $get_id; else $id = "";

	//get foto profil
	if ($_SESSION['admumNip']=='') $image='basic.png';
	else{
		$admumUser 	 = R::getRow("SELECT p.foto FROM pegawai p WHERE p.nip='$admumNip'");
		$image = $admumUser['foto'];
	}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:50:18 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Admum PLN | Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<?php
		if ($page=="home") include "lib/dashboard-css.php";
		else include "lib/view-css.php";
	?>
	<link rel="icon" href="/admumpln/assets/img/favicon.ico" type="image/x-icon" />
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<?php
			$rolemenu = explode(',',$_SESSION['admumRole']);
			require_once "main-header.php";
			require_once "main-sidebar.php";
			authorize($page, $rolemenu, 'home', 'a', 'dashboard.php');
			authorize($page, $rolemenu, 'pegawai', 'b', 'pegawai.php');
			authorize($page, $rolemenu, 'pensiun', 'b', 'pensiun.php');
			authorize($page, $rolemenu, 'diklat', 'c', 'diklat.php');
			authorize($page, $rolemenu, 'talenta', 'd', 'talenta.php');
			authorize($page, $rolemenu, 'pendidikan', 'f', 'pendidikan.php');
			authorize($page, $rolemenu, 'pkl', 'g', 'pkl.php');
			authorize($page, $rolemenu, 'satpam', 'h', 'satpam.php');
			authorize($page, $rolemenu, 'user', 'i', 'user.php');
			if ($page == "profil") include "profil.php";

		?>
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

</body>
<?php
	if ($page == "home") include "lib/dashboard-js.php";
	else if ($page == "pkl" && $sub=="chart") include "lib/chart-js.php";
	else include "lib/view-js.php";
?>
</html>
