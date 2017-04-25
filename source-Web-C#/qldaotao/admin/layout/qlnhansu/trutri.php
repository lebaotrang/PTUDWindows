<?php if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!'); ?>
<script language="javascript">
	$(document).ready(function() {
		$('#checkall').click(function(){
			if( $(this).is(':checked') ){
				$('input[type=checkbox]').prop('checked', true);
			}
			else{
				$('input[type=checkbox]').prop('checked', false);
			}
		})
		
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
<h2 class="text-center text-info">Danh sách các tự viện chưa có trụ trì</h2>
<form action="index.php?page=qlnhansu&ns_id=<?php echo $ns_id;?>&act=trutri" method="POST">
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th><input type="radio" id="rdcheck"></th>
			<th>Tên tự viện</th>
			<th>Điện thoại</th>
			<th>Địa chỉ</th>
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

		$query = mysqli_query($con, "SELECT * FROM tu_vien tv WHERE tv.tv_id NOT IN (SELECT tv_id FROM tuvien_nhansu tv_ns WHERE tv_ns_trutri=1)"); 
		$tongsodong = mysqli_num_rows($query);

		$sql="SELECT * FROM tu_vien tv WHERE tv.tv_id NOT IN (SELECT tv_id FROM tuvien_nhansu tv_ns WHERE tv_ns_trutri=1) ORDER BY tv.tv_id DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Không có tự viện nào chưa lập trụ trì!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++; ?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><input type="radio" name="rdcheck" value="<?php echo $row["tv_id"]; ?>" class="chkDongY" stt="<?php echo $row['tv_id']; ?>" id="chkDongY<?php echo $row['tv_id']; ?>"></td>
				<td><?php echo $row['tv_ten']; ?></td>
				<td><?php echo $row['tv_dienthoai']; ?></td>
				<td><?php echo $row['tv_diachi']; ?></td>
				<td class="text-center">
					<button type="submit" name="submit" class="btn btn-xs btn-success btnDangKy" id="btnDangKy<?php echo $row['tv_id'] ?>" disabled>Chọn</button>
				</td>
			</tr> <?php
		}
		?>
	</tbody>
</table>
</form>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>