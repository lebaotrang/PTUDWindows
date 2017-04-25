<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<?php
$dt_id = isset($_GET['dt_id']) ? $_GET['dt_id'] : 1;
$hk = isset($_GET['hk']) ? $_GET['hk'] : HKy_Hientai();
$nk = isset($_GET['nk']) ? $_GET['nk'] : NK_Hientai();
$mh_id = isset($_GET['mh_id']) ? $_GET['mh_id'] : 0;
$l_id = isset($_GET['l_id']) ? $_GET['l_id'] : 0;

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
$c="SELECT * FROM dangkymonhoc a, sinhvien b 
	WHERE a.sv_id=b.sv_id AND hknk_id=$hknk_id AND mh_id=$mh_id 
	AND a.sv_id NOT IN (SELECT sv_id FROM ketqua WHERE l_id=$l_id)"; //echo $c;
$qrc = mysqli_query($con, $c);
$sosv = mysqli_num_rows($qrc);

//so lop
$solop = ceil($sosv/40); //echo $solop;
?>
<h3 class="text-center text-danger">Mở lớp học phần <?php echo $mh_ten; ?></h3>

<div class="col-lg-12">
	<form action="index.php?page=khdaotao&act=themsv" method="POST">
	<table class="table table-bordered table-responsive" style="margin-top: 10px;">
		<tr>
			<th>STT</th>
			<th><input type="checkbox" id="checkall"></th>
			<th>Tên SV</th>
			<th>GT</th>
			<th>Tài khoản</th>
			<!-- <th>Số SV</th> -->
		</tr>
		<?php
		$i=1;
	while ($row=mysqli_fetch_object($qrc)) { ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><input type="checkbox" name="id[]" value="<?php echo $row->sv_id; ?>"></td>
			<td><?php echo $row->sv_hoten; ?></td>
			<td><?php echo $row->sv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
			<td><?php echo $row->sv_email; ?>
				<input type="hidden" name="dt_id" value="<?php echo $dt_id; ?>">
				<input type="hidden" name="hk" value="<?php echo $hk; ?>">
				<input type="hidden" name="nk" value="<?php echo $nk; ?>">
				<input type="hidden" name="mh_id" value="<?php echo $mh_id; ?>">
				<input type="hidden" name="l_id" value="<?php echo $l_id; ?>">
			</td>
			<!-- <td><?php //echo $sosv; ?></td> -->
		</tr>
		<?php
	}
	?>
		<tr>
			<td colspan="5" class="text-center">
				<input type="submit" name="submitSV" id="submitSV" class="btn btn-xs btn-info" value="Thêm SV">
			</td>
		</tr>
	</table>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#checkall').click(function()
    	{
			if( $(this).is(':checked') )
			{
				$('input[type=checkbox]').attr('checked', true);//prop('checked', true) dat all thuoc tinh check bang true
			}
			else
			{
				$('input[type=checkbox]').attr('checked', false);
			}
		})

   	$('#submitSV').click(function() {
			
		count = $('input:checked').length;
		if(count<=0)
		{
			alert('Lựa chọn sinh viên!');
			return false;
		}
	});
});
</script>