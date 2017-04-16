<div class="container">
<form class="form-horizontal" action="index.php?page=qltuvien&act=add" method="post" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-4 control-label" for="name">Tên chùa <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-8">
							<input type="text" name="name" placeholder="Tên chùa" id="name" class="form-control" value="<?php if (isset($name)) echo $name; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="short">Tóm tắt <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-8">
							<textarea name="short" id="short" class="form-control" rows="4"><?php if (isset($short)) echo $short; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label" for="slQuanHuyen">Khu vực <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-8">
							<?php
							if(!isset($slquanhuyen)) showQHList_add($con); else showQHList($con, $slquanhuyen);
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label" for="address">Địa chỉ <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-8">
							<textarea name="address" id="address" class="form-control" rows="4"><?php if (isset($address)) echo $address; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Điện thoại</label>
						<div class="col-lg-8">
							<input type="text" name="phone" placeholder="Điện thoại" id="phone" maxlength="11" class="form-control" value="<?php if (isset($phone)) echo $phone; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="image">Ảnh Đ.diện <span class="text-danger"><strong>(*)</strong></span></label>
						<div class="col-lg-8">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>

				</div>
			</div>

		</div>
		
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">Tiểu sử</div>
				<div class="panel-body">
					<textarea name="description" id="description" class="form-control"><?php if (isset($description)) echo stripslashes(html_entity_decode($description)); ?></textarea>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-body text-right">
					<p class="pull-left">Ngày tạo: <?php echo date('d/m/Y') ?></p>
					<button type="submit" class="btn btn-success" name="submit">Đồng ý</button>
				</div>
			</div>

		</div>
		
	</div>

</form>

<script>
		CKEDITOR.replace('description');
</script>
</div>