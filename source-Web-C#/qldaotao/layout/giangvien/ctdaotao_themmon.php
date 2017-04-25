<h3 class="text-center text-danger">THÊM MÔN HỌC CHO CHƯƠNG TRÌNH ĐÀO TẠO</h3>
<hr>
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-primary">

	    <div class="panel-heading">Thêm môn học</div>

        <div class="panel-body">
			<form class="form-horizontal" action="index.php?page=ctdaotao&act=themmon&dt_id=<?php echo $dt_id; ?>" method="post">

			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtTenMon">Tên môn <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtTenMon" placeholder="nhập tên môn học..." value="<?php if(isset($tenmon)) echo $tenmon;?>"/> 
			        </div>
			    </div>
			    
			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="slSoTC">Số TC <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <select name="slSoTC" class="form-control">
			            	<?php
			            	for($i=1; $i<=10; $i++){
				            	?>
				            	<option <?php if($sotc==$i) echo "selected"; ?>><?php echo $i; ?></option>
				            	<?php
				            } ?>
			            </select>
			        </div>
			    </div>

			    <!-- <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtTenMon">Giảng viên <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <input type="text" class="form-control" name="txtTenMon" placeholder="nhập tài khoản giảng viên..." value="<?php //if(isset($tenmon)) echo $tenmon;?>"/> 
			        </div>
			    </div> -->

			    <!-- <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtNamBD">Năm bắt đầu <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			        	<select name="slNamBD" class="form-control">
			        		<?php 
			        		// $sql ="SELECT * FROM sinhvien WHERE sv_email = '".$_SESSION['user_name']."'";
			        		// $rs=mysqli_query($con, $sql);

			        		// $namsinh = mysqli_fetch_object($rs)->sv_ngaysinh;
			        		// $nam = substr($namsinh,0,4)*1 + 16;
			        		//for($i=$nam; $i<=2017; $i++){?>
			        			<option <?php //if($nambd*1==$i) echo "selected"; ?>><?php //echo $i; ?></option>
			        			<?php
			        		//} ?>
			        	</select>
			            
			        </div>
			    </div>
			    
			    <div class="form-group">
			        <label class="col-lg-3 control-label" for="txtNamKT">Năm kết thúc <span class="text-danger"><strong>(*)</strong></span></label>
			        <div class="col-lg-9">
			            <select name="slNamKT" class="form-control">
			        		<?php 
			        		//for($i=$nam; $i<=2017; $i++){?>
			        			<option <?php //if($namkt*1==$i) echo "selected"; ?>><?php //echo $i; ?></option>
			        			<?php
			        		//} ?>
			        	</select>
			        </div>
			    </div> -->

			    <div class="col-sm-8 pull-right" style="margin-bottom: 20px;">
			        <input type="submit" name="submit" class="btn btn-primary btn-medium" value="Đồng ý">
			    </div>
			    
			</form>
		</div> <!-- end pannel body -->
	</div> <!-- end pannel -->
</div> <!-- end col-md-6 -->
