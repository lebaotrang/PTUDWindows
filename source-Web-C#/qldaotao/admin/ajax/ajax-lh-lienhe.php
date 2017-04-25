<?php
include_once "../../db/dbcon.php";
include_once "../../function/function.php";
$lh_id= isset($_GET['lh_id']) ? (int) $_GET['lh_id'] : 0;
?>

	<thead>
		<tr>
			<th colspan="2">Chi tiết góp ý</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM lien_he WHERE lh_id=$lh_id";
		$qr=mysqli_query($con, $sql);
		if(!$qr) die("Lỗi truy vấn CSDL!");
		$row=mysqli_fetch_array($qr); ?>
			<tr>
				<td width="30%">Họ tên</td>
				<td><?php echo $row['lh_hoten']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $row['lh_email']; ?></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><?php echo $row['lh_diachi']; ?></td>
			</tr>
			<tr>
				<td>Điện thoại</td>
				<td><?php echo $row['lh_dienthoai']; ?></td>
			</tr>
			<tr>
				<td>Tiêu đề</td>
				<td><?php echo $row['lh_tieude']; ?></td>
			</tr>
			<tr>
				<td>Ngày gửi</td>
				<td><?php echo date('d-m-Y',strtotime($row['lh_ngaygui'])); ?></td>
			</tr>
			<tr>
				<td>Trạng thái</td>
				<td><?php if ($row['lh_trangthai']==1) echo "<strong>Chưa trả lời<strong>"; else "Đã trả lời"; ?></td>
			</tr>
			<tr>
				<td>Nội dung</td>
				<td><textarea rows="9" cols="80"><?php  echo $row['lh_noidung']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><button type="button" class="btn btn-sm btn-danger" id="detailContactClose">Đóng</button></td>
			</tr>
	</tbody>
	
	<script language="javascript">
	$(document).ready(function() {
		//dong table dang nhap
		$('#detailContactClose').click(function() {
			$('#popup').hide('slow');
		});
    });
	</script>