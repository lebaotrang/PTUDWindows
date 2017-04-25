<h3 class="text-center text-danger">DANH SÁCH CÁCH CHƯƠNG TRÌNH ĐÀO TẠO ĐÃ ĐĂNG KÝ</h3>
<?php
$sql="SELECT * FROM daotao a, sinhvien b, dangky c
	  WHERE a.dt_id=c.dt_id AND b.sv_id=c.sv_id AND sv_email='".$_SESSION['user_name']."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$i=0;
?>
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Mã CT</th>
		<th>Tên CT</th>
		<th>Mô tả</th>
		<th>Trạng thái</th>
		<th class="text-center">Tùy chọn</th>
	</tr>
	<?php
	while($daotao = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daotao->dt_ma; ?></td>
			<td><?php echo $daotao->dt_ten; ?></td>
			<td><?php echo $daotao->dt_mota; ?></td>
			<td><?php echo $daotao->dk_trangthai; ?></td>
			<td class="text-center">

                <?php 
                $sql1 ="SELECT * FROM sinhvien where sv_email = '".$_SESSION['user_name']."'";
                $rs1=mysqli_query($con, $sql1);
                if(!$rs1) die("Lỗi truy vấn CSDL!");
                $sv_id = mysqli_fetch_object($rs1)->sv_id;

                $sql2 = "SELECT * FROM dangky WHERE dt_id = $daotao->dt_id AND sv_id = $sv_id";
                $rs2=mysqli_query($con, $sql2);
                if(!$rs2) die("Lỗi truy vấn CSDL!");
                $row = mysqli_fetch_object($rs2);	
               	if($daotao->dk_trangthai=="Đăng ký"){ ?>
               		<input type="button" name="dangky" class="btn btn-xs btn-danger detail" value="Xóa" disabled>
               		<?php
               	} 
               	else {
	                ?>
	                <a href="index.php?page=qldangky&act=xoa&dt_id=<?php echo $daotao->dt_id; ?>">
	                <input type="button" name="dangky" class="btn btn-xs btn-danger detail" value="Xóa">
	                </a>
	                <?php
	            } ?>

			</td>
		</tr>
		<?php
	} ?>
</table>
<br/>