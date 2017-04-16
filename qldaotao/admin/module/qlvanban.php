<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$vb_id=isset($_GET['vb_id']) ? filter_data($_GET['vb_id']) : 0;
$name=isset($_POST['name']) ? filter_data($_POST['name']) : '';
$slquanhuyen=isset($_POST['slQuanHuyen']) ? $_POST['slQuanHuyen'] : 0;
$slbannganh=isset($_POST['slBanNganh']) ? $_POST['slBanNganh'] : 0;
$date=isset($_POST['date']) ? $_POST['date'] : '';
$dateEnd=isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
$slloaivb=isset($_POST['slLoaiVB']) ? $_POST['slLoaiVB'] : 0;
$today=date('Y-m-d');
switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			$taptin=$_FILES['image'];
			$taptin1=$_FILES['image1'];
			//var_dump($taptin['type']); exit();
			//if($taptin['type']=="application/msword" || $taptin['type']=="application/pdf"){
			//echo $name."-".$slquanhuyen."-".$slbannganh."-".$date."-".$dateEnd."-".$slloaivb."-".$description;
			if(empty($name) || $slquanhuyen==0 || $slbannganh==0 || empty($date) || $slloaivb==0 || empty($taptin['name'])){
				show_error("Điền đầy đủ các trường có dấu (*)!");
				include_once "layout/qlvanban/add.php";
				exit();
			}
			if($taptin['type']=="application/pdf"){
				if($taptin['size']<=2097152)
					$tentaptin=$taptin['name'];
				else{
					show_error("Dung lượng tập tin vượt quá 2Mb");
					include_once "layout/qlvanban/add.php";
					exit();
				}
			}
			else{
				show_error("Định dạng file phải là .pdf");
				include_once "layout/qlvanban/add.php";
				exit();
			}
			
			if(!empty($taptin1['name'])){
				if($taptin1['type']=="image/jpg" || $taptin1['type']=="image/png" ||$taptin1['type']=="image/jpeg" || $taptin1['type']=="image/gif"){
					if($taptin1['size']<=2097152)
						$tentaptin1=$taptin1['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qlvanban/add.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qlvanban/add.php";
					exit();
				}
				$tentaptin1=$vb_id."_".$taptin1['name'];
				copy($taptin1['tmp_name'],"../img/vanban/".$tentaptin1);
				$image_1 = new SimpleImage();
				$image_1->load($taptin1['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/vanban/".$tentaptin1);
			}
			else
				$tentaptin1="default-img.jpg";
			
			$tentaptin=$vb_id."_".$taptin['name'];
			copy($taptin['tmp_name'],"../file/".$tentaptin);
			
			$sql="INSERT INTO `van_ban`(`vb_ten`, `vb_nguoibanhanh`, `vb_ngaybanhanh`, `vb_ngayketthuc`, `vb_ngaydang`, `vb_url`, `vb_hinhdaidien`, `vb_loai`, `qh_id`, `bn_id`) 
				  VALUES ('$name','','$date','$dateEnd','$today','$tentaptin','$tentaptin1',$slloaivb,$slquanhuyen,$slbannganh)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		include_once "layout/qlvanban/add.php";
		break;
	case "edit":
		$sql="SELECT * FROM van_ban vb, ban_nganh bn, quan_huyen qh WHERE vb.qh_id=qh.qh_id AND vb.bn_id=bn.bn_id AND vb.vb_id=$vb_id";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		if(mysqli_num_rows($qr)<=0)
			redirect("index.php?page=qlvanban", 0);
		else
			$row=mysqli_fetch_array($qr);
		
		if(isset($_POST['submit'])){
			$taptin=$_FILES['image'];
			$taptin1=$_FILES['image1'];
			if(empty($name) || $slquanhuyen==0 || $slbannganh==0 || empty($date) || $slloaivb==0){
				show_error("Điền đầy đủ các trường có dấu (*)!");
				include_once "layout/qlvanban/edit.php";
				exit();
			}
			if(!empty($taptin['name'])){
				if($taptin['type']=="application/pdf"){
					if($taptin['size']<=2097152)
						$tentaptin=$taptin['name'];
					else{
						show_error("Dung lượng tập tin vượt quá 2Mb");
						include_once "layout/qlvanban/edit.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file phải là .pdf");
					include_once "layout/qlvanban/edit.php";
					exit();
				}
			}
			
			if(!empty($taptin1['name'])){
				if($taptin1['type']=="image/jpg" || $taptin1['type']=="image/png" ||$taptin1['type']=="image/jpeg" || $taptin1['type']=="image/gif"){
					if($taptin1['size']<=2097152)
						$tentaptin1=$taptin1['name'];
					else{
						show_error("Dung lượng ảnh vượt quá 2Mb!");
						include_once "layout/qlvanban/edit.php";
						exit();
					}
				}
				else{
					show_error("Định dạng file ảnh không đúng!");
					include_once "layout/qlvanban/edit.php";
					exit();
				}
			}
			
			if(!empty($taptin['name'])){
				unlink("../file/".$row['vb_url']);
				$tentaptin=$vb_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../file/".$tentaptin);
				$sql="UPDATE `van_ban` SET `vb_ten`='$name',`vb_nguoibanhanh`='',`vb_ngaybanhanh`='$date',`vb_ngayketthuc`='$dateEnd',`vb_url`='$tentaptin', `vb_loai`=$slloaivb,`qh_id`=$slquanhuyen,`bn_id`=$slbannganh WHERE vb_id=$vb_id";
			}
			if(!empty($taptin1['name']) && (strcmp($row['vb_hinhdaidien'], "default-img")!=0) ){
				unlink("../img/vanban/".$row['vb_hinhdaidien']);
				$tentaptin1=$vb_id."_".$taptin1['name'];
				copy($taptin1['tmp_name'],"../img/vanban/".$tentaptin1);
				$image_1 = new SimpleImage();
				$image_1->load($taptin1['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/vanban/".$tentaptin1);
				$sql="UPDATE `van_ban` SET `vb_ten`='$name',`vb_nguoibanhanh`='',`vb_ngaybanhanh`='$date',`vb_ngayketthuc`='$dateEnd',`vb_hinhdaidien`='$tentaptin1',`vb_loai`=$slloaivb,`qh_id`=$slquanhuyen,`bn_id`=$slbannganh WHERE vb_id=$vb_id";
			}		
			if(!empty($taptin['name']) && !empty($taptin1['name']))
				$sql="UPDATE `van_ban` SET `vb_ten`='$name',`vb_nguoibanhanh`='',`vb_ngaybanhanh`='$date',`vb_ngayketthuc`='$dateEnd',`vb_url`='$tentaptin', `vb_hinhdaidien`='$tentaptin1', `vb_loai`=$slloaivb,`qh_id`=$slquanhuyen,`bn_id`=$slbannganh WHERE vb_id=$vb_id";
			if(empty($taptin['name']) && empty($taptin1['name']))
				$sql="UPDATE `van_ban` SET `vb_ten`='$name',`vb_nguoibanhanh`='',`vb_ngaybanhanh`='$date',`vb_ngayketthuc`='$dateEnd', `vb_loai`=$slloaivb,`qh_id`=$slquanhuyen,`bn_id`=$slbannganh WHERE vb_id=$vb_id";
			//echo $sql; die();
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			redirect("?page=qlvanban&act=edit&vb_id=$vb_id", 0);
		}
		include_once "layout/qlvanban/edit.php";
		break;
	case "detail":
		include_once "layout/qlvanban/detail.php";
		break;
	case "delete":
		$confirm="yes";
		$vb_id=isset($_GET['vb_id']) ? filter_data($_GET['vb_id']) : 0;
		if($vb_id<=0 || !is_numeric($vb_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT vb_id, vb_url FROM van_ban WHERE vb_id=$vb_id";
			$qr=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($qr);
			unlink("../file/".$row['vb_url']);
			$sql="DELETE FROM van_ban WHERE vb_id=$vb_id";
			$qr=mysqli_query($con, $sql);
			redirect("index.php?page=qlvanban",0);
		}
		include_once "layout/qlvanban/index.php";
		break;
	default:
		include_once "layout/qlvanban/index.php";
		break;
}
?>