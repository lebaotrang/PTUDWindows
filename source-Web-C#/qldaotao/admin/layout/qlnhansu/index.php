<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlnhansu&act=delete&ns_id=<?php echo $ns_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa, hãy chắc chắn!
				<input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlnhansu"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách nhân sự</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlnhansu&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Pháp danh</th>
			<th>Trụ trì</th>
			<th>Điện thoại</th>
			<th>TĐ.Văn hóa</th>
			<th>TĐ.Phật học</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qlnhansu&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM nhan_su"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM nhan_su ORDER BY ns_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=7>Chưa có nhân sự nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['ns_phapdanh']; ?></td>
				<td><?php 
					$sql1="SELECT * FROM tuvien_nhansu WHERE ns_id=$row[ns_id] AND tv_ns_trutri=1";
					$qr1=mysqli_query($con, $sql1);
					$count=mysqli_num_rows($qr1);
					$dis="";
					if($count!=0)
						echo "<b class=text-danger>Có</b>"; 
					else
						$dis="disabled"; ?>
				</td>
				<td><?php echo $row['ns_dienthoai']; ?></td>
				<td><?php echo $row['ns_td_vanhoa']; ?></td>
				<td><?php echo $row['ns_td_phathoc']; ?></td>
				<td class="text-center">
					<a href="?page=qlnhansu&act=detail&ns_id=<?php echo $row['ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-info" value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					</a>
					<a href="?page=qlnhansu&act=edit&ns_id=<?php echo $row['ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-success" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sửa</button>
					</a>
					<a href="?page=qlnhansu&act=trutri&ns_id=<?php echo $row['ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-primary" value="Sửa"><span class="glyphicon glyphicon-user"></span>&nbsp;Trụ trì</button>
					</a>
					<?php
					if(empty($dis)) {?>
					<a href="?page=qlnhansu&act=huytrutri&ns_id=<?php echo $row['ns_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-user"></span>&nbsp;Hủy Trụ trì</button>
					</a>
					<?php
					} 
					else{ ?>
					<button type="button" class="btn btn-xs btn-warning" value="Sửa"  disabled><span class="glyphicon glyphicon-user"></span>&nbsp;Hủy Trụ trì</button>
					<?php
					} ?>
					<a href="?page=qlnhansu&act=delete&ns_id=<?php echo $row['ns_id']; ?>">
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