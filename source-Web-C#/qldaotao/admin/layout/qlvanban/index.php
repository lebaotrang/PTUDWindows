<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlvanban&act=delete&vb_id=<?php echo $vb_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hãy chắc chắn!
				<input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlvanban"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách các văn bản</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlvanban&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên văn bản</th>
			<th>Loại VB</th>
			<th>Ngày ban hành</th>
			<th>Ban ngành</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlvanban&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM van_ban vb, ban_nganh bn, quan_huyen qh WHERE vb.qh_id=qh.qh_id AND vb.bn_id=bn.bn_id"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM van_ban vb, ban_nganh bn, quan_huyen qh WHERE vb.qh_id=qh.qh_id AND vb.bn_id=bn.bn_id ORDER BY vb_id DESC limit $s,$soproduct";
		
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa có văn bản nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td width="35%"><?php echo $row['vb_ten']; ?></td>
				<td><?php if($row['vb_loai']==1) echo "VB Pháp Lý"; else echo "VB Mẫu"; ?></td>
				<td><?php echo date("d/m/Y",strtotime($row['vb_ngaybanhanh'])); ?></td>
				<td><?php echo $row['bn_ten']; ?></td>
				<td width="200px" class="text-center">
					<a href="?page=qlvanban&act=detail&vb_id=<?php echo $row['vb_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					</a>
					<a href="?page=qlvanban&act=edit&vb_id=<?php echo $row['vb_id']; ?>&vb_loai=<?php echo $row['vb_loai']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>
					<a href="?page=qlvanban&act=delete&vb_id=<?php echo $row['vb_id']; ?>">
						<button type="button" class="btn btn-xs btn-danger" value="Xóa"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa</button>
					</a>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>