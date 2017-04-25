<h3 class="text-center text-danger">THÊM THÔNG TIN CÁC KHÓA HỌC</h3>
<hr>
<div class="col-lg-3"></div>
<div class="col-lg-6">
	<form class="form-horizontal" action="index.php?page=doithongtin&act=them" method="post">

	    <div class="form-group">
	        <label class="col-lg-3 control-label" for="txtMaKhoa">Mã Khóa <span class="text-danger"><strong>(*)</strong></span></label>
	        <div class="col-lg-9">
	            <input type="text" class="form-control" name="txtMaKhoa" placeholder="nhập mã khóa học..."  value="<?php if(isset($makhoa)) echo $makhoa;?>"/> 
	        </div>
	    </div>
	    
	    <div class="form-group">
	        <label class="col-lg-3 control-label" for="txtTenKhoa">Tên khóa <span class="text-danger"><strong>(*)</strong></span></label>
	        <div class="col-lg-9">
	            <input type="text" class="form-control" name="txtTenKhoa" placeholder="nhập tên khóa học..." value="<?php if(isset($tenkhoa)) echo $tenkhoa;?>"/> 
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-lg-3 control-label" for="txtNamBD">Năm bắt đầu <span class="text-danger"><strong>(*)</strong></span></label>
	        <div class="col-lg-9">
	        	<select name="slNamBD" class="form-control">
	        		<?php 
	        		$sql ="SELECT * FROM sinhvien WHERE sv_email = '".$_SESSION['user_name']."'";
	        		$rs=mysqli_query($con, $sql);

	        		$namsinh = mysqli_fetch_object($rs)->sv_ngaysinh;
	        		$nam = substr($namsinh,0,4)*1 + 16;
	        		for($i=$nam; $i<=2017; $i++){?>
	        			<option <?php if($nambd*1==$i) echo "selected"; ?>><?php echo $i; ?></option>
	        			<?php
	        		} ?>
	        	</select>
	            
	        </div>
	    </div>
	    
	    <div class="form-group">
	        <label class="col-lg-3 control-label" for="txtNamKT">Năm kết thúc <span class="text-danger"><strong>(*)</strong></span></label>
	        <div class="col-lg-9">
	            <select name="slNamKT" class="form-control">
	        		<?php 
	        		for($i=$nam; $i<=2017; $i++){?>
	        			<option <?php if($namkt*1==$i) echo "selected"; ?>><?php echo $i; ?></option>
	        			<?php
	        		} ?>
	        	</select>
	        </div>
	    </div>

	    <div class="col-sm-8 pull-right" style="margin-bottom: 20px;">
	        <input type="submit" name="submit" class="btn btn-primary btn-medium" value="Đồng ý">
	    </div>
	    
	</form>
</div>
