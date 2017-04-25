<?php
if(!isset($_SESSION['admin'])) die('Have no permision!');
?>
<script>
$(document).ready(function(){
	$(".chkDongY").click(function(){
		$(".chkDongY").prop("checked", false);
		$('.btnDangKy').prop("disabled",true);
		$('.txtTrang').prop("disabled",true);
		var ma=$(this).attr('stt'); //alert(ma);
		$("#chkDongY"+ma).prop("checked", true);
		$('#btnDangKy'+ma).prop("disabled",false);
		$('#txtTrang'+ma).prop("disabled",false);
	});	
	
});
</script>
<div class="container">
<h2 class="text-center text-info">Danh mục cài đặt</h2>
<table width="100%" border="1" cellpadding="5" class="table table-striped table-hover table-bordered">
	<thead>  
    <tr>
		<th>Số TT</th>
        <th>Tên loại</th>
		<th>Mô tả</th>
		<th>Số dòng dữ liệu</th>
        <th>Sửa</th>
		<th>Đồng ý</th>
    </tr>
	</thead>
	<?php	
	$sql = "SELECT * FROM caidat";
	$rs=mysqli_query($con, $sql);
	if(!$rs) die("Lỗi truy vấn CSDL!");
	$i=1;
	while($row=mysqli_fetch_array($rs)){?>
	<form method="POST" action="index.php?page=qlcaidat">
		<tr>
			<td class="cotSTT"><?php echo $i; ?></td>
            <td><?php echo $row["cd_ten"]; ?></a></td>
			<td><?php echo $row["cd_mota"]; ?></td>
			<td style="text-align: center">
				<input type="text" value='<?php echo $row["cd_trang"]; ?>' name="txtTrang" disabled id="txtTrang<?php echo $row['cd_ma'] ?>" class="txtTrang">
			</td>
            <td align='center' class='cotNutChucNang'>
				<input type="radio" name="chkDongY" class="chkDongY" stt="<?php echo $row['cd_ma']; ?>" id="chkDongY<?php echo $row['cd_ma']; ?>" />
				<input type="hidden" name="ma" value="<?php echo $row['cd_ma']; ?>">
			</td>
            <td align='center' class='cotNutChucNang'>
				<a href="?page=caidat&act=edit&ma=<?php echo $row['cd_ma']; ?>">
				<button  type="submit" name="btnDangKy" class="btn btn-xs btn-success btnDangKy" id="btnDangKy<?php echo $row['cd_ma'] ?>" disabled><span class="glyphicon glyphicon-remove"></span>&nbsp;Đồng ý</button>
				</a>
			</td>
        </tr>
		</form>
        <?php
		$i++;
	}
	?>
</table>
</div>
