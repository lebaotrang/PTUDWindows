<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>

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
			<?php echo isset($hk) ? showHocKy($con, $hk) : showHocKy($con); ?>
			<?php echo isset($nk) ? showNienKhoa($con, $nk) : showNienKhoa($con); ?>
		</form>
	</div>
<div class="col-lg-3"></div>
</div>

<div id="ketquaajax">
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
</div>
<br/>
<script type="text/javascript">
$(document).ready(function(){
    $("#slHocKy, #slNienKhoa").change(function(){
        var slhocky = document.getElementById("slHocKy");
        var slnienkhoa = document.getElementById("slNienKhoa");
        //alert(slhocky.value);
        $.ajax({
            url : "layout/sinhvien/a_dshpmo.php",
            type : "get",
            dateType:"html",
            data : {
                slhocky: slhocky.value,
                slnienkhoa: slnienkhoa.value
            },
            success : function (result){
                //alert(result);
                $('#ketquaajax').html(result);
            }
        });
    });

    $('#checkall').click(function()
    	{
			if( $(this).is(':checked') )
			{
				$('input[name=id[]]').attr('checked', true);
			}
			else
			{
				$('input[name=id[]]').attr('checked', false);
			}
		})

    $('#checkallhuy').click(function()
    	{ 
			if( $(this).is(':checked') )
			{
				$('input[name=idhuy[]]').attr('checked', true);
			}
			else
			{
				$('input[name=idhuy[]]').attr('checked', false);
			}
		})

   	$('#submitHP').click(function() {
			
		count = $('input[name=id[]]:checked').length;
		if(count<=0)
		{
			alert('Lựa chọn môn học!');
			return false;
		}
	});

	$('#submitHuyHP').click(function() {
		count = $('input[name=idhuy[]]:checked').length;
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