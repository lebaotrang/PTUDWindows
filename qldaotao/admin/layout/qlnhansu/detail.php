<div class="container">
	<h2 class="text-center text-info">Thông tin chi tiết</h2>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="?page=qlnhansu"><button type="button" class="btn btn-xs btn-success" value="Trở về">
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
					$sql="SELECT * FROM nhan_su WHERE ns_id=$ns_id";
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL!');
					if(mysqli_num_rows($qr)>0){ 
						$row=mysqli_fetch_array($qr); ?>
						<tr>
							<td width="100px">Họ tên</td><td><?php echo $row['ns_hoten']; ?></td>
						</tr>
						<tr>
							<td>Pháp danh</td><td class="text-info"><b><?php echo $row['ns_phapdanh']; ?></b></td>
						</tr>
						<tr>
							<td>CMND</td><td><?php echo $row['ns_cmnd']; ?></td>
						</tr>
						<tr>
							<td>Năm sinh</td><td><?php echo $row['ns_namsinh']; ?></td>
						</tr>
						<tr>
							<td>Văn hóa</td><td><?php echo $row['ns_td_vanhoa']; ?></td>
						</tr>
						<tr>
							<td>Phật học</td><td><?php echo $row['ns_td_phathoc']; ?></td>
						</tr>
						<tr>
							<td>Điện thoại</td><td><?php echo $row['ns_dienthoai'];; ?></td>
						</tr>
						<tr>
							<td>Quê quán</td><td><?php echo $row['ns_quequan'];; ?></td>
						</tr>
						<tr>
							<td>Tự viện</td>
							<td>
								<?php 
								$sql1="SELECT * FROM tu_vien tv, tuvien_nhansu tv_ns WHERE tv.tv_id=tv_ns.tv_id AND tv_ns.ns_id=$row[ns_id]";
								$qr1=mysqli_query($con, $sql1);
								if(!$qr1) die("Lỗi truy vấn CSDL!");
								while($row1=mysqli_fetch_array($qr1)){
									$trutri="";
									if($row1['tv_ns_trutri']!=0)
										$trutri="<i class=text-info> (Trụ trì)</i>";
									echo "<b class=text-danger><span class='glyphicon glyphicon-hand-right'></span> ".$row1['tv_ten']."</b>".$trutri."<br/>";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Ban ngành</td>
							<td>
								<?php 
								$sql1="SELECT * FROM ban_nganh bn, bannganh_nhansu bn_ns WHERE bn.bn_id=bn_ns.bn_id AND ns_id=$row[ns_id]";
								$qr1=mysqli_query($con, $sql1);
								if(!$qr1) die("Lỗi truy vấn CSDL!");
								while($row1=mysqli_fetch_array($qr1)){
									echo "<b class=text-danger><span class='glyphicon glyphicon-hand-right'></span> ".$row1['bn_ten']."</b><i class=text-info> ($row1[bn_ns_quyen])</i><br/>";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Ban trị sự</td>
							<td>
								<?php 
								$sql1="SELECT * FROM quan_huyen qh, quanhuyen_nhansu qh_ns WHERE qh.qh_id=qh_ns.qh_id AND ns_id=$row[ns_id] ORDER BY qh_ns_trangthai DESC, qh_ns_quyen ASC";
								$qr1=mysqli_query($con, $sql1);
								if(!$qr1) die("Lỗi truy vấn CSDL!");
								while($row1=mysqli_fetch_array($qr1)){
									echo "<b class=text-danger><span class='glyphicon glyphicon-hand-right'></span> ".$row1['qh_ten']."</b><i class=text-info> ($row1[qh_ns_quyen])</i><br/>";
								}
								?>
							</td>
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
					$sql1="SELECT * FROM hinh_nhan_su hns WHERE hns.ns_id=$ns_id LIMIT 1";
					$qr1=mysqli_query($con, $sql1);
					if(!$qr1) die('Lỗi truy vấn CSDL');
					if(mysqli_num_rows($qr1)>0){ 
						$row1=mysqli_fetch_array($qr1); 
						if(strcmp($row1['hns_url'], "no_image.gif")==0)
							$link="../img/"; 
						else
							$link="../img/nhansu/"; ?>
						<tr>
							<td width="40%"><img src="<?php echo $link.$row1['hns_url'];?>" class="img-responsive"></img></td>
							<td><?php if(empty($row['ns_tieusu'])) echo "Tiểu sử chưa được cập nhật!"; else echo html_entity_decode($row['ns_tieusu']); ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>