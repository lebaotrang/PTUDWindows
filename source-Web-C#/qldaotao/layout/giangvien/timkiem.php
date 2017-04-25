<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">KẾT QUẢ TÌM KIẾM GIẢNG VIÊN</h3>
<?php
if(!empty($loi))
	show_error($loi);
else{ 
	if(mysqli_num_rows($qra)>0) { ?>
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
			$i=1;
			while($nhanvien = mysqli_fetch_object($qra)){ 
				?>
				<tr>
					<td><?php echo $i++; ?></td>
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
		<?php
	} 

	if(mysqli_num_rows($qrb)>0) { ?>
		<h3 class="text-center text-danger">KẾT QUẢ TÌM KIẾM SINH VIÊN</h3>
		<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Phái</th>
				<th>Điện thoại</th>
		        <th>Địa chỉ</th>
		        <th>Tài khoản</th>
				<th class="text-center">Tùy chọn</th>
			</tr>
			<?php
			$i=1;
			while($sinhvien = mysqli_fetch_object($qrb)){ 
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $sinhvien->sv_hoten; ?></td>
					<td><?php echo $sinhvien->sv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
					<td><?php echo $sinhvien->sv_dienthoai; ?></td>
		            <td><?php echo $sinhvien->sv_diachi; ?></td>
		            <td><?php echo $sinhvien->sv_email; ?></td>
					<td class="text-center">
						<input type="button" name="detail" dt_id=<?php echo $sinhvien->sv_id; ?> class="btn btn-xs btn-success detail" value="Chi tiết">

						<a href="?page=qltaikhoan&act=resetpass&nv_id=<?php echo $sinhvien->sv_id; ?>">
						<input type="button" name="resetpass" class="btn btn-xs btn-info" value="reset pass">
						</a>

		                <a href="?page=qltaikhoan&act=edit&nv_id=<?php echo $sinhvien->sv_id; ?>">
		                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
		                </a>
		                <a href="?page=qltaikhoan&act=xoa&nv_id=<?php echo $sinhvien->sv_id; ?>">
		                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
		                </a>
					</td>
				</tr>
				<?php
			} ?>
		</table>
		<br/>
		<?php
	}
} ?>