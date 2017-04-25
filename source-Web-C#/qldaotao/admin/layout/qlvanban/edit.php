<div class="container">
<form class="form-horizontal" action="index.php?page=qlvanban&act=edit&vb_id=<?php echo $vb_id;?>" method="post" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-3 control-label" for="name">Tên VB<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<input type="text" name="name" placeholder="Tên VB" id="name" class="form-control" value="<?php if (!empty($name)) echo $name; else echo $row['vb_ten']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="slQuanHuyen">Khu vực<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<?php
							if($slquanhuyen!=0) showQHList($con, $slquanhuyen); else showQHList($con, $row['qh_id']);
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="slBanNganh">Ban ngành<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<?php
							if($slbannganh!=0) showBNList($con, $slbannganh); else showBNList($con, $row['bn_id']);
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="date">Ngày ban hành<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<input type="date" name="date" id="date" class="form-control" value="<?php if (!empty($date)) echo $date; else echo $row['vb_ngaybanhanh']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="dateEnd">Ngày kết thúc</label>
						<div class="col-lg-9">
							<input type="date" name="dateEnd" id="dateEnd" class="form-control" value="<?php if (!empty($dateEnd)) echo $dateEnd; else echo $row['vb_ngayketthuc']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="slLoaiVB">Loại VB<span class="text-danger">&nbsp;(*)</span></label>
						<div class="col-lg-9">
							<select name='slLoaiVB' class='form-control' id='slLoaiVB'>
								<option value='0'>Chọn loại VB</option>
								<option value='1' <?php if($slloaivb==1 || $row['vb_loai']==1) echo "selected"; ?>>Văn bản Pháp lý</option>
								<option value='2' <?php if($slloaivb==2 || $row['vb_loai']==2) echo "selected"; ?>>Văn bản mẫu</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image">Tập tin</label>
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
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image1">Hình hiện tại</label>
						<?php if(strcmp($row['vb_hinhdaidien'], "default-img.jpg")!=0) $link="../img/vanban/"; else $link="../img/"; ?>
						<div class="col-lg-9">
							<img src="<?php echo $link.$row['vb_hinhdaidien']; ?>" class="img-thumbnail"/>
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
		
		<div class="col-md-6">
			<object data="<?php echo "../file/"."$row[vb_url]"; ?>" type="application/pdf" width="100%" height="600px" style="margin-bottom: 50px;" ></object>
		</div>
		
	</div>

</form>

<script>
	$(document).ready(function() {
		CKEDITOR.replace('description');
	});
</script>
