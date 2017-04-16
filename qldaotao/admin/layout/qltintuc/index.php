<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltintuc&act=delete&tt_id=<?php echo $tt_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hãy chắc chắn!
				<input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltintuc"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách tin tức</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qltintuc&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tiêu đề</th>
			<th>Loại tin</th>
			<th>Ngày đăng</th>
			<th>Người đăng</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qltintuc&tt_loai='.$tt_loai.'&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		if($tt_loai==1)
			$sql="SELECT * FROM tin_tuc tt, ban_nganh bn, quan_huyen qh WHERE tt.qh_id=qh.qh_id AND tt.bn_id=bn.bn_id AND tt_loai=1";
		else
			$sql="SELECT * FROM tin_tuc tt, ban_nganh bn WHERE tt.bn_id=bn.bn_id AND tt_loai=2";
		
		$query = mysqli_query($con, $sql); 
		$tongsodong = mysqli_num_rows($query);

		if($tt_loai==1)
			$sql = "SELECT * FROM tin_tuc tt, ban_nganh bn, quan_huyen qh WHERE tt.qh_id=qh.qh_id AND tt.bn_id=bn.bn_id AND tt_loai=1 ORDER BY tt_id DESC limit $s,$soproduct";
		else
			$sql = "SELECT * FROM tin_tuc tt, ban_nganh bn WHERE tt.bn_id=bn.bn_id AND tt_loai=2 ORDER BY tt_id DESC limit $s,$soproduct";
		
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa có tin tức nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td width="35%"><?php echo $row['tt_tieude']; ?></td>
				<td><?php if($row['tt_loai']==1) echo "Tin trong tỉnh"; else echo "Tin ngoài tỉnh"; ?></td>
				<td><?php echo date("d/m/Y",strtotime($row['tt_ngaydang'])); ?></td>
				<td><?php echo $row['tt_nguoidang']; ?></td>
				<td width="200px" class="text-center">
					<a href="?page=qltintuc&act=detail&tt_loai=<?php echo $row['tt_loai']; ?>&tt_id=<?php echo $row['tt_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					</a>
					<a href="?page=qltintuc&act=edit&tt_loai=<?php echo $row['tt_loai']; ?>&tt_id=<?php echo $row['tt_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>
					<a href="?page=qltintuc&act=delete&tt_id=<?php echo $row['tt_id']; ?>">
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