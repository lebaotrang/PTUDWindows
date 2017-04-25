<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
?>
<div class="container">
<form class="form-horizontal" action="index.php?page=qltuvien&act=edit&tv_id=<?php echo $tv_id;?>" method="post" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-3 control-label" for="name">Tên chùa</label>
						<div class="col-lg-9">
							<input type="text" name="name" placeholder="Tên chùa" id="name" class="form-control" value="<?php echo $row['tv_ten']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="short">Tóm tắt</label>
						<div class="col-lg-9">
							<textarea name="short" id="short" class="form-control" rows="4"><?php echo $row['tv_tomtat']; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="slQuanHuyen">Khu vực</label>
						<div class="col-lg-9">
							<?php
							showQHList($con, $row['qh_id']);
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="address">Địa chỉ</label>
						<div class="col-lg-9">
							<textarea name="address" id="address" class="form-control"><?php echo $row['tv_diachi']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="phone">Điện thoại</label>
						<div class="col-lg-9">
							<input type="text" name="phone" placeholder="Điện thoại" id="phone" maxlength="11" class="form-control" value="<?php echo $row['tv_dienthoai']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image">Ảnh cũ</label>
						<div class="col-lg-9">
							<img src="<?php echo "../img/tuvien/".$row['htv_url'];?>" class="img-thumbnail"></img>
						</div>
					</div>

				</div>
			</div>

		</div>
		
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">Tiểu sử</div>
				<div class="panel-body">
					<textarea name="description" id="description" class="form-control"><?php echo $row['tv_tieusu']; ?></textarea>
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
	$(document).ready(function() {
		CKEDITOR.replace('description');
	});
</script>
</div>