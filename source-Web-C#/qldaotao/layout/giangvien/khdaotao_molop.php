<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<?php
$dt_id = isset($_GET['dt_id']) ? $_GET['dt_id'] : 1;
$hk = isset($_GET['hk']) ? $_GET['hk'] : HKy_Hientai();
$nk = isset($_GET['nk']) ? $_GET['nk'] : NK_Hientai();
$mh_id = isset($_GET['mh_id']) ? $_GET['mh_id'] : 0;

//$solop = isset($_POST['slSoLop']) ? $_POST['slSoLop'] : 0;

//lấy tên môn
$a = "SELECT * FROM monhoc WHERE mh_id=$mh_id";
$qra = mysqli_query($con, $a);
$mh_ten = mysqli_fetch_object($qra)->mh_ten;

//lay id hknk
$b = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
$qrb = mysqli_query($con, $b);
$hknk_id = mysqli_fetch_object($qrb)->hknk_id;

//Số SV đăng ký
$c="SELECT * FROM dangkymonhoc WHERE hknk_id=$hknk_id AND mh_id=$mh_id";
$qrc = mysqli_query($con, $c);
$sosv = mysqli_num_rows($qrc);

//so lop
$solop = ceil($sosv/40); //echo $solop;
?>
<h3 class="text-center text-danger">Mở lớp học phần <?php echo $mh_ten; ?></h3>
<div class="col-lg-5"></div>
<!-- <div class="col-lg-3">
	<form method="post" action="" class="form-inline">
		<select data-placeholder="Chọn số lượng lớp..." class="form-control" name="slSoLop" id="slSoLop">
	        <?php
	        //for($i=1; $i<=5; $i++){ ?>
	            <option value="<?php //echo $i; ?>" <?php //if($solop=="$i") echo "selected";?>><?php //echo $i." lớp"; ?></option>
	            <?php
	        //} ?>
	    </select>
		<input type="submit" name="submitSoLop" value="Đồng ý" class="btn btn-info">
	</form>
</div> -->
<br/>
<div class="col-lg-12">
	<?php
	$d = "SELECT * FROM lop WHERE mh_id=$mh_id AND hknk_id=$hknk_id";
	$qrd = mysqli_query($con, $d);
	if(mysqli_num_rows($qrd)<=0){
		for($i=1; $i<=$solop; $i++){
			$l_ten = "L".$dt_id.$mh_id."-".$hk.$nk."-".chr($i+64);
			$c = "INSERT INTO `lop`(`l_ten`, `hknk_id`, `mh_id`, `l_trangthai`) 
				  VALUES ('$l_ten',$hknk_id,$mh_id,1)"; //echo $c;
			$qrc = mysqli_query($con, $c);
		}
		redirect("index.php?page=khdaotao&act=molop&dt_id=$dt_id&hk=$hk&nk=$nk&mh_id=$mh_id",0);
	}
	?>
	<table class="table table-bordered table-responsive" style="margin-top: 10px;">
		<tr>
			<th>STT</th>
			<th>Mã lớp</th>
			<th>Tên môn</th>
			<th>HK-NK</th>
			<th>Giảng viên</th>
			<th>Số SV</th>
			<th>Tùy chọn</th>
		</tr>
		<?php
		$i=1;
	while ($row=mysqli_fetch_object($qrd)) { ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row->l_ten; ?></td>
			<td><?php echo $mh_ten; ?></td>
			<td><?php echo $hk."/".$nk."-".($nk+1); ?></td>
			<td>
				<?php 
				if($row->nv_id==NULL)
					echo "Chưa có GV";
				else{
					$e="SELECT * FROM nhanvien WHERE nv_id = $row->nv_id";
					$qre = mysqli_query($con, $e);
					$sosv = mysqli_fetch_object($qre)->nv_hoten;
					echo $sosv;
				}
				?>
			</td>
			<td>
				<?php
				$f="SELECT * FROM ketqua WHERE l_id=$row->l_id";
				$qrf=mysqli_query($con, $f);
				echo mysqli_num_rows($qrf);
				?>
			</td>
			<td>
				<a href="index.php?page=khdaotao&act=themsv&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>&l_id=<?php echo $row->l_id; ?>">
				<input type="button" name="" class="btn btn-xs btn-info" value="Thêm SV">
				</a>
				<a href="index.php?page=khdaotao&act=dssv&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>&l_id=<?php echo $row->l_id; ?>">
				<input type="button" name="" class="btn btn-xs btn-info" value="DS SV">
				</a>
				<a href="index.php?page=khdaotao&act=themgv&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>&l_id=<?php echo $row->l_id; ?>">
					<input type="button" name="" class="btn btn-xs btn-primary" value="Chọn GV">
				</a>
				<a href="index.php?page=khdaotao&act=xoalop&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>&l_id=<?php echo $row->l_id; ?>">
					<input type="button" name="" class="btn btn-xs btn-danger" value="Xóa lớp">
				</a>
			</td>
		</tr>
		<?php
	}
	?>
	</table>
</div>