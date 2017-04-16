<div class="container">
	<h2 class="text-center text-info">Thông tin chi tiết</h2>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="?page=qltuvien"><button type="button" class="btn btn-xs btn-success" value="Trở về">
			<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<table class="table table-striped table-hover table-bordered col-md-6">
				<thead>
					<tr>
						<th class="text-center" colspan="2">Thông tin cơ bản</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT * FROM tu_vien tv, quan_huyen qh WHERE qh.qh_id=tv.qh_id AND tv.tv_id=$tv_id";
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL');
					if(mysqli_num_rows($qr)>0){ 
						$row=mysqli_fetch_array($qr); ?>
						<tr>
							<td width="100px">Tên</td><td><?php echo $row['tv_ten']; ?></td>
						</tr>
						<tr>
							<td>Tóm tắt</td><td class="text-justify"><?php echo $row['tv_tomtat']; ?></td>
						</tr>
						<tr>
							<td>Điện thoại</td><td><?php echo $row['tv_dienthoai'];; ?></td>
						</tr>
						<tr>
							<td>Trụ trì</td>
							<td><?php 
								$sql1="SELECT * FROM tuvien_nhansu tv_ns, nhan_su ns WHERE ns.ns_id=tv_ns.ns_id AND tv_ns.tv_id=$row[tv_id] AND tv_ns.tv_ns_trutri=1";
								$qr1=mysqli_query($con, $sql1);
								if(!$qr1) die('Lỗi truy vấn CSDL');
								$count=mysqli_num_rows($qr1);
								if($count!=0){
									$row1=mysqli_fetch_array($qr1);
									echo "<b class=text-danger>".$row1['ns_phapdanh']."</b>";
								}
								else
									echo "Đang cập nhật"; ?>
							</td>
						</tr>
						<tr>
							<td>Khu vực</td><td><?php echo $row['qh_ten'];; ?></td>
						</tr>
						<tr>
							<td>Địa chỉ</td><td><?php echo $row['tv_diachi'];; ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-8">
			<table class="table table-striped table-hover table-bordered col-md-6">
				<thead>
					<tr>
						<th class="text-center" colspan="2">Tiểu sử</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT * FROM tu_vien tv, hinh_tu_vien htv
						  WHERE  htv.tv_id=tv.tv_id AND htv.htv_trangthai=1 AND htv.tv_id=$tv_id LIMIT 1";
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL');
					if(mysqli_num_rows($qr)>0){ 
						$row=mysqli_fetch_array($qr); 
						?>
						<tr>
							<td width="40%"><img src="<?php echo "../img/tuvien/".$row['htv_url'];?>" class="img-responsive"></img></td>
							<td><?php if(empty($row['tv_tieusu'])) echo "Tiểu sử chưa được cập nhật!"; else echo html_entity_decode($row['tv_tieusu']); ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>