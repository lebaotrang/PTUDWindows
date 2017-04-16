<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlquanhuyen&act=deletepeople&qh_ns_id=<?php echo $qh_ns_id; ?>&qh_id=<?php echo $qh_id ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này!
				<input type="hidden" name="qh_ns_id" value="<?php echo $qh_ns_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="index.php?page=qlquanhuyen&act=list&qh_id=<?php echo $qh_id ?>">
					<button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button>
				</a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách nhân sự</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qlquanhuyen"><button type="button" class="btn btn-xs btn-success" value="Trở về">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Pháp danh</th>
			<th>TĐ.Văn hóa</th>
			<th>TĐ.Phật học</th>
			<th>Chức vụ</th>
			<th>Tùy chọn</th>
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
		$query = mysqli_query($con, "SELECT * FROM nhan_su ns, quanhuyen_nhansu qh_ns WHERE ns.ns_id=qh_ns.ns_id AND qh_ns.qh_id=$qh_id"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM nhan_su ns, quanhuyen_nhansu qh_ns WHERE ns.ns_id=qh_ns.ns_id AND qh_ns.qh_id=$qh_id ORDER BY qh_ns_trangthai DESC, qh_ns_quyen ASC, ns.ns_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa cập nhật ban trị sự cho khu vực này!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr <?php if(strcmp($row['qh_ns_quyen'],"Trưởng ban")==0) echo "class='danger'"; if(strcmp($row['qh_ns_quyen'],"Phó ban")==0) echo "class='info'"; ?> >
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['ns_phapdanh'];?></td>
				<td><?php echo $row['ns_td_vanhoa']; ?></td>
				<td><?php echo $row['ns_td_phathoc']; ?></td>
				<td><?php echo $row['qh_ns_quyen']; ?></td>
				<td class="text-center">
				<a href="?page=qlquanhuyen&act=deletepeople&qh_ns_id=<?php echo $row['qh_ns_id']; ?>&qh_id=<?php echo $qh_id; ?>">
					<button type="button" class="btn btn-xs btn-danger" value="Xóa"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa tên</button>
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