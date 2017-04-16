<div class="container">
	<h2 class="text-center text-info">Chi tiết Bài viết</h2>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="?page=qlphatgiao"><button type="button" class="btn btn-xs btn-success" value="Trở về">
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
					$sql="SELECT * FROM phat_giao WHERE pg_id=$pg_id";
			
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL!');
					if(mysqli_num_rows($qr)<=0)
						redirect("?page=qltintuc",0);
					$row=mysqli_fetch_array($qr); ?>
					<tr><td width="25%">Tiêu đề</td><td class="text-justify"><?php echo $row['pg_tieude']; ?></td></tr>
					<tr><td>Tóm tắt</td><td class="text-justify"><?php echo $row['pg_tomtat']; ?></td></tr>
					<tr><td>Tác giả</td><td class="text-justify"><?php echo $row['pg_tacgia']; ?></td></tr>
					<tr><td>Ngày đăng</td><td class="text-justify"><?php echo date('d-m-Y', strtotime($row['pg_ngaydang'])); ?></td></tr>
					<tr>
						<td>Ảnh Đ.diện</td><td>
						<img src="<?php echo "../img/phatgiao/".$row['pg_hinhdaidien'];?>" class="img-thumbnail"/>
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
						<td colspan="2"><?php echo html_entity_decode($row['pg_noidung']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	
	</div>
</div>