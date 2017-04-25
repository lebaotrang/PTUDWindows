<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltuvien&act=deletepeople&ns_id=<?php echo $ns_id; ?>&tv_id=<?php echo $tv_id ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Tăng-Ni này chỉ thuộc duy nhất 1 tự viện! Bạn có chắc xóa hẳn người này khỏi Cơ sở dữ liệu?
				<input type="hidden" name="ns_id" value="<?php echo $ns_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="index.php?page=qltuvien&act=list&tv_id=<?php echo $tv_id ?>"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách nhân sự</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qltuvien"><button type="button" class="btn btn-xs btn-success" value="Trở về">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Pháp danh</th>
			<th>Điện thoại</th>
			<th>TĐ.Văn hóa</th>
			<th>TĐ.Phật học</th>
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
		$query = mysqli_query($con, "SELECT * FROM nhan_su ns, tuvien_nhansu tv_ns WHERE ns.ns_id=tv_ns.ns_id AND tv_ns.tv_id=$tv_id"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM nhan_su ns, tuvien_nhansu tv_ns WHERE ns.ns_id=tv_ns.ns_id AND tv_ns.tv_id=$tv_id ORDER BY ns.ns_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa cập nhật nhân sự cho Chùa này!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr <?php if($row['tv_ns_trutri']==1) echo "class='danger'"; ?>>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['ns_phapdanh']; if($row['tv_ns_trutri']==1) echo " (Trụ trì)";?></td>
				<td><?php echo $row['ns_dienthoai']; ?></td>
				<td><?php echo $row['ns_td_vanhoa']; ?></td>
				<td><?php echo $row['ns_td_phathoc']; ?></td>
				<td class="text-center">
				<a href="?page=qltuvien&act=deletepeople&ns_id=<?php echo $row['ns_id']; ?>&tv_id=<?php echo $tv_id; ?>">
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