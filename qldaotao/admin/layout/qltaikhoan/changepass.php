<div class="container">
<form class="form-horizontal" action="index.php?page=qltaikhoan&act=changepass" method="post">

	<div class="row">
		<div class="col-md-3"></div>
		
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Đổi mật khẩu</div>
				<div class="panel-body">
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="oldpass">MK cũ <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-9">
							<input type="password" name="oldpass" placeholder="Nhập mật khẩu cũ..." id="oldpass" class="form-control" value="<?php if (isset($oldpass)) echo $oldpass; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="newpass1">MK mới <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-9">
							<input type="password" name="newpass1" placeholder="Nhập mật khẩu mới..." id="newpass1" class="form-control" value="<?php if (isset($newpass1)) echo $newpass1; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="newpass2">Xác nhận <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-9">
							<input type="password" name="newpass2" placeholder="Xác nhận mật khẩu mới..." id="newpass2" class="form-control" value="<?php //if (isset($name)) echo $name; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-12 text-center">
							<button type="submit" class="btn btn-success" name="submit">Đồng ý</button>
						</div>
					</div>
					
				</div>
			</div>

		</div>
		
		<div class="col-md-3"></div>
		
	</div>

</form>

</div>