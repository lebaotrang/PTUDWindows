<?php
include_once "../../db/dbcon.php";
$daotao=isset($_GET['sldaotao']) ? $_GET['sldaotao'] : 0;
$hk = isset($_GET['slhocky']) ? $_GET['slhocky'] : HKy_Hientai();
$nk = isset($_GET['slnienkhoa']) ? $_GET['slnienkhoa'] : NK_Hientai();

$sql = "SELECT * FROM monhoc WHERE mh_id IN (SELECT m_id FROM hockynienkhoa a, hknk_mon b WHERE hocky=$hk AND nienkhoa=$nk AND a.hknk_id=b.hknk_id) AND dt_id=$daotao";
//echo $sql;
$qr = mysqli_query($con, $sql);
$i=1;
?>
<form method="POST" action="index.php?page=khdaotao&act=xoamon">
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">

<thead>
	<tr>
		<th>STT</th>
		<th><input type="checkbox" id="checkall"></th>
		<th>Tên HP</th>
		<th>Tín chỉ</th>
		<th>Số SVĐK</th>
		<th>Tùy chọn</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_object($qr)){ ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><input type="checkbox" name="id[]" value="<?php echo $row->mh_id; ?>"></td>
		<td><?php echo $row->mh_ten; ?></td>
		<td><?php echo $row->mh_tinchi; ?>
			<input type="hidden" name="dt_id" value="<?php echo $daotao; ?>">
			<input type="hidden" name="hk" value="<?php echo $hk; ?>">
			<input type="hidden" name="nk" value="<?php echo $nk; ?>">
		</td>
		<td>
			<?php
			$a = "SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
			$qra = mysqli_query($con, $a);
			$hknk_id = mysqli_fetch_object($qra)->hknk_id;
			$b="SELECT * FROM dangkymonhoc WHERE hknk_id=$hknk_id AND mh_id=$row->mh_id";
			//echo $b;
			$qrb = mysqli_query($con, $b);
			$sosv = mysqli_num_rows($qrb);
			echo $sosv;
			?>
		</td>
		<td>
			<?php
			if($sosv!=0){ ?>
				<a href="index.php?page=khdaotao&act=molop&dt_id=<?php echo $daotao; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>">
				<input type="button" name="btnMoLop" value="Mở lớp" class="btn btn-sm btn-info">
				</a>
				<?php
			}
			else{?>
				<input type="button" name="btnMoLop" value="Mở lớp" class="btn btn-sm btn-info" disabled>
				<?php
			} ?>
		</td>
	</tr>
	<?php
} ?>
<tfoot>
	<tr>
		<td colspan="6" class="text-center">
			<input type="submit" name="submitHP" value="Đồng ý xóa" class="btn btn-danger" id="submitHP">
		</td>
	</tr>
</tfoot>

</table>
</form>
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