<?php
include_once "../../db/dbcon.php";
include_once "../../function/function.php";
$tv_id = isset($_GET['slTuVien']) ? (int) $_GET['slTuVien'] : 0;
$sql="SELECT * FROM tuvien_nhansu WHERE tv_id=$tv_id AND tv_ns_trutri=1";
$qr=mysqli_query($con, $sql);
if(!$qr) die("Lỗi truy ấn CSDL!");
$count=mysqli_num_rows($qr);
//$row=mysqli_fetch_array($qr);
if($count==0){ ?>
		<input type="radio" name="tv_ns_trutri" value="1" />&nbsp; Trụ trì
		<input type="radio" name="tv_ns_trutri" value="0" checked/>&nbsp; Không
	<?php
}
else
	echo "Đã có trụ trì";
?>