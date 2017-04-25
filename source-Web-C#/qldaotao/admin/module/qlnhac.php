<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';
$an_id=isset($_GET['an_id']) ? filter_data($_GET['an_id']) : 0;
$date=date("Y-m-d");
switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			$taptin=$_FILES['music'];
			$tennhac=isset($_POST['name']) ? filter_data($_POST['name']) : '';
			if(empty($taptin['name']) || empty($tennhac)){
				show_error("Điền đầy đủ tất cả các trường!");
				include_once "layout/qlnhac/add.php";
				exit();
			}
			else{
				$tentaptin=time()."_"."$taptin[name]";
				//var_dump($_FILES['music']);
				if ( !preg_match('/^[a-z0-9\_\-][a-z0-9\_\-\.]*$/i', "$tentaptin") ) {
					echo "<script>alert('Tên file không hợp lệ hoặc file không tồn tại!'); </script>";		
					redirect("index.php?page=qlnhac",0);
					exit();
				} //end if
				if($taptin['type']=="audio/mp3" || $taptin['type']=="audio/x-ms-wma"){
					copy($taptin['tmp_name'],"../file/music/".$tentaptin);
					$sql="INSERT INTO `am_nhac`(`an_tenfile`, `an_url`, `an_luottai`, `an_luotnghe`, `an_ngaydang`, `an_trangthai`) 
						  VALUES ('$tennhac','$tentaptin',0,0,'$date',1)";
					$rs=mysqli_query($con, $sql);
					if(!$rs) die("Lỗi truy vấn CSDL!");
					redirect("index.php?page=qlnhac",0);
				}
				else{
					show_error("Định dạng file phải là mp3 hoặc wma!");
					include_once "layout/qlnhac/add.php";
					exit();
				}
			}
		}
		include_once "layout/qlnhac/add.php";
		break;
	case "edit":
		break;
	case "delete":
		$confirm="yes";
		if($an_id<=0 || !is_numeric($an_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT * FROM am_nhac WHERE an_id=$an_id";
			$qr=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($qr);
			unlink("../file/music/".$row['an_url']);

			$sql2="DELETE FROM am_nhac WHERE an_id=$an_id";
			$qr2=mysqli_query($con, $sql2);
			redirect("index.php?page=qlnhac",0);
		}
		include_once "layout/qlnhac/index.php";
		break;
	default:
		include_once "layout/qlnhac/index.php";
		break;
}
?>