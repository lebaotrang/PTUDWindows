<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo isset($title) ? $title : 'Quản lý đào tạo' ?>-Online</title>
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css">
	<link href="css/style.css" type="text/css" rel="stylesheet"/>
	<script src="js/jquery.js"></script>
	<script src="admin/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
</head>

<body>
	
	<img src="./img/wave.png" style="position: absolute; top: -8%; width: 100%; z-index: -99;">
	
	<?php 
	include_once "./db/dbcon.php"; 
	include_once "./function/function.php";
	?>
	
	<!--<div class="container"  style="background-color:white; padding: 0px;">-->
	<div class="container" style="background-color:white; padding: 0px;">
		<?php 
			if(isset($_SESSION['user_name'])) 
				if(isset($_SESSION['user_quyen']))
					include_once "./layout/menugv.php"; 
				else
					include_once "./layout/menu.php"; 
		?>
	</div>
		
    <div class="container" style="background-color:white;">

        <div class="row">
            
            <div class="col-md-12">
            	<?php
				$page="module/";

				if(!isset($_SESSION['user_name'])) 
					include_once $page."login.php";
				else {

					if(!isset($_SESSION['user_quyen'])){
						$page .= "sinhvien/";
						$mainpage = "layout/main.php";
					}
					else{
						$page .= "giangvien/";
						$mainpage = "layout/maingv.php";
					}

					if(isset($_GET['page'])){

						if($_GET['page']=='logout')
							include_once $page.$_GET['page'].".php";

						$page .= $_GET['page'].".php";
						if($page!=NULL && file_exists($page))
							include_once $page;
						else
							redirect('404.html', 0);
						
					}
					else{
						include_once $mainpage;
					}

				}
				?>
            </div> <!-- col-md-9-->
			
        </div> <!-- end row -->
		
	</div>

	<footer>
		<?php if(isset($_SESSION['user_name'])) include_once "layout/footer.php"; ?>
	</footer>
	
</body>
</html>
