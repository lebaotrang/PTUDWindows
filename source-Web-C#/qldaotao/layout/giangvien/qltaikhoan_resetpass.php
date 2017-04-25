<h2 class=" text-center text-danger">Đổi mật khẩu giảng viên online</h2>
<hr>
<div class="row">
	<center>
		<p>Vui lòng điền đầy đủ thông tin bên dưới.</p>
		<p><i><small>Các trường có dấu (*) không thể bỏ trống</small></i></p>
	</center>
	<form class="form-horizontal" action="index.php?page=qltaikhoan&act=resetpass" method="post">
		
	    <div class="col-md-3"></div>

	    <div class="col-md-6">
			<div class="panel panel-primary">
	        <div class="panel-heading">Reset mật khẩu tài khoản</div>

	        <div class="panel-body">
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtMKMoi">MK mới <span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="password" name="txtMKMoi" placeholder="Nhập mật khẩu mới..." class="form-control" value="<?php //echo set_value('txtMKMoi');?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label" for="txtXNMatKhau">Xác nhận MK<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<input type="password" name="txtXNMatKhau" placeholder="Xác nhận mật khẩu mới..." class="form-control" value="<?php //echo set_value('txtXNMatKhau');?>" required>
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