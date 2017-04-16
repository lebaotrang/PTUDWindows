<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlbannganh&act=delete&bn_id=<?php echo $bn_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hình ảnh liên quan sẽ bị xóa và nhân sự trực thuộc trở về trạng thái không thuộc tự viện nào!
				<input type="hidden" name="bn_id" value="<?php echo $bn_id; ?>">
				<!--<input type="hidden" name="hbn_id" value="<?php //echo $hbn_id; ?>">-->
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlbannganh"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách các ban ngành trực thuộc</h2>
<!--<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlbannganh&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>-->
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên ban ngành</th>
			<th>Trưởng ban</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlbannganh&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM ban_nganh"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM ban_nganh ORDER BY bn_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa cập nhật ban ngành nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++; ?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['bn_ten']; ?></td>
				<td>
				<?php 
				$sql1="SELECT * FROM nhan_su ns, bannganh_nhansu bn_ns WHERE ns.ns_id=bn_ns.ns_id AND bn_ns_quyen='Trưởng ban' AND bn_id=$row[bn_id];";
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
					<a href="?page=qlbannganh&act=truongban&bn_id=<?php echo $row['bn_id']; ?>">
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
					<a href="?page=qlbannganh&act=huytruongban&bn_ns_id=<?php echo $row['bn_ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Hủy Tr.Ban</button>
					</a>
					<?php
					}
					else{ ?>
						<button type="button" class="btn btn-xs btn-warning" value="Xem" disabled><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Hủy Tr.Ban</button>
					<?php
					} ?>
					<a href="?page=qlbannganh&act=bonhiem&bn_id=<?php echo $row['bn_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;PB&UV</button>
					</a>
					<a href="?page=qlbannganh&act=list&bn_id=<?php echo $row['bn_id']; ?>">
						<button type="button" class="btn btn-xs btn-success" value="Nhân sự"><span class="glyphicon glyphicon-user"></span>&nbsp;Nhân sự</button>
					</a>
					<!--<a href="?page=qlbannganh&act=delete&bn_id=<?php echo $row['bn_id']; ?>">
						<button type="button" class="btn btn-xs btn-danger" value="Xóa"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa</button>
					</a>-->
				</td>
			</tr> <?php
		}
		?>
	</tbody>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>