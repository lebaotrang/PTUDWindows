<?php
include_once "../../db/dbcon.php";
include_once "../../function/function.php";
$daotao=isset($_GET['sldaotao']) ? $_GET['sldaotao'] : 0;

/* lấy thông tin ctdt */
$sql="SELECT * FROM daotao a, dangky c WHERE a.dt_id=c.dt_id AND a.dt_id=$daotao";
//echo $sql;
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");

/* Lấy thông tin sinh viên*/
$sl = "SELECT * FROM sinhvien a, dangky b WHERE a.sv_id=b.sv_id AND b.dt_id=$daotao AND a.dt_id is NULL";
$re = mysqli_query($con, $sl);
//echo $sl;
//$sv = mysqli_fetch_object($re);

if($daotao==0){
	$sl="SELECT * FROM sinhvien WHERE dt_id is NULL order by sv_id desc";
	$re = mysqli_query($con, $sl);
}

$i=1;
?>
<form method="POST" action="index.php?page=khdaotao&act=xoamon">
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">

<thead>
	<tr>
		<th>STT</th>
		<th>Tên SV</th>
		<th>Phái</th>
		<th>Điện thoại</th>
		<th>Ngày sinh</th>
		<th>Tài khoản</th>
		<th>Số lượng ĐK</th>
		<th>Tùy chọn</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_object($re)){ ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $row->sv_hoten; ?></td>
		<td><?php echo $row->sv_gioitinh==0 ? "Nam" : "Nữ"; ?>
			<input type="hidden" name="dt_id" value="<?php echo $daotao; ?>">
		</td>
		<td><?php echo $row->sv_dienthoai; ?></td>
		<td><?php echo $row->sv_ngaysinh; ?></td>
		<td><?php echo $row->sv_email; ?></td>
		<td>
			<?php
            	$sl = "SELECT * FROM dangky WHERE sv_id=$row->sv_id";
            	$result = mysqli_query($con, $sl);
            	$sldk = mysqli_num_rows($result);
            	echo $sldk;
            ?>
		</td>
		<td class="text-center">
				<!-- <input type="button" name="detail" dt_id=<?php //echo $sinhvien->sv_id; ?> class="btn btn-xs btn-success detail" value="Chi tiết"> -->
				<a href="?page=qlsinhvien&act=svdkdetail&sv_id=<?php echo $row->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Chi tiết">
                </a>
                <!-- <a href="?page=qlsinhvien&act=edit&sv_id=<?php //echo $sinhvien->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
                </a> -->
                <a href="?page=qlsinhvien&act=xoa&sv_id=<?php echo $row->sv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>
	</tr>
	<?php
} ?>

</table>
</form>
