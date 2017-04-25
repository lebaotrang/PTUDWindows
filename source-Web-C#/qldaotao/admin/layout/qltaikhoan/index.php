<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltaikhoan&act=delete&qt_ma=<?php echo $qt_ma; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Hãy nhập password của tài khoản bạn muốn xóa!</p> <br/>
				<input type="hidden" name="qt_ma" value="<?php echo $qt_ma; ?>">
				<input type="password" name="pass" placeholder="Nhập mật khẩu..." id="pass" class="form-control" value="<?php if (isset($pass)) echo $pass; ?>" required>
				<br/>
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltaikhoan"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách tài khoản quản trị khác</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qltaikhoan&act=add">
			<button type="button" class="btn btn-xs btn-success" value="Thêm mới"><span class="glyphicon glyphicon-plus"></span>&nbsp;Thêm mới</button>
		</a>
	</div>
</div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tài khoản</th>
			<th>Họ tên</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qltaikhoan&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM quantri WHERE qt_quyen=1 AND qt_tendangnhap!='$_SESSION[admin_name]'"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM quantri WHERE qt_quyen=1 AND qt_tendangnhap!='$_SESSION[admin_name]' ORDER BY qt_ma DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=7>Chưa có tài khoản nào khác tài khoản của bạn!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++
			?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['qt_tendangnhap']; ?></td>
				<td><?php echo $row['qt_ten']; ?></td>
				<td class="text-center">
					<a href="?page=qltaikhoan&act=delete&qt_ma=<?php echo $row['qt_ma']; ?>">
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