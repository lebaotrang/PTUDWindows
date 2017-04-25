<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">DANH SÁCH CÁC LỚP ĐƯỢC PHÂN CÔNG</h3>

<?php
if(isset($_POST['submitChon'])){
	$hk=$_POST['slHocKy'];
	$nk=$_POST['slNienKhoa'];
	//echo $nk; die();
}
else{
	$hk=isset($_GET['hk']) ? $_GET['hk'] : HKy_HienTai();
	$nk=isset($_GET['nk']) ? $_GET['nk'] : NK_HienTai();
}
?>

<div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="index.php?page=qllopday&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>" method="POST" class="form-inline">
			<?php //echo isset($dt_id) ? showDaoTaoList($con, $dt_id) : showDaoTaoList($con); ?>
			<?php echo isset($hk) ? showHocKy($con, $hk) : showHocKy($con); ?>
			<?php echo isset($nk) ? showNienKhoa($con, $nk) : showNienKhoa($con); ?>
			<input type="submit" name="submitChon" value="Chọn" class="btn btn-info">
		</form>
	</div>
<div class="col-lg-3"></div>
</div>
<?php
if(!isset($_GET['hknk_id'])){
	$a="SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
	$qra=mysqli_query($con, $a);
	$hknk_id=mysqli_fetch_object($qra)->hknk_id;
}
else
	$hknk_id=$_GET['hknk_id'];

//nhan id lop
$l_id = isset($_GET['l_id']) ? $_GET['l_id'] :0;
?>
<div id="ketquaajax" style="margin-bottom: 15px;" class="text-center">
	<?php
	$b="SELECT * FROM lop WHERE hknk_id=$hknk_id AND nv_id=$nv_id";
	$qrb=mysqli_query($con, $b);
	while($row=mysqli_fetch_object($qrb)){ ?>
		<a href="index.php?page=qllopday&act=nhapdiem&l_id=<?php echo $row->l_id ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>">
		<input type="button" name="" value="<?php echo $row->l_ten; ?>" class="btn btn-sm <?php echo $row->l_id==$l_id ? 'btn-primary' : 'btn-info'; ?>">
		</a>
		<?php
	}
	?>
</div>

<div class="col-lg-12">
<form action="index.php?page=qllopday&act=nhapdiem&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&hknk_id=<?php echo $hknk_id; ?>&l_id=<?php echo $l_id ?>" method="post">
<table class="table table-bordered table-responsive">
	<tr>
		<th>STT</th>
		<th>Họ tên SV</th>
		<th>Học phần</th>
		<th>Điểm lần 1</th>
		<th>Điểm lần 2</th>
		<th>Trung bình</th>
	</tr>
	<?php
	if($l_id!=0 && is_numeric($l_id)){ 
		$c="SELECT * FROM sinhvien a, ketqua b WHERE a.sv_id=b.sv_id AND l_id=$l_id";
		$qrc=mysqli_query($con, $c); 
		$i=1;
		$j=0;
		while($row=mysqli_fetch_object($qrc)){ ?>
		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $row->sv_hoten; ?></td>
			<td>
				<?php 
				$d="SELECT * FROM monhoc a, lop b WHERE a.mh_id=b.mh_id AND l_id=$row->l_id";
				$qrd=mysqli_query($con, $d); 
				echo mysqli_fetch_object($qrd)->mh_ten;
				?>
			</td>
			<td><input type="number" name="dl1[]" class="form-control" value="<?php echo isset($dl1) ? $dl1[$j] : $row->kq_diemlan1; ?>" step="any" max=10 min=-1 required></td>
			<td><input type="number" name="dl2[]" class="form-control" value="<?php if(isset($dl2)) echo $dl2[$j]; else {echo $row->kq_diemlan2==-1 ? NULL :  $row->kq_diemlan2;} ?>" max=10 min=-1 step="any"></td>
			<td>
				<input type="number" name="" class="form-control" readonly value="<?php echo $row->kq_trungbinh; ?>">
				<input type="hidden" name="sv_id[]" value="<?php echo $row->sv_id; ?>">
			</td>
		</tr>
			<?php
			$j++;
		}//end while
		?>
		<tr>
			<td colspan="6" class="text-center">
				<input type="submit" name="submit" value="Đồng ý" class="btn btn-info">
			</td>
		</tr>
		<?php
	}
	?>
</table>
</form>
</div>