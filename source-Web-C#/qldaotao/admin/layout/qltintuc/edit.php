<script language="javascript">
	$(document).ready(function() {
        $('#slCategory').change(function() {
            $.get('ajax/ajax-tt-quanhuyen.php', $('#slCategory').serialize(), function(e) {
                if( e ) {
                    $('#dsQuanHuyen').html(e);
                }	
            });
        });		
    });
</script>
<div class="container">
<form class="form-horizontal" action="index.php?page=qltintuc&act=edit&tt_loai=<?php echo $tt_loai; ?>&tt_id=<?php echo $tt_id; ?>" method="post" enctype="multipart/form-data" id="tt-add">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-4 control-label" for="title">Tiêu đề <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="title" placeholder="Tiêu đề" id="title" class="form-control" value="<?php if (isset($row['tt_tieude'])) echo $row['tt_tieude']; else echo $title; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="short">Tóm tắt <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<textarea name="short" id="short" class="form-control" value="<?php if (isset($short)) echo $short; ?>" rows="4"><?php if (isset($row['tt_tomtat'])) echo $row['tt_tomtat']; else echo $short; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="people">Người đăng </label>
						<div class="col-lg-8">
							<input type="text" name="people" placeholder="Người đăng" id="short" class="form-control" value="<?php if (isset($row['tt_nguoidang'])) echo $row['tt_nguoidang']; else echo $people; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="category">Loại tin <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<select name="slCategory" id="slCategory" class='form-control'>
								<option value="1" <?php if($tt_loai==1) echo "selected"; ?>>Tin trong tỉnh</option>
								<option value="2" <?php if($tt_loai==2) echo "selected"; ?>>Tin ngoài tỉnh</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="category">Khu vực <span class="text-danger">(*)</span></label>
						<div class="col-lg-8" id="dsQuanHuyen">
						<?php if($tt_loai==1) showQHList($con, $row['qh_id']); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="slBanNganh">Ban ngành <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<?php if(!empty($row['bn_id'])) showBNList($con, $row['bn_id']); else showBNList($con, $slbannganh); ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="image">Ảnh Đ.diện</label>
						<div class="col-lg-8">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label">Ảnh H.tại</label>
						<div class="col-lg-8">
							<?php if(strcmp($row['tt_hinhdaidien'], "default-img.jpg")!=0) $link="../img/tintuc/"; else $link="../img/"; ?>
							<img src="<?php echo $link.$row['tt_hinhdaidien']; ?>" class="img-thumbnail"/>
						</div>
					</div>

				</div>
			</div>

		</div>
		
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">Nội dung</div>
				<div class="panel-body">
					<textarea name="description" id="description" class="form-control"><?php if (isset($row['tt_noidung'])) echo stripslashes(html_entity_decode($row['tt_noidung'])); else echo stripslashes(html_entity_decode($description)); ?></textarea>
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