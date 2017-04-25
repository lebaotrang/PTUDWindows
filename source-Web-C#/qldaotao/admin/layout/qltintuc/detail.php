<div class="container">
	<h2 class="text-center text-info">Chi tiết Tin tức</h2>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="?page=qltintuc"><button type="button" class="btn btn-xs btn-success" value="Trở về">
			<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<table class="table table-striped table-hover table-bordered col-md-6">
				<thead>
					<tr>
						<th class="text-center" colspan="2">Thông tin chung</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($tt_loai==1)
						$sql="SELECT * FROM tin_tuc tt, quan_huyen qh, ban_nganh bn WHERE tt.qh_id=qh.qh_id AND tt.bn_id=bn.bn_id AND tt_id=$tt_id";
					else
						$sql="SELECT * FROM tin_tuc tt, ban_nganh bn WHERE tt.bn_id=bn.bn_id AND tt_id=$tt_id";
			
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL!');
					if(mysqli_num_rows($qr)<=0)
						redirect("?page=qltintuc",0);
					$row=mysqli_fetch_array($qr); ?>
					<tr><td width="25%">Tiêu đề</td><td class="text-justify"><?php echo $row['tt_tieude']; ?></td></tr>
					<tr><td>Tóm tắt</td><td class="text-justify"><?php echo $row['tt_tomtat']; ?></td></tr>
					<tr><td>Người đăng</td><td class="text-justify"><?php echo $row['tt_nguoidang']; ?></td></tr>
					<tr><td>Ngày đăng</td><td class="text-justify"><?php echo date('d-m-Y', strtotime($row['tt_ngaydang'])); ?></td></tr>
					<tr><td>Loại tin</td><td class="text-justify"><?php if($row['tt_loai']==1) echo "Tin trong tỉnh"; else echo "Tin ngoài tỉnh"; ?></td></tr>
					<tr><td>Khu vực</td><td class="text-justify"><?php if($tt_loai==1) echo $row['qh_ten']; echo "Ngoài Tỉnh"; ?></td></tr>
					<tr><td>Ban ngành</td><td class="text-justify"><?php echo $row['bn_ten']; ?></td></tr>
					<tr>
						<td>Ảnh Đ.diện</td><td>
						<img src="<?php if(strcmp($row['tt_hinhdaidien'], "default-img.jpg")!=0) echo "../img/tintuc/".$row['tt_hinhdaidien']; else echo "../img/".$row['tt_hinhdaidien'];?>" class="img-thumbnail"/>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-8">
			<table class="table table-striped table-hover table-bordered col-md-6">
				<thead>
					<tr>
						<th class="text-center" colspan="2">Nội dung</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2"><?php echo html_entity_decode($row['tt_noidung']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	
	</div>
</div>