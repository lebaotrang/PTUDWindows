<script language="javascript">
	$(document).ready(function() {
		
		$(".detailContact").click(function(){
			
			var lh_id=$(this).attr('lh_id'); //alert(lh_id);
			var data = 'lh_id='+ lh_id; //alert(data);
			$.ajax({
				type: "GET",      						// Phương thức gọi là GET
				url: "ajax/ajax-lh-lienhe.php",  				// Trang xử lý du lieu ajax
				data: data,						// Dữ liệu truyền vào
				success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
				{
					$('#tablechitiet').html(server_response).show();
				}
			});
			$('#popup').show('slow');
		});
		
		//dong table dang nhap
		$('#detailContactClose').click(function() {
			$('#popup').hide('slow');
		});

    });
</script>
<!-- Popup xem chi tiết -->
<div class="col-md-12" id="popup">
	<table id="tablechitiet" class="table table-striped table-hover table-bordered">
        	<!-- kết quả ajax -->
    </table>   
</div>
<div class="container">

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qllienhe&act=delete&lh_id=<?php echo $lh_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn có chắc xóa!
				<input type="hidden" name="lh_id" value="<?php echo $lh_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qllienhe"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<h2 class="text-center text-info">Danh sách đóng góp</h2>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Tiêu đề</th>
			<th>Ngày gửi</th>
			<th>Trạng thái</th>
			<th class="text-center">Tùy chọn</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$soproduct=getcd_trang($con, 'admin');
		$base_url= 'index.php?page=qllienhe&';
		if(isset($_GET['start']))
			$s = $_GET['start'];
		else
			$s = 0;	
		$query = mysqli_query($con, "SELECT * FROM lien_he"); 
		$tongsodong = mysqli_num_rows($query);

		$sql = "SELECT * FROM lien_he ORDER BY lh_id DESC, lh_trangthai DESC limit $s,$soproduct";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$i=0;
		if(mysqli_num_rows($qr)<=0)
			echo "<tr><td colspan=6>Chưa có đóng góp nào!</td></tr>";
		while($row=mysqli_fetch_array($qr)){
			$i++; ?>
			<tr>
				<td><?php echo $i+$s; ?></td>
				<td><?php echo $row['lh_hoten']; ?></td>
				<td><?php echo $row['lh_email']; ?></td>
				<td><?php echo $row['lh_tieude']; ?></td>
				<td><?php echo date('d-m-Y',strtotime($row['lh_ngaygui'])); ?></td>
				<td><?php if ($row['lh_trangthai']==1) echo "Chưa xem"; else "Đã xem"; ?></td>
				<td class="text-center">
					
					<button type="button" class="btn btn-xs btn-info detailContact" lh_id=<?php echo $row['lh_id'];?> value="Xem"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Xem</button>
					
					<a href="?page=qllienhe&act=edit&lh_id=<?php echo $row['lh_id']; ?>">
						<button type="button" class="btn btn-xs btn-warning" value="Sửa"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Tr.lời</button>
					</a>
					<a href="?page=qllienhe&act=delete&lh_id=<?php echo $row['lh_id']; ?>">
						<button type="button" class="btn btn-xs btn-danger" value="Xóa"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa</button>
					</a>

				</td>
			</tr> <?php
		}
		?>
	</tbody>
</table>
<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
</div>