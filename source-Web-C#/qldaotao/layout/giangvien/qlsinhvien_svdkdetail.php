<h3 class="text-center text-danger">DANH SÁCH CÁCH CHƯƠNG TRÌNH ĐÀO TẠO ĐÃ ĐĂNG KÝ</h3>

<?php
/* lấy thông tin ctdt */
$sql="SELECT * FROM daotao a, sinhvien b, dangky c
	  WHERE a.dt_id=c.dt_id AND b.sv_id=c.sv_id AND b.sv_id=$sv_id";
//echo $sql;
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");

/* Lấy thông tin sinh viên*/
$sl = "SELECT * FROM sinhvien WHERE sv_id=$sv_id";
$re = mysqli_query($con, $sl);
$sv = mysqli_fetch_object($re);
?>

<div class="col-lg-12">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
	<table class="table table-bordered table-responsive col-lg-3" style="margin-bottom: 15px;">
		<tr>
			<th colspan="2">Thông tin SV</th>
		</tr>
		<tr>
			<td>Họ tên</td><td><?php echo $sv->sv_hoten; ?></td>
		</tr>
		<tr>
			<td>Phái</td><td><?php echo $sv->sv_gioitinh=0 ? "Nam" : "Nữ"; ?></td>
		</tr>
		<tr>
			<td>Email</td><td><?php echo $sv->sv_email; ?></td>
		</tr>
		<tr>
			<td>Điện thoại</td><td><?php echo $sv->sv_dienthoai; ?></td>
		</tr>
	</table>
	</div>
	<div class="col-lg-3"></div>
</div>

	<table class="table table-bordered table-responsive" style="margin-top: 10px !important;">
		<tr>
			<th>STT</th>
			<th>Mã CT</th>
			<th>Tên CT</th>
			<th>Mô tả</th>
			<th>Trạng thái</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
		<?php
		$i=1;
		if(mysqli_num_rows($rs)==0)
			echo "<tr><td colspan=6>Chưa đăng ký chương trình đào tạo nào!</td></tr>";
		while($daotao = mysqli_fetch_object($rs)){ 
			?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $daotao->dt_ma; ?></td>
				<td><?php echo $daotao->dt_ten; ?></td>
				<td><?php echo $daotao->dt_mota; ?></td>
				<td><?php echo $daotao->dk_trangthai; ?></td>
				<td class="text-center">

	                <?php 
	                $sql2 = "SELECT * FROM dangky WHERE dt_id = $daotao->dt_id AND sv_id = $sv->sv_id";
	                $rs2=mysqli_query($con, $sql2);
	                if(!$rs2) die("Lỗi truy vấn CSDL!");
	                $row = mysqli_fetch_object($rs2);	
	               	if($daotao->dk_trangthai=="Đăng ký"){ ?>
	               		<a href="index.php?page=qlsinhvien&act=huydkctdt&dt_id=<?php echo $daotao->dt_id; ?>&sv_id=<?php echo $sv->sv_id; ?>">
	               		<input type="button" name="dangky" class="btn btn-xs btn-warning" value="Hủy đăng ký">
	               		</a>
	               		<?php
	               	} 
	               	else {
		                ?>
		                <a href="index.php?page=qlsinhvien&act=dkctdt&dt_id=<?php echo $daotao->dt_id; ?>&sv_id=<?php echo $sv->sv_id; ?>">
		                <input type="button" name="dangky" class="btn btn-xs btn-warning" value="Đăng ký">
		                </a>
		                <?php
		            } ?>

				</td>
			</tr>
			<?php
		} ?>
	</table>
	<br/>
