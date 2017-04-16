<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltuvien&act=delete&tv_id=<?php echo $tv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hình ảnh liên quan và toàn bộ nhân sự trực thuộc cũng bị xóa! Bạn chắc chắn thao tác này?
				<input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
				<!--<input type="hidden" name="htv_id" value="<?php //echo $htv_id; ?>">-->
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltuvien"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách các tự viện</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qltuvien&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên tu viện</th>
			<th>Điện thoại</th>
			<th>Trụ trì</th>
			<th>Khu vực</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qltuvien&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM tu_vien tv, quan_huyen qh WHERE tv_trangthai=1 and qh_trangthai=1 and tv.qh_id=qh.qh_id"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM tu_vien tv, quan_huyen qh WHERE tv_trangthai=1 and qh_trangthai=1 and tv.qh_id=qh.qh_id ORDER BY tv_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa cập nhật tự viện nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++; ?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['tv_ten']; ?></td>
				<td><?php echo $row['tv_dienthoai']; ?></td>
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
				<td><?php echo $row['qh_ten']; ?></td>
				<td class="text-center">
					<a href="?page=qltuvien&act=detail&tv_id=<?php echo $row['tv_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					</a>
					<a href="?page=qltuvien&act=edit&tv_id=<?php echo $row['tv_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>
					<a href="?page=qltuvien&act=editimg&tv_id=<?php echo $row['tv_id']; ?>">
						<button type="button" class="btn btn-xs btn-primary" value="Ảnh"><span class="glyphicon glyphicon-picture"></span>&nbsp;Ảnh</button>
					</a>
					<a href="?page=qltuvien&act=list&tv_id=<?php echo $row['tv_id']; ?>&ns_id=<?php if(isset($row1['ns_id'])) echo $row1['ns_id']; else echo 0;?>">
						<button type="button" class="btn btn-xs btn-success" value="Nhân sự"><span class="glyphicon glyphicon-user"></span>&nbsp;Người</button>
					</a>
					<a href="?page=qltuvien&act=delete&tv_id=<?php echo $row['tv_id']; ?>">
						<button type="button" class="btn btn-xs btn-danger" value="Xóa"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa</button>
					</a>
				</td>
			</tr> <?php
		}
		?>
	</tbody>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>