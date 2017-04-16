<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">Các môn ngành <?php echo $ctdt_ten ?></h3>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=ctdaotao&act=xoamon&dt_id=<?php echo $dt_id; ?>&mh_id=<?php echo $mh_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này?
				<input type="hidden" name="nn_id" value="<?php echo $nn_id; ?>">
				<!--<input type="hidden" name="hnn_id" value="<?php //echo $hnn_id; ?>">-->
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltaikhoan"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<a href="index.php?page=ctdaotao&act=themmon&dt_id=<?php echo $dt_id ?>">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm mới">
</a>

<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Tên môn</th>
		<th>Số TC</th>
		<th class="text-center">Sửa</th>
		<th class="text-center" width="55px">Xóa</th>
	</tr>
	<?php
	$i=1;
	while ($monhoc = mysqli_fetch_object($qr)) {
		?>
		<form action="?page=ctdaotao&act=suamon&dt_id=<?php echo $dt_id; ?>" method="POST">
		<tr>
			<td><?php echo $i++; ?></td>
			<td>
				<input type="text" value='<?php echo $monhoc->mh_ten; ?>' name="txtTen" disabled id="txtTen<?php echo $monhoc->mh_id; ?>">
			</td>
			<td>
				<input type="number" value='<?php echo $monhoc->mh_tinchi; ?>' name="txtTinChi" disabled id="txtTinChi<?php echo $monhoc->mh_id; ?>">
			</td>
			<td class="text-center">
				<input type="radio" name="chkDongY" class="chkDongY" stt="<?php echo $monhoc->mh_id; ?>" id="chkDongY<?php echo $monhoc->mh_id; ?>" />
				<input type="hidden" name="ma" value="<?php echo $monhoc->mh_id; ?>">
                
				<button  type="submit" name="btnSuaMon" class="btn btn-xs btn-success btnSuaMon" id="btnSuaMon<?php echo $monhoc->mh_id; ?>" disabled><span class="glyphicon glyphicon-remove"></span>&nbsp;Đồng ý</button>
				
                
            </td>
            <td>
                <a href="?page=ctdaotao&act=xoamon&dt_id=<?php echo $dt_id; ?>&mh_id=<?php echo $monhoc->mh_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>
		</tr>
		</form>
		<?php
	} ?>
</table>

<br/>
<script type="text/javascript">
$(document).ready(function($){
	$(".chkDongY").click(function(){
		$(".chkDongY").attr("checked", false);
		$('.btnSuaMon').attr("disabled",true);
		$('input[name=txtTen]').attr("disabled",true); //an
		$('input[name=txtTinChi]').attr("disabled",true);
		var ma=$(this).attr('stt'); //alert(ma);
		$("#chkDongY"+ma).attr("checked", true);
		$('#btnSuaMon'+ma).attr("disabled",false);
		$('#txtTen'+ma).attr("disabled",false); //hien
		$('#txtTinChi'+ma).attr("disabled",false);
	});	
});
</script>