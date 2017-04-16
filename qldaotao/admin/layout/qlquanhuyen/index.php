<div class="container">

<h2 class="text-center text-info">Danh sách khu vực trực thuộc Hậu Giang</h2>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên Quận Huyện</th>
			<th>Trưởng Ban trị sự</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlquanhuyen&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM quan_huyen"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM quan_huyen ORDER BY qh_id limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa cập nhật quận huyện nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++; ?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['qh_ten']; ?></td>
				<td>
				<?php 
				$sql1="SELECT * FROM nhan_su ns, quanhuyen_nhansu qh_ns WHERE ns.ns_id=qh_ns.ns_id AND qh_ns_quyen='Trưởng ban' AND qh_id=$row[qh_id];";
				$qr1=mysqli_query($con, $sql1);
				$count=mysqli_num_rows($qr1);
				if($count>0){
					$row=mysqli_fetch_array($qr1);
					echo "<strong class=text-danger>$row[ns_phapdanh]</strong>";
				}
				else
					echo "Đang cập nhật";
				?>
				</td>
				<td class="text-center">
					<?php
					if($count<=0){
					?>
					<a href="?page=qlquanhuyen&act=truongban&qh_id=<?php echo $row['qh_id']; ?>">
						<button type="button" class="btn btn-xs btn-primary" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Tr.Ban</button>
					</a>
					<?php
					}
					else{ ?>
						<button type="button" class="btn btn-xs btn-primary" value="Xem" disabled><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Tr.Ban</button>
					<?php
					} ?>
					
					<?php
					if($count>0){
					?>
					<a href="?page=qlquanhuyen&act=huytruongban&qh_ns_id=<?php echo $row['qh_ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Hủy Tr.Ban</button>
					</a>
					<?php
					}
					else{ ?>
						<button type="button" class="btn btn-xs btn-warning" value="Xem" disabled><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Hủy Tr.Ban</button>
					<?php
					} ?>
					<a href="?page=qlquanhuyen&act=bonhiem&qh_id=<?php echo $row['qh_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;PB&UV</button>
					</a>
					<a href="?page=qlquanhuyen&act=list&qh_id=<?php echo $row['qh_id']; ?>">
						<button type="button" class="btn btn-xs btn-success" value="Nhân sự"><span class="glyphicon glyphicon-user"></span>&nbsp;Nhân sự</button>
					</a>
				</td>
			</tr> <?php
		}
		?>
	</tbody>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>