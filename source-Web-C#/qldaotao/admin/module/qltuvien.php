<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$name=isset($_POST['name']) ? filter_data($_POST['name']) : '';
$slquanhuyen=isset($_POST['slQuanHuyen']) ? $_POST['slQuanHuyen'] : 0;
$short=isset($_POST['short']) ? filter_data($_POST['short']) : '';
$address=isset($_POST['address']) ? filter_data($_POST['address']) : '';
$phone=isset($_POST['phone']) ? filter_data($_POST['phone']) : '';
$description=isset($_POST['description']) ? addslashes(htmlentities($_POST['description'])) : '';
switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			//echo stripslashes(html_entity_decode($description)); die();
			$taptin=$_FILES['image'];
			if(empty($name) || $slquanhuyen==0 || empty($address) || empty($short)){
				show_error("Điền tất cả các trường có dấu (*)!");
				include_once "layout/qltuvien/add.php";
				exit();
			}
				
			if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
				if($taptin['size']<=2097152)
					$tentaptin=$taptin['name'];
				else{
					show_error("Dung lượng vượt quá 2Mb");
					include_once "layout/qltuvien/add.php";
					exit();
				}
			}
			else{
				show_error("Định dạng file ảnh không đúng");
				include_once "layout/qltuvien/add.php";
				exit();
			}
			
			$sql="INSERT INTO `tu_vien`(`tv_ten`, `tv_tomtat`, `tv_dienthoai`, `tv_diachi`, `tv_tieusu`, `qh_id`, `tv_trangthai`) 
				  VALUES ('$name', '$short', '$phone', '$address', '$description', '$slquanhuyen', 1)";
			$rs=mysqli_query($con, $sql);
			//echo $sql;
			if(!$rs) die("Lỗi truy vấn CSDL tuvien!");
			$tv_id=mysqli_insert_id($con);
			
			if(empty($taptin['name']))
				$tentaptin="no_image.gif";
			else{
				$tentaptin=$tv_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/tuvien/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/tuvien/".$tentaptin);
			}
			
			$sql="INSERT INTO hinh_tu_vien (htv_url, htv_trangthai, tv_id) 
				  VALUES ('$tentaptin',1,$tv_id)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		include_once "layout/qltuvien/add.php";
		break;
	case "edit":
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		if($tv_id<=0 || !is_numeric($tv_id))
			redirect("404.html",0);
		$sql="SELECT * FROM tu_vien tv, quan_huyen qh, hinh_tu_vien htv 
			  WHERE tv.qh_id=qh.qh_id AND htv.tv_id=tv.tv_id AND tv.tv_id=$tv_id AND htv.htv_trangthai=1 LIMIT 1";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		if(mysqli_num_rows($qr)>0)
			$row=mysqli_fetch_array($qr);
		else
			redirect("index.php?page=qltuvien",0);
		
		if(isset($_POST['submit'])){
			if(empty($name) || $slquanhuyen==0 || empty($address) || empty($short)){
				show_error("Không được bỏ trống! (ngoại trừ tiểu sử)");
				include_once "layout/qltuvien/edit.php";
				exit();
			}
			else{
				$sql="UPDATE `tu_vien` SET `tv_ten`='$name', `tv_tomtat`='$short',`tv_dienthoai`='$phone',`tv_diachi`='$address',`tv_tieusu`='$description', `qh_id`=$slquanhuyen WHERE tv_id=$tv_id";
				$qr=mysqli_query($con, $sql);
				if(!$qr) 
					die("Lỗi truy vấn CSDL!");
				else
					redirect("index.php?page=qltuvien&act=edit&tv_id=$tv_id",0);
			}
		}
			
		include_once "layout/qltuvien/edit.php";
		break;
	case "editimg":
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		if(isset($_POST['submit'])){
			$taptin=$_FILES['image'];
			if(empty($taptin['name'])){
				show_error("Tập tin không được bỏ trống!");
				include_once "layout/qltuvien/editimg.php";
				exit();
			}
			if($taptin['type']=="image/jpg" || $taptin['type']=="image/png" ||$taptin['type']=="image/jpeg" || $taptin['type']=="image/gif"){
				if($taptin['size']<=2097152)
					$tentaptin=$taptin['name'];
				else{
					show_error("Dung luong vuot qua 2Mb");
					include_once "layout/qltuvien/editimg.php";
					exit();
				}
			}
			else{
				show_error("Dinh dang file anh khong dung");
				include_once "layout/qltuvien/add.php";
				exit();
			}
			$tentaptin=$tv_id."_".$taptin['name'];
			copy($taptin['tmp_name'],"../img/tuvien/".$tentaptin);
			$image_1 = new SimpleImage();
			$image_1->load($taptin['tmp_name']);
			$image_1->resize(400,300);
			$image_1->save("../img/tuvien/".$tentaptin);
			$sql="INSERT INTO `hinh_tu_vien`(`htv_url`, `htv_trangthai`, `tv_id`) VALUES ('$tentaptin',0,$tv_id)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			else redirect("?page=qltuvien&act=editimg&tv_id=$tv_id", 0);
		}
		if(isset($_POST['avatar'])){
			$tv_id=isset($_POST['tv_id']) ? filter_data($_POST['tv_id']) : 0;
			$htv_id=isset($_POST['htv_id']) ? filter_data($_POST['htv_id']) : 0;
			$sql="UPDATE `hinh_tu_vien` SET `htv_trangthai`=0 WHERE tv_id=$tv_id AND htv_trangthai=1";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			$sql="UPDATE `hinh_tu_vien` SET `htv_trangthai`=1 WHERE htv_id=$htv_id";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		$confirm="";
		$htv_id=isset($_GET['htv_id']) ? filter_data($_GET['htv_id']) : 0;
		if($htv_id>0 && is_numeric($htv_id)){
			$confirm="yes";
		}
		if(isset($_POST['delete'])){
			$confirm="";
			$tv_id=isset($_POST['tv_id']) ? filter_data($_POST['tv_id']) : 0;
			$htv_id=isset($_POST['htv_id']) ? filter_data($_POST['htv_id']) : 0;
			$sql="SELECT * FROM hinh_tu_vien WHERE tv_id=$tv_id LIMIT 3";
			$qr=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($qr);
			if(!$qr) die("Lỗi truy vấn CSDL 1 !");
			if(mysqli_num_rows($qr)==1){
				show_info("Không thể xóa ảnh cuối cùng!");
			}
			else{
				$sql0="SELECT * FROM hinh_tu_vien WHERE htv_id=$htv_id";
				$qr0=mysqli_query($con, $sql0);
				if(!$qr0) die("Lỗi truy vấn CSDL 1 !");
				$row0=mysqli_fetch_array($qr0);
				
				unlink("../img/tuvien/".$row0['htv_url']);
				$sql1="DELETE FROM `hinh_tu_vien` WHERE htv_id=$htv_id";
				$qr1=mysqli_query($con, $sql1);
				if(!$qr1) die("Lỗi truy vấn CSDL 2!");
				
				if($row0['htv_trangthai']==1){
					$sql2="UPDATE `hinh_tu_vien` SET `htv_trangthai`=1 WHERE tv_id=$tv_id LIMIT 1";
					$qr2=mysqli_query($con, $sql2);
					if(!$qr2) die("Lỗi truy vấn CSDL 3!");
				}	
			}
		}
		include_once "layout/qltuvien/editimg.php";
		break;
	case "detail":
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		if($tv_id<=0 || !is_numeric($tv_id))
			redirect("404.html",0);
		include_once "layout/qltuvien/detail.php";
		break;
	case "list":
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		$ns_id=isset($_GET['ns_id']) ? filter_data($_GET['ns_id']) : 0;
		if($tv_id<=0 || !is_numeric($tv_id) || $ns_id<0 || !is_numeric($ns_id))
			redirect("404.html",0);
		include_once "layout/qltuvien/list.php";
		break;
	case "deletepeople":
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		$ns_id=isset($_GET['ns_id']) ? filter_data($_GET['ns_id']) : 0;
		if(isset($_POST['delete'])){
			$ns_id=isset($_POST['ns_id']) ? filter_data($_POST['ns_id']) : 0;
			$sql="DELETE FROM nhan_su WHERE ns_id=$ns_id";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			redirect("index.php?page=qltuvien&act=list&tv_id=$tv_id",0);
		}
	
		$sql="SELECT * FROM tuvien_nhansu WHERE ns_id=$ns_id"; 
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$count=mysqli_num_rows($qr); //thuoc bao nhieu chua
		if($count<=0) redirect("404.html",0);
		if($count>1){
			$sql="DELETE FROM tuvien_nhansu WHERE tv_id=$tv_id AND ns_id=$ns_id";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			redirect("index.php?page=qltuvien&act=list&tv_id=$tv_id");
		}
		if($count==1){
			$confirm="yes";
			include_once "layout/qltuvien/list.php";
		}
		break;
	case "delete":
		$confirm="yes";
		$tv_id=isset($_GET['tv_id']) ? filter_data($_GET['tv_id']) : 0;
		if($tv_id<=0 || !is_numeric($tv_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT * FROM hinh_tu_vien WHERE tv_id=$tv_id";
			$qr=mysqli_query($con, $sql);
			while($row=mysqli_fetch_array($qr)){
				unlink("../img/tuvien/".$row['htv_url']);
			}
			$sql1="SELECT ns.ns_id, tv_ns.ns_id, hns.ns_id, hns.hns_url, tv_id  FROM nhan_su ns, tuvien_nhansu tv_ns, hinh_nhan_su hns 
				   WHERE tv_ns.ns_id=ns.ns_id AND hns.ns_id=ns.ns_id AND tv_ns.tv_id=$tv_id";
			$qr1=mysqli_query($con, $sql1);
			if(!$qr1) die("Lỗi truy vấn CSDL!");
			while($row1=mysqli_fetch_array($qr1)){
				if(strcmp($row1['hns_url'], "no_image.gif")!=0)
					unlink("../img/nhansu/".$row1['hns_url']);
				$sql3="DELETE FROM nhan_su WHERE ns_id=$row1[ns_id]";
				$qr3=mysqli_query($con, $sql3);
				if(!$qr3) die("Lỗi truy vấn CSDL!");
			}
			$sql2="DELETE FROM tu_vien WHERE tv_id=$tv_id";
			$qr2=mysqli_query($con, $sql2);
			redirect("index.php?page=qltuvien",0);
		}
		include_once "layout/qltuvien/index.php";
		break;
	default:
		include_once "layout/qltuvien/index.php";
		break;
}
?>