<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">DANH SÁCH CÁC SINH VIÊN ĐĂNG KÝ CTDT</h3>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlsinhvien&act=xoa&sv_id=<?php echo $sv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này?
				<input type="hidden" name="nn_id" value="<?php echo $nn_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlsinhvien"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<?php 

?>
<div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="" method="POST" class="form-inline">
			<?php echo isset($dt_id) ? showDaoTaoList($con, $dt_id) : showDaoTaoList($con); ?>
			<input type="submit" name="btnLoc" value="Lọc" class="btn btn-info">
		</form>
	</div>
<div class="col-lg-3"></div>
</div>

<?php
$soproduct=PAGINATION_NUM;
$base_url= 'index.php?page=qlsinhvien_svdk&';
if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;	

$sql1 = "SELECT * FROM sinhvien WHERE dt_id is NULL";
$sql = "SELECT * FROM sinhvien WHERE dt_id is NULL";

$query = mysqli_query($con, $sql1);
$tongsodong = mysqli_num_rows($query);

if(isset($k_id))
	$sql .= " AND k_id=$k_id";

$sql .= " order by sv_id desc limit $s,$soproduct";
$qr=mysqli_query($con, $sql);
//echo $sql;
if(!$qr) die("Lỗi truy vấn CSDL!");
$i=0;
?>

<!-- <a href="index.php?page=qlsinhvien&act=them">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm mới">
</a> -->
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Phái</th>
		<th>Điện thoại</th>
        <th>Ngày sinh</th>
        <th>Tài khoản</th>
        <th>Số lượng ĐK</th>
		<th class="text-center">Tùy chọn</th>
	</tr>
	<?php
	while($sinhvien = mysqli_fetch_object($qr)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i+$s; ?></td>
			<td><?php echo $sinhvien->sv_hoten; ?></td>
			<td><?php echo $sinhvien->sv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
			<td><?php echo $sinhvien->sv_dienthoai; ?></td>
            <td><?php echo $sinhvien->sv_ngaysinh; ?></td>
            <td><?php echo $sinhvien->sv_email; ?></td>
            <td>
            	<?php
            	$sl = "SELECT * FROM dangky WHERE sv_id=$sinhvien->sv_id";
            	$result = mysqli_query($con, $sl);
            	$sldk = mysqli_num_rows($result);
            	echo $sldk;
            	?>
            </td>
			<td class="text-center">
				<!-- <input type="button" name="detail" dt_id=<?php //echo $sinhvien->sv_id; ?> class="btn btn-xs btn-success detail" value="Chi tiết"> -->
				<a href="?page=qlsinhvien&act=svdkdetail&sv_id=<?php echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Chi tiết">
                </a>
                <!-- <a href="?page=qlsinhvien&act=edit&sv_id=<?php //echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
                </a> -->
                <a href="?page=qlsinhvien&act=xoa&sv_id=<?php echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>
		</tr>
		<?php
	} ?>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
<br/>