<h2 class=" text-center text-danger">Thêm tài khoản mới vào hệ thống online</h2>
<hr>
<div class="row">
	<center>
		<p>Vui lòng điền đầy đủ thông tin bên dưới.</p>
		<p><i><small>Các trường có dấu (*) không thể bỏ trống</small></i></p>
		<p><i><small class="text-danger">Mật khẩu bắt đầu bằng chữ in hoa, có ít nhất 1 ký tự đặc biệt, có chữ số</small></i></p>
	</center>
	<form class="form-horizontal" action="index.php?page=qltaikhoan&act=them" method="post">
		
	    <div class="col-md-3"></div>

	    <div class="col-md-6">
			<div class="panel panel-primary">
	        <div class="panel-heading">Thông tin tài khoản mới</div>

	        <div class="panel-body">
	            <div class="form-group">
					<label class="col-lg-3 control-label" for="txtHoTen">Họ tên <span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="text" name="txtHoTen" placeholder="Nhập họ tên..." class="form-control" value="<?php echo isset($hoten) ? $hoten : '';?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="rdGioiTinh">Giới tính <span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="radio" name="rdGioiTinh" value="0" <?php echo $gioitinh==0 ? "checked" : '';?>> Nam</option> 
            			<input type="radio" name="rdGioiTinh" value="1" <?php echo $gioitinh==1 ? "checked" : '';?>> Nữ</option>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtNgaySinh">Ngày sinh<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="date" name="txtNgaySinh" placeholder="Ngày sinh..." class="form-control" value="<?php echo isset($ngaysinh) ? $ngaysinh : '';?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDienThoai">Điện thoại<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="number" name="txtDienThoai" placeholder="Điện thoại..." class="form-control" value="<?php echo isset($dienthoai) ? $dienthoai : '';?>" maxlength="10">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtEmail">Email<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="email" name="txtEmail" placeholder="Email..." class="form-control" value="<?php echo isset($email) ? $email : '';?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Địa chỉ</label>
					<div class="col-lg-9">
						<input type="text" name="txtDiaChi" placeholder="nhập địa chỉ..." class="form-control" value="<?php echo isset($diachi) ? $diachi : '';?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Cấp quyền<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<?php echo isset($quyen) ? checkQuyen($con, $quyen) : checkQuyen($con); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Khoa<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<?php echo isset($k_id) ? showKhoaList($con, $k_id) : showKhoaList($con); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtMatKhau">Mật khẩu<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="text" name="txtMatKhau" placeholder="nhập mật khẩu..." class="form-control" value="<?php echo isset($matkhau) ? $matkhau : '';?>">
					</div>
				</div>
				
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