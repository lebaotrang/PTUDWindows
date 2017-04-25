<?php
if(!in_array(3, $_SESSION['user_quyen'])) redirect('login.php', 0);
$act = isset($_GET['act']) ? filter_data($_GET['act']) : NULL;
$sql="SELECT * FROM nhanvien WHERE nv_tentaikhoan='".$_SESSION['user_name']."'";
$qr=mysqli_query($con, $sql);
$nv_id=mysqli_fetch_object($qr)->nv_id;
if(!isset($hk)) $hk = HKy_Hientai();
if(!isset($nk)) $nk = NK_HienTai();
switch($act){
	case "nhapdiem":
		if(isset($_POST['submit'])){
			$l_id = isset($_GET['l_id']) ? $_GET['l_id'] :0;
			$hknk_id = isset($_GET['hknk_id']) ? $_GET['hknk_id'] :0;
			$hk=isset($_GET['hk']) ? $_GET['hk'] : HKy_HienTai();
			$nk=isset($_GET['nk']) ? $_GET['nk'] : NK_HienTai();

			$dl1 = $_POST['dl1'];
			$dl2 = $_POST['dl2']; //var_dump($dl1); echo $dl1[1];//die();
			$sv_id = $_POST['sv_id'];

			$a="SELECT * FROM lop WHERE l_id=$l_id";
			$qra=mysqli_query($con, $a);
			$mh_id=mysqli_fetch_object($qra)->mh_id;

			$b="SELECT * FROM monhoc WHERE mh_id=$mh_id";
			$qrb=mysqli_query($con, $b);
			$tinchi=mysqli_fetch_object($qrb)->mh_tinchi;

			$i=0;
			foreach ($dl1 as $dl1) {

				if($dl2[$i]!=NULL)
					if($dl1>$dl2[$i])
						$tb=$dl1;
					else
						$tb=floatval($dl2[$i]);
				else
					$tb=$dl1;

				if($tb>=5.5)
					$kq_tichluy=$tinchi;
				else
					$kq_tichluy=0;

				$dl2[$i]=$dl2[$i]=="" ? -1 : abs($dl2[$i]);

				$s="UPDATE ketqua SET kq_diemlan1=$dl1, kq_diemlan2='$dl2[$i]', kq_trungbinh=$tb, kq_tichluy=$kq_tichluy
					WHERE sv_id=$sv_id[$i] AND m_id=$mh_id AND l_id=$l_id";
				//echo $s; die();
				$qrs=mysqli_query($con, $s);
				$i++;
				if(!$qrs)
					die("loi truy vấn");
				
			}
			if($qr)
				redirect("index.php?page=qllopday&act=nhapdiem&nk=$nk&hk=$hk&hknk_id=$hknk_id&l_id=$l_id",0);
		}

		include_once "./layout/giangvien/qllopday.php";
		break;
	default:
		include_once "./layout/giangvien/qllopday.php";
		break;
}
?>