<div class="container">
<form class="form-horizontal" action="index.php?page=qlphatgiao&act=add" method="post" enctype="multipart/form-data" id="tt-add">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-4 control-label" for="title">Tiêu đề <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="title" placeholder="Tiêu đề" id="title" class="form-control" value="<?php if (isset($title)) echo $title; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="short">Tóm tắt <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<textarea name="short" id="short" class="form-control" value="<?php if (isset($short)) echo $short; ?>" rows="4"><?php if (isset($short)) echo $short; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="people">Tác giả <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="people" placeholder="Tác giả" id="short" class="form-control" value="<?php if (isset($people)) echo $people; ?>">
						</div>
					</div>
					
					<!--<div class="form-group">
						<label class="col-lg-4 control-label" for="category">Loại tin <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<select name="slCategory" id="slCategory" class='form-control'>
								<option value="0">Chọn loại tin</option>
								<option value="1" <?php //if($slcategory==1) echo "selected"; ?>>Tin trong tỉnh</option>
								<option value="2" <?php //if($slcategory==2) echo "selected"; ?>>Tin ngoài tỉnh</option>
							</select>
						</div>
					</div>-->
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="image">Ảnh Đ.diện <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>

				</div>
			</div>

		</div>
		
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">Nội dung <span class="text-danger">(*)</span></div>
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
	$(document).ready(function() {
		CKEDITOR.replace('description');
	});
</script>
</div>