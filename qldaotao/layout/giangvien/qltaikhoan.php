<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">NGƯỜI DÙNG HỆ THỐNG HIỆN CÓ</h3>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltaikhoan&act=xoa&nv_id=<?php echo $nv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này?
				<input type="hidden" name="nn_id" value="<?php echo $nn_id; ?>">
				<!--<input type="hidden" name="hnn_id" value="<?php //echo $hnn_id; ?>">-->
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltaikhoan"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<?php
$sql="SELECT * FROM nhanvien a order by nv_id desc"; //echo $sql;
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$i=0;
?>

<a href="index.php?page=qltaikhoan&act=them">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm mới">
</a>
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Phái</th>
		<th>Điện thoại</th>
        <th>Địa chỉ</th>
        <th>Tài khoản</th>
        <th>Quyền</th>
		<th class="text-center">Tùy chọn</th>
	</tr>
	<?php
	while($nhanvien = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $nhanvien->nv_hoten; ?></td>
			<td><?php echo $nhanvien->nv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
			<td><?php echo $nhanvien->nv_dienthoai; ?></td>
            <td><?php echo $nhanvien->nv_diachi; ?></td>
            <td><?php echo $nhanvien->nv_tentaikhoan; ?></td>
            <?php
            $sql1="SELECT * FROM quyen a, quyennhanvien b 
                   WHERE a.q_id=b.q_id AND nv_id=$nhanvien->nv_id"; //echo $sql1;
            $rs1=mysqli_query($con, $sql1);
            ?>
            <td><?php 
                while($quyen=mysqli_fetch_object($rs1)){
                    echo "-".$quyen->q_ten."<br/>"; 
                } ?>
            </td>
			<td class="text-center">
				<input type="button" name="detail" dt_id=<?php echo $nhanvien->nv_id; ?> class="btn btn-xs btn-success detail" value="Chi tiết">

				<a href="?page=qltaikhoan&act=resetpass&nv_id=<?php echo $nhanvien->nv_id; ?>">
				<input type="button" name="resetpass" class="btn btn-xs btn-info" value="reset pass">
				</a>

                <a href="?page=qltaikhoan&act=edit&nv_id=<?php echo $nhanvien->nv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
                </a>
                <a href="?page=qltaikhoan&act=xoa&nv_id=<?php echo $nhanvien->nv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>
		</tr>
		<?php
	} ?>
</table>
<br/>