<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
$act=isset($_GET['act']) ? filter_data($_GET['act']) : '';

$ns_id=isset($_GET['ns_id']) ? filter_data($_GET['ns_id']) : 0;
$name=isset($_POST['name']) ? filter_data($_POST['name']) : '';
$pname=isset($_POST['pname']) ? filter_data($_POST['pname']) : '';
$cmnd=isset($_POST['cmnd']) ? filter_data($_POST['cmnd']) : '';
$slnamsinh=isset($_POST['slNamSinh']) ? filter_data($_POST['slNamSinh']) : 0;
$slvanhoa=isset($_POST['slVanHoa']) ? filter_data($_POST['slVanHoa']) : '0/0';
$slphathoc=isset($_POST['slPhatHoc']) ? filter_data($_POST['slPhatHoc']) : '';
$slquanhuyen=isset($_POST['slQuanHuyen']) ? filter_data($_POST['slQuanHuyen']) : 0;
$sltuvien=isset($_POST['slTuVien']) ? filter_data($_POST['slTuVien']) : 0;
$phone=isset($_POST['phone']) ? filter_data($_POST['phone']) : '';
$address=isset($_POST['address']) ? filter_data($_POST['address']) : '';
$description=isset($_POST['description']) ? filter_data($_POST['description']) : '';
$tv_ns_trutri=isset($_POST['tv_ns_trutri']) ? filter_data($_POST['tv_ns_trutri']) : 0;
switch ($act){
	case "add":
		if(isset($_POST['submit'])){
			if(empty($pname) || empty($cmnd) || $slnamsinh==0 || empty($slphathoc) || $sltuvien==0){
				show_error("Điền đầy đủ trường có dấu (*)");
				include_once "layout/qlnhansu/add.php";
				exit();
			}
			
			$taptin=$_FILES['image'];
			if(empty($taptin['name']))
				$tentaptin="no_image.gif";
			else{
				if(!check_image($taptin)){
					include_once "layout/qlnhansu/add.php";
					exit();
				}
				
				$tentaptin=$ns_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/nhansu/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/nhansu/".$tentaptin);
			}
			
			$sql="INSERT INTO `nhan_su`(`ns_hoten`, `ns_phapdanh`, `ns_cmnd`, `ns_namsinh`, `ns_td_vanhoa`, `ns_td_phathoc`, `ns_dienthoai`, `ns_quequan`, `ns_tieusu`, `ns_trangthai`) 
				  VALUES ('$name','$pname','$cmnd','$slnamsinh','$slvanhoa','$slphathoc','$phone','$address','$description',1)";
			$rs=mysqli_query($con, $sql);
			if(!$rs) die("Lỗi truy vấn CSDL!");
			$ns_id=mysqli_insert_id($con);
			
			$sql="INSERT INTO `hinh_nhan_su`(`hns_url`, `ns_id`) VALUES ('$tentaptin',$ns_id)";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL hns!");
			
			if($tv_ns_trutri!=0)
				$sql="INSERT INTO `tuvien_nhansu`(`ns_id`, `tv_id`, `tv_ns_trutri`) VALUES ($ns_id,$sltuvien,1)";
			else
				$sql="INSERT INTO `tuvien_nhansu`(`ns_id`, `tv_id`, `tv_ns_trutri`) VALUES ($ns_id,$sltuvien,0)";
			
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
		}
		include_once "layout/qlnhansu/add.php";
		break;
	case "trutri":
		if(isset($_POST['submit'])){
			$tv_id=isset($_POST['rdcheck']) ? $_POST['rdcheck'] : 0;
			if($ns_id<=0 || !is_numeric($ns_id))
				redirect("index.php?page=qlnhansu", 0);
			if($tv_id==0)
				show_error("Cần check vào tự viện trước khi submit");
			else{
				$sql="SELECT ns_id FROM nhan_su WHERE ns_id=$ns_id";
				$qr=mysqli_query($con, $sql);
				if(mysqli_num_rows($qr)!=1)
					redirect("index.php?page=qlnhansu",0);
				
				$sql="SELECT * FROM `tuvien_nhansu` WHERE ns_id=$ns_id AND tv_id=$tv_id";
				$qr=mysqli_query($con, $sql);
				$count=mysqli_num_rows($qr);
				if($count<=0)
					$sql="INSERT INTO `tuvien_nhansu`(`ns_id`, `tv_id`, `tv_ns_trutri`) VALUES ($ns_id,$tv_id,1)";
				else
					$sql="UPDATE `tuvien_nhansu` SET `tv_ns_trutri`=1 WHERE ns_id=$ns_id AND tv_id=$tv_id";
				
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				show_success("Thành công!");
				redirect("index.php?page=qltuvien&act=detail&tv_id=$tv_id", 3);
			}
		}
		include_once "layout/qlnhansu/trutri.php";
		break;
	case "huytrutri":
		if(isset($_POST['submit'])){
			$tv_id=isset($_POST['rdcheck']) ? $_POST['rdcheck'] : 0;
			if($ns_id<=0 || !is_numeric($ns_id))
				redirect("index.php?page=qlnhansu", 0);
			if($tv_id==0)
				show_error("Cần check vào tự viện trước khi submit");
			else{
				$sql="UPDATE tuvien_nhansu SET tv_ns_trutri=0 WHERE ns_id=$ns_id AND tv_id=$tv_id";
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				show_success("Thành công!");
				redirect("index.php?page=qlnhansu&act=detail&ns_id=$ns_id", 3);
			}
		}
		include_once "layout/qlnhansu/huytrutri.php";
		break;
	case "detail":
		include_once "layout/qlnhansu/detail.php";
		break;
	case "edit":
		$sql="SELECT * FROM nhan_su ns, hinh_nhan_su hns WHERE ns.ns_id=hns.ns_id AND ns.ns_id=$ns_id";
		$qr=mysqli_query($con, $sql);
		if(mysqli_num_rows($qr)<=0)
			redirect("?page=qlnhansu");
		else
			$row=mysqli_fetch_array($qr);
		
		if(isset($_POST['submit'])){
			//echo $sltuvien."-".$slquanhuyen;
			//var_dump(empty($slphathoc));
			if(empty($pname) || empty($cmnd) || $slnamsinh==0 || empty($slphathoc) || $sltuvien==0 || $slquanhuyen==0){
				show_error("Điền đầy đủ trường có dấu (*)");
				include_once "layout/qlnhansu/edit.php";
				exit();
			}
			
			$taptin=$_FILES['image'];
			if(!empty($taptin['name'])){
				if(!check_image($taptin)){
					include_once "layout/qlnhansu/add.php";
					exit();
				}
				
				$tentaptin=$ns_id."_".$taptin['name'];
				copy($taptin['tmp_name'],"../img/nhansu/".$tentaptin);
				$image_1 = new SimpleImage();
				$image_1->load($taptin['tmp_name']);
				$image_1->resize(400,300);
				$image_1->save("../img/nhansu/".$tentaptin);
				
				if(strcmp($row['hns_url'], "no_image.gif")!=0)
					unlink("../img/nhansu/".$row['hns_url']);
				
				$sql="UPDATE `hinh_nhan_su` SET `hns_url`='$tentaptin', `ns_id`=$ns_id WHERE ns_id=$ns_id";
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
			}
			
			$sql="UPDATE `nhan_su` SET `ns_hoten`='$name',`ns_phapdanh`='$pname',`ns_cmnd`='$cmnd',`ns_namsinh`='$slnamsinh',`ns_td_vanhoa`='$slvanhoa',
			`ns_td_phathoc`='$slphathoc',`ns_dienthoai`='$phone',`ns_quequan`='$address',`ns_hinhdaidien`='',`ns_tieusu`='$description',`ns_trangthai`=1 WHERE ns_id=$ns_id";
			$rs=mysqli_query($con, $sql);
			if(!$rs) die("Lỗi truy vấn CSDL!");
			
			$sql="UPDATE tuvien_nhansu SET tv_id=$sltuvien, tv_ns_trutri=0 WHERE ns_id=$ns_id LIMIT 1";
			$qr=mysqli_query($con, $sql);
			if(!$qr) die("Lỗi truy vấn CSDL!");
			
			redirect("?page=qlnhansu&act=edit&ns_id=$ns_id",0);
		}
		include_once "layout/qlnhansu/edit.php";
		break;
	case "delete":
		$confirm="yes";
		if($ns_id<=0 || !is_numeric($ns_id))
			redirect("404.html",0);
		if(isset($_POST['delete'])){
			$confirm="";
			$sql="SELECT * FROM hinh_nhan_su WHERE ns_id=$ns_id";
			$qr=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($qr);
			unlink("../img/nhansu/".$row['hns_url']);
			
			$sql1="UPDATE tu_vien SET tv_ns_trutri=0 WHERE tv_ns_trutri=$ns_id";
			$qr1=mysqli_query($con, $sql1);

			$sql2="DELETE FROM nhan_su WHERE ns_id=$ns_id";
			$qr2=mysqli_query($con, $sql2);
			redirect("index.php?page=qlnhansu",0);
		}
		include_once "layout/qlnhansu/index.php";
		break;
	default:
		include_once "layout/qlnhansu/index.php";
		break;
}
?>