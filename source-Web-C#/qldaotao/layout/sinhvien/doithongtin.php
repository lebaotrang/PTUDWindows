<h3 class="text-center text-danger">THÔNG TIN SINH VIÊN</h3>
<?php
$sql="SELECT * FROM sinhvien WHERE sv_email='".$_SESSION['user_name']."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$sinhvien=mysqli_fetch_object($rs);
?>
<div class="row">
	<center>
		<p>Vui lòng điền đầy đủ thông tin bên dưới.</p>
		<p><i><small>Các trường có dấu (*) không thể bỏ trống</small></i></p>
	</center>
	<form class="form-horizontal" action="index.php?page=doithongtin&act=edit" method="post">
		
	    <div class="col-md-3"></div>

	    <div class="col-md-6">
			<div class="panel panel-primary">
	        <div class="panel-heading">Thông tin tài khoản</div>

	        <div class="panel-body">
	            <div class="form-group">
					<label class="col-lg-3 control-label" for="txtHoTen">Họ tên <span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="text" name="txtHoTen" placeholder="Nhập họ tên..." class="form-control" value="<?php echo isset($sinhvien->sv_hoten) ? $sinhvien->sv_hoten : '';?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="rdGioiTinh">Giới tính <span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="radio" name="rdGioiTinh" value="0" <?php echo $sinhvien->sv_gioitinh==0 ? "checked" : '';?>> Nam</option> 
            			<input type="radio" name="rdGioiTinh" value="1" <?php echo $sinhvien->sv_gioitinh==1 ? "checked" : '';?>> Nữ</option>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtNgaySinh">Ngày sinh<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="date" name="txtNgaySinh" placeholder="Ngày sinh..." class="form-control" value="<?php echo isset($sinhvien->sv_ngaysinh) ? $sinhvien->sv_ngaysinh : '';?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDienThoai">Điện thoại<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="number" name="txtDienThoai" placeholder="Điện thoại..." class="form-control" value="<?php echo isset($sinhvien->sv_dienthoai) ? $sinhvien->sv_dienthoai : '';?>" maxlength="10">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtEmail">Email<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="email" name="txtEmail" placeholder="Email..." class="form-control" value="<?php echo isset($sinhvien->sv_email) ? $sinhvien->sv_email : '';?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Địa chỉ</label>
					<div class="col-lg-9">
						<input type="text" name="txtDiaChi" placeholder="nhập địa chỉ..." class="form-control" value="<?php echo isset($sinhvien->sv_diachi) ? $sinhvien->sv_diachi : '';?>">
					</div>
				</div>

				<!-- <div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Khoa<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<?php //echo isset($k_id) ? showKhoaList($con, $k_id) : showKhoaList($con,$sinhvien->k_id); ?>
					</div>
				</div> -->
				
				<div class="form-group">
					<div class="col-lg-12 text-center">
	                    <input type="submit" class="btn btn-primary" name="submit" value="Đồng ý">
	                </div>
				</div>
	            
	        </div><!-- end panel body -->

	    </div>
	    </div>
	</form>
</div>
