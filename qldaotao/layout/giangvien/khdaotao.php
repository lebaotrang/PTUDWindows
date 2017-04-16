<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">DANH SÁCH CÁC MÔN ĐƯỢC MỞ</h3>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qlsinhvien&act=xoa&sv_id=<?php echo $sv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này?
				<input type="hidden" name="nn_id" value="<?php echo $nn_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qlsinhvien"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="" method="POST" class="form-inline">
			<?php echo isset($dt_id) ? showDaoTaoList($con, $dt_id) : showDaoTaoList($con); ?>
			<?php echo isset($hk) ? showHocKy($con, $hk) : showHocKy($con); ?>
			<?php echo isset($nk) ? showNienKhoa($con, $nk) : showNienKhoa($con); ?>
			<!-- <input type="submit" name="btnLoc" value="Lọc" class="btn btn-info"> -->
		</form>
	</div>
<div class="col-lg-3"></div>
</div>
<a href="index.php?page=khdaotao&act=themmon">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm môn">
</a>

<div id="ketquaajax">
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
		<tbody>
			<?php
			$i=1;
			while($row=mysqli_fetch_object($qr)){ //var_dump($row);?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><input type="checkbox" name="id[]" value="<?php echo $row->mh_id; ?>"></td>
					<td><?php echo $row->mh_ten; ?></td>
					<td><?php echo $row->mh_tinchi; ?>
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
							<a href="index.php?page=khdaotao&act=molop&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $row->mh_id; ?>">
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
			
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6" class="text-center">
					<input type="submit" name="submitHP" value="Đồng ý xóa" class="btn btn-danger" id="submitHP">
				</td>
			</tr>
		</tfoot>
		
	</table>
	</form>
</div>
<br/>
<script type="text/javascript">
$(document).ready(function(){
    $("#slDaoTao, #slHocKy, #slNienKhoa").change(function(){
        var sldaotao = document.getElementById("slDaoTao");
        var slhocky = document.getElementById("slHocKy");
        var slnienkhoa = document.getElementById("slNienKhoa");
        //alert(sldaotao.value);
        $.ajax({
            url : "layout/giangvien/a_dshpmo.php",
            type : "get",
            dateType:"html",
            data : {
                sldaotao: sldaotao.value,
                slhocky: slhocky.value,
                slnienkhoa: slnienkhoa.value
            },
            success : function (result){
                //alert(result);
                $('#ketquaajax').html(result);
            }
        });
        //$('#ketqua').show('slow'); 
    });

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

   	$('#submitHP').click(function() {
			
		count = $('input:checked').length;
		if(count<=0)
		{
			alert('Lựa chọn môn học!');
			return false;
		}
		else{
		    var r = confirm("Xác nhận thao tác!");
		    if (r == true) {
		        return true;;
		    } else {
		        return false;
		    }
		}
	});
});
</script>