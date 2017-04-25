<h3 class="text-center text-danger">CHỈNH SỬA CHƯƠNG TRÌNH ĐÀO TẠO</h3>
<hr>
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-primary">

	    <div class="panel-heading">Chỉnh sửa chương trình đào tạo</div>

        <div class="panel-body">
			<form class="form-horizontal" action="index.php?page=ctdaotao&act=edit&dt_id=<?php echo $dt_id; ?>" method="post">

			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtMaCT">Mã CT <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtMaCT" placeholder="nhập mã chương trình..." value="<?php echo isset($daotao->dt_ma) ? $daotao->dt_ma : $mact;?>"/> 
			        </div>
			    </div>
			    
			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtTenCT">Tên CT <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtTenCT" placeholder="nhập tên chương trình..." value="<?php echo isset($daotao->dt_ten) ? $daotao->dt_ten : $tenct;?>"/> 
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtMoTa">Mô tả CT </label>
			        <div class="col-lg-9">
			            <textarea class="form-control" name="txtMoTa" placeholder="nhập mô tả..." rows="5"><?php echo isset($daotao->dt_mota) ? $daotao->dt_mota : $mota;?></textarea>
			        </div>
			    </div>

			   <div class="form-group">
					<label class="col-lg-3 control-label" for="txtDiaChi">Khoa<span class="text-danger"><strong>(*)</strong></span></label>
					<div class="col-lg-9">
						<?php echo isset($daotao->k_id) ? showKhoaList($con, $daotao->k_id) : showKhoaList($con, $k_id); ?>
					</div>
				</div>

			    <div class="col-sm-8 pull-right" style="margin-bottom: 20px;">
			        <input type="submit" name="submit" class="btn btn-primary btn-medium" value="Đồng ý">
			    </div>
			    
			</form>
		</div> <!-- end pannel body -->
	</div> <!-- end pannel -->
</div> <!-- end col-md-6 -->
