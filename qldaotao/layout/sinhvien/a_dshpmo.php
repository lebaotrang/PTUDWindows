<?php
session_start();
include_once "../../db/dbcon.php";
$hk = isset($_GET['slhocky']) ? $_GET['slhocky'] : HKy_Hientai();
$nk = isset($_GET['slnienkhoa']) ? $_GET['slnienkhoa'] : NK_Hientai();

$sql = "SELECT * FROM sinhvien WHERE sv_email='".$_SESSION['user_name']."'";
$qr = mysqli_query($con, $sql);
$row = mysqli_fetch_object($qr);
$dt_id = $row->dt_id;
$sv_id = $row ->sv_id;

$sql = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
$qr = mysqli_query($con, $sql);
$hknk_id = mysqli_fetch_object($qr)->hknk_id;

$sql1 = "SELECT * FROM monhoc WHERE mh_id IN 
		(SELECT m_id FROM hockynienkhoa a, hknk_mon b 
		WHERE hocky=$hk AND nienkhoa=$nk AND a.hknk_id=b.hknk_id) AND dt_id=$dt_id";
//echo $sql1;
$qr1 = mysqli_query($con, $sql1);

$sql2 = "SELECT * FROM sinhvien a, dangkymonhoc b, monhoc c
		 WHERE a.sv_id=b.sv_id AND b.mh_id=c.mh_id AND a.sv_id=$sv_id AND hknk_id=$hknk_id";
//echo $sql2;
$qr2 = mysqli_query($con, $sql2);

$i=1;
?>
<div class="col-lg-6">
		<h3 class="text-center text-danger">DANH SÁCH CÁC MÔN ĐƯỢC MỞ</h3>
		<form method="POST" action="index.php?page=qldangkyhp&act=dangkyhp">
		<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>STT</th>
					<th><input type="checkbox" id="checkall"></th>
					<th>Tên HP</th>
					<th>Tín chỉ</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				while($row=mysqli_fetch_object($qr1)){ //var_dump($row);?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->mh_id; ?>"></td>
						<td><?php echo $row->mh_ten; ?></td>
						<td><?php echo $row->mh_tinchi; ?>
							<input type="hidden" name="hk" value="<?php echo $hk; ?>">
							<input type="hidden" name="nk" value="<?php echo $nk; ?>">
						</td>
					</tr>
					<?php
				} ?>
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-center">
						<input type="submit" name="submitHP" value="Đăng ký" class="btn btn-info" id="submitHP">
					</td>
				</tr>
			</tfoot>
			
		</table>
		</form>
	</div>

	<div class="col-lg-6">
		<h3 class="text-center text-danger">DANH SÁCH CÁC MÔN ĐĂNG KÝ</h3>
		<form method="POST" action="index.php?page=qldangkyhp&act=huydangkyhp">
		<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
			<thead>
				<tr>
					<th>STT</th>
					<th><input type="checkbox" id="checkallhuy"></th>
					<th>Tên HP</th>
					<th>Tín chỉ</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				while($row=mysqli_fetch_object($qr2)){ //var_dump($row);?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><input type="checkbox" name="idhuy[]" value="<?php echo $row->mh_id; ?>"></td>
						<td><?php echo $row->mh_ten; ?></td>
						<td><?php echo $row->mh_tinchi; ?>
							<input type="hidden" name="hk" value="<?php echo $hk; ?>">
							<input type="hidden" name="nk" value="<?php echo $nk; ?>">
						</td>
					</tr>
					<?php
				} ?>
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-center">
						<input type="submit" name="submitHuyHP" value="Hủy đăng ký" class="btn btn-danger" id="submitHuyHP">
					</td>
				</tr>
			</tfoot>
			
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
		});

   	$('#submitHP').click(function() {
			
		count = $('input:checked').length;
		if(count<=0)
		{
			alert('Lựa chọn môn học!');
			return false;
		}
	});
});
</script>