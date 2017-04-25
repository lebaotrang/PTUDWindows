<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản trị</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<script src="../js/jquery.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		setInterval(function(){
		  $(".fade").fadeOut('slow')
			$('.fade').fadeOut('slow');},5000);
	});
</script>
</head>
<body>
	<?php
	include_once "../db/dbcon.php";
	include_once "../function/function.php";
	$page="module/";
	if(!isset($_SESSION['admin'])) 
		include_once $page."login.php";
	else {
		if(isset($_GET['page'])){
			$page .= $_GET['page'].".php";
			if($page!=NULL && file_exists($page)){
				include_once "layout/mainmenu.php";
				include_once "module/".$page.".php";	
			}	
			else{
				redirect('404.html', 0);
			}
		}
		else{
			//include_once "layout/mainmenu.php";
			include_once "layout/trangchu.php";
			//include_once $page."qlungvien.php";
		}
	}
	?>
</body>
</html>