<?php if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!'); ?>
<script language="javascript">
	$(document).ready(function() {
		$(".chkDongY").click(function(){
			$(".chkDongY").prop("checked", false);
			$('.btnDangKy').prop("disabled",true);
			var ma=$(this).attr('stt'); //alert(ma);
			$("#chkDongY"+ma).prop("checked", true);
			$('#btnDangKy'+ma).prop("disabled",false);
		});	
    });
</script>
<div class="container">
<h2 class="text-center text-info">Bổ nhiệm chức vụ Trưởng Ban Trị sự</h2>
<div class="row">
	<div class="col-md-12">
		<form action="index.php?page=qlquanhuyen&qh_id=<?php echo $qh_id;?>&act=truongban" method="POST">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th width="40px" class="text-center"><input type=radio /></th>
					<th>Pháp danh</th>
					<th>Điện thoại</th>
					<th>TĐ.Văn hóa</th>
					<th>TĐ.Phật học</th>
					<th class="text-center">Chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$soproduct=getcd_trang($con, 'admin');
				$base_url= 'index.php?page=qlquanhuyen&act=bonhiem&';
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
						<td class="text-center">
							<input type="radio" name="rdcheck" value="<?php echo $row["ns_id"]; ?>" class="chkDongY" stt="<?php echo $row['ns_id']; ?>" id="chkDongY<?php echo $row['ns_id']; ?>">
						</td>
						<td><?php echo $row['ns_phapdanh']; ?></td>
						<td><?php echo $row['ns_dienthoai']; ?></td>
						<td><?php echo $row['ns_td_vanhoa']; ?></td>
						<td><?php echo $row['ns_td_phathoc']; ?></td>
						<td class="text-center"><button type="submit" name="submit" class="btn btn-xs btn-success btnDangKy" id="btnDangKy<?php echo $row['ns_id'] ?>" disabled>Chọn</button></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		</form>
		<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
	</div>
</div>

</div>