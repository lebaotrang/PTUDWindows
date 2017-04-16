<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlnhac&act=delete&an_id=<?php echo $an_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Hãy chắc chắn thao tác này!</p> <br/>
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlnhac"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách File Mp3</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlnhac&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên file</th>
			<th>Lượt tải</th>
			<th>Nghe</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlnhac&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM am_nhac"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM am_nhac ORDER BY an_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=7>Chưa có file nhạc nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['an_tenfile']; ?></td>
				<td><?php echo $row['an_luottai']; ?></td>
				<td>
					<audio controls>
						<source src="<?php echo "../file/music/".$row['an_url']; ?>" type="audio/mpeg">Browser can not display this file. please update your browser!
					</audio>
				</td>
				<td class="text-center">
					<!--<a href="?page=qlnhac&act=edit&an_id=<?php echo $row['an_id']; ?>">
						<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>-->
					<a href="?page=qlnhac&act=delete&an_id=<?php echo $row['an_id']; ?>">
						<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa</button>
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