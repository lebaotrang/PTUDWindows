<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlphatgiao&act=delete&pg_id=<?php echo $pg_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hãy chắc chắn!
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlphatgiao"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách bài viết Phật Giáo</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlphatgiao&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tiêu đề</th>
			<th>Ngày đăng</th>
			<th>Tác giả</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlphatgiao&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		
		$query = mysqli_query($con, "SELECT * FROM phat_giao"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM phat_giao ORDER BY pg_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa có bài viết nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td width="35%"><?php echo $row['pg_tieude']; ?></td>
				<td><?php echo date("d/m/Y",strtotime($row['pg_ngaydang'])); ?></td>
				<td><?php echo $row['pg_tacgia']; ?></td>
				<td width="200px" class="text-center">
					<a href="?page=qlphatgiao&act=detail&pg_id=<?php echo $row['pg_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					</a>
					<a href="?page=qlphatgiao&act=edit&pg_id=<?php echo $row['pg_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>
					<a href="?page=qlphatgiao&act=delete&pg_id=<?php echo $row['pg_id']; ?>">
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