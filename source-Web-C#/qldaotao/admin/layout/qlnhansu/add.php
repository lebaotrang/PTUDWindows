<script language="javascript">
	$(document).ready(function() {
        $('#slQuanHuyen').change(function() {
            $.get('ajax/ajax-ns-tuvien.php', $('#ns-add').serialize(), function(e) {
                if( e ) {
                    $('#dsTuVien').html(e);
                }	
            });
        });		
    });
</script>
<div class="container">
<form class="form-horizontal" action="index.php?page=qlnhansu&act=add" method="post" enctype="multipart/form-data" id="ns-add">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-4 control-label" for="name">Họ tên</label>
						<div class="col-lg-8">
							<input type="text" name="name" placeholder="Họ tên" id="name" class="form-control" value="<?php if (isset($name)) echo $name; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="pname">Pháp danh <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="pname" placeholder="Pháp danh" id="pname" class="form-control" value="<?php if (isset($pname)) echo $pname; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="cmnd">CMND <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="cmnd" maxlength="9" placeholder="Chứng minh" id="cmnd" class="form-control" value="<?php if (isset($cmnd)) echo $cmnd; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="namsinh">Năm sinh <span class="text-danger">(*)</span> </label>
						<div class="col-lg-8">
							<select name='slNamSinh' class='form-control' id="namsinh">
								<option value='0'>Chọn năm sinh</option>
								<?php
								for($i=1900; $i<=2020; $i++){ ?>
									<option value="<?php echo $i; ?>" <?php if($slnamsinh==$i) echo "selected";?>><?php echo $i; ?></option>
									<?php
								} ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="vanhoa">Văn hóa</label>
						<div class="col-lg-8">
							<select name='slVanHoa' class='form-control'>
								<option value='0/0'>Trình độ văn hóa</option>
								<?php
								for($i=1; $i<=12; $i++){ ?>
									<option value="<?php echo $i."/12"; ?>" <?php if($slvanhoa==$i) echo "selected";?>><?php echo $i."/12"; ?></option>
									<?php
								} ?>
								<option value='Trung cấp' <?php if($slvanhoa=='Trung cấp') echo "selected";?>>Trung cấp</option>
								<option value='Cao đẳng' <?php if($slvanhoa=='Cao đẳng') echo "selected";?>>Cao đẳng</option>
								<option value='Đại học' <?php if($slvanhoa=='Đại học') echo "selected";?>>Đại học</option>
								<option value='Thạc sĩ' <?php if($slvanhoa=='Thạc sĩ') echo "selected";?>>Thạc sĩ</option>
								<option value='Tiến sĩ' <?php if($slvanhoa=='Tiến sĩ') echo "selected";?>>Tiến sĩ</option>
								<option value='Giáo sư' <?php if($slvanhoa=='Giáo sư') echo "selected";?>>Giáo sư</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="phathoc">Phật học <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<select name='slPhatHoc' class='form-control'>
								<option value='0'>Trình độ Phật học</option>
								<option value="Không" <?php if($slphathoc=='Không') echo "selected";?>>Không</option>
								<option value="Sơ cấp" <?php if($slphathoc=='Sơ cấp') echo "selected";?>>Sơ cấp</option>
								<option value="Trung cấp" <?php if($slphathoc=='Trung cấp') echo "selected";?>>Trung cấp</option>
								<option value="Cao đẳng" <?php if($slphathoc=='Cao đẳng') echo "selected";?>>Cao đẳng</option>
								<option value="Đại học" <?php if($slphathoc=='Đại học') echo "selected";?>>Đại học</option>
								<option value='Thạc sĩ' <?php if($slphathoc=='Thạc sĩ') echo "selected";?>>Thạc sĩ</option>
								<option value='Tiến sĩ' <?php if($slphathoc=='Tiến sĩ') echo "selected";?>>Tiến sĩ</option>
								<option value='Giáo sư' <?php if($slphathoc=='Giáo sư') echo "selected";?>>Giáo sư</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Tại Chùa <span class="text-danger">(*)</span></label>
						<div class="col-lg-4">
							<?php showQHList_add($con);	?>
						</div>
						<div class="col-lg-4" id="dsTuVien">
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Trụ trì <span class="text-danger">(*)</span></label>
						<div class="col-lg-8" id="truTri">
						
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Điện thoại</label>
						<div class="col-lg-8">
							<input type="text" name="phone" placeholder="Điện thoại" id="phone" maxlength="11" class="form-control" value="<?php if (isset($phone)) echo $phone; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="address">Địa chỉ</label>
						<div class="col-lg-8">
							<textarea name="address" id="address" class="form-control"><?php if (isset($address)) echo $address; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="image">Ảnh Đ.diện</label>
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
					<textarea name="description" id="description" class="form-control"><?php if (isset($description)) echo $description; ?></textarea>
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