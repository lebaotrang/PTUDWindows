<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">DANH SÁCH CÁC SINH VIÊN</h3>

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

<div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="" method="POST" class="form-inline">
			<?php echo isset($k_id) ? showKhoaList($con, $k_id) : showKhoaList($con); ?>
			<input type="submit" name="btnLoc" value="Lọc" class="btn btn-info">
			<a href="index.php?page=qlsinhvien&act=svdk">
				<input type="button" name="" class="btn btn-info" value="DSSV đăng ký CTDT">
			</a>
		</form>
	</div>
<div class="col-lg-3"></div>
</div>

<?php
$soproduct=PAGINATION_NUM;
$base_url= 'index.php?page=qlsinhvien&';
if(isset($_GET['start']))
	$s = $_GET['start'];
else
	$s = 0;	

$sql1 = "SELECT * FROM sinhvien WHERE k_id is not NULL";
$sql = "SELECT * FROM sinhvien WHERE k_id is not NULL";

if(isset($k_id)){
	$sql1 .= " AND k_id = $k_id";
	$sql .= " AND k_id = $k_id";
}

$query = mysqli_query($con, $sql1);
$tongsodong = mysqli_num_rows($query);

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
			<td class="text-center">
				<!-- <input type="button" name="detail" dt_id=<?php //echo $sinhvien->sv_id; ?> class="btn btn-xs btn-success detail" value="Chi tiết"> -->

				<a href="?page=qlsinhvien&act=resetpass&sv_id=<?php echo $sinhvien->sv_id; ?>">
				<input type="button" name="resetpass" class="btn btn-xs btn-info" value="reset pass">
				</a>

                <a href="?page=qlsinhvien&act=edit&sv_id=<?php echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
                </a>

                <a href="?page=qlsinhvien&act=edit&sv_id=<?php echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-warning" value="Tạm hoãn">
                </a>

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