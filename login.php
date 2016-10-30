<?php
	session_start();
	require_once "function/function.php";
	require_once "data/db-connect.php";
	if (isset($_SESSION['admumUName']) || !empty($_SESSION['admumUName'])) {
		redirect("./home");
	}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>WEB ADMUM | PLN</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="icon" href="/admumpln/assets/img/favicon.ico" type="image/x-icon" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="/admumpln/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/css/animate.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/css/style.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="/admumpln/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<link href="/admumpln/assets/plugins/toastr/toastr.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/admumpln/assets/plugins/pace/pace.min.js"></script>
	<script src="/admumpln/assets/angular/angular.js"></script>
	<script src="/admumpln/assets/angular/login.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body ng-app="Login" ng-controller="LoginCtrl" class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="/admumpln/assets/img/login-bg/bg-7.jpg" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> WEB ADMUM | PLN APP SEMARANG</h4>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> Sistem Login
                        <small>Web Informasi Kepegawaian PLN APP Semarang</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" name="username" placeholder="Username" ng-model="loginText.username" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-lg" name="password" placeholder="Password" ng-model="loginText.password" />
                        </div>
                        <div class="checkbox m-b-30">
                            <label>
                                <input type="checkbox" /> Ingatkan saya!
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" id="login" class="btn btn-success btn-block btn-lg" ng-click="login()">Masuk</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            Not a member yet? Click <a href="register_v3.html" class="text-success">here</a> to register.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; PLN APP Semarang | All Right Reserved 2016
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/admumpln/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="/admumpln/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="/admumpln/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="/admumpln/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="/admumpln/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="/admumpln/assets/crossbrowserjs/respond.min.js"></script>
		<script src="/admumpln/assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="/admumpln/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/admumpln/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="/admumpln/assets/js/apps.min.js"></script>
	<script src="/admumpln/assets/plugins/toastr/toastr.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','/admumpln/assets/js/analytics.js','ga');

      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script>
	<script>
	$(document).ready(function(){
		$("#login").click(function(){
			username=$("#username").val();
			password=$("#password").val();
			$.ajax({
				type: "POST",
				url: "./login-proses.php",
				data: "username="+username+"&password="+password,
				success: function(html){
					if(html=='true'){
						window.location="./main.php?"+"<?php echo paramEncrypt('page=home')?>";
					}
					else{
						toastr.options = {
						  "closeButton": true,
						  "debug": false,
						  "newestOnTop": false,
						  "progressBar": false,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": true,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						}
						Command: toastr["error"]("Password Salah", "Peringatan!")
					}
				},
			});
			return false;
		});
	});
	</script>
</body>
</html>
