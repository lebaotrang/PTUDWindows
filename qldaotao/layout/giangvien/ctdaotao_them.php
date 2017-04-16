<h3 class="text-center text-danger">THÊM CHƯƠNG TRÌNH ĐÀO TẠO</h3>
<hr>
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-primary">

	    <div class="panel-heading">Thêm CTDT</div>

        <div class="panel-body">
			<form class="form-horizontal" action="index.php?page=ctdaotao&act=them" method="post">

			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtMaCT">Mã CT <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtMaCT" placeholder="nhập mã chương trình..." value="<?php if(isset($mact)) echo $mact;?>"/> 
			        </div>
			    </div>
			    
			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtTenCT">Tên CT <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtTenCT" placeholder="nhập tên chương trình..." value="<?php if(isset($tenct)) echo $tenct;?>"/> 
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtMoTa">Mô tả CT </label>
			        <div class="col-lg-9">
			            <textarea class="form-control" name="txtMoTa" placeholder="nhập mô tả..." rows="5"><?php if(isset($mota)) echo $mota;?></textarea>
			        </div>
			    </div>

			    <div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Khoa<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<?php echo isset($k_id) ? showKhoaList($con, $k_id) : showKhoaList($con); ?>
					</div>
				</div>

			    <div class="col-sm-8 pull-right" style="margin-bottom: 20px;">
			        <input type="submit" name="submit" class="btn btn-primary btn-medium" value="Đồng ý">
			    </div>
			    
			</form>
		</div> <!-- end pannel body -->
	</div> <!-- end pannel -->
</div> <!-- end col-md-6 -->
