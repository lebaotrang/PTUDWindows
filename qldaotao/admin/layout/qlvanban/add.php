<div class="container">
<form class="form-horizontal" action="index.php?page=qlvanban&act=add" method="post" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-3 control-label" for="name">Tên VB<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<input type="text" name="name" placeholder="Tên VB" id="name" class="form-control" value="<?php if (isset($name)) echo $name; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="slQuanHuyen">Khu vực<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<?php
							if(!isset($slquanhuyen)) showQHList_add($con); else showQHList($con, $slquanhuyen);
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="slBanNganh">Ban ngành<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<?php
							if(!isset($slbannganh)) showBNList_add($con); else showBNList($con, $slbannganh);
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="date">Ngày ban hành<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<input type="date" name="date" id="date" class="form-control" value="<?php if (isset($date)) echo $date; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="dateEnd">Ngày kết thúc</label>
						<div class="col-lg-9">
							<input type="date" name="dateEnd" id="dateEnd" class="form-control" value="<?php if (isset($dateEnd)) echo $dateEnd; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="slLoaiVB">Loại VB<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<select name='slLoaiVB' class='form-control' id='slLoaiVB'>
								<option value='0'>Chọn loại VB</option>
								<option value='1' <?php if($slloaivb==1) echo "selected"; ?>>Văn bản Pháp lý</option>
								<option value='2' <?php if($slloaivb==2) echo "selected"; ?>>Văn bản mẫu</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image">Tập tin<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image1">Hình đại diện</label>
						<div class="col-lg-9">
							<input type="file" name="image1" id="image1" class="form-control">
						</div>
					</div>

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
