<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">DANH SÁCH CÁC MÔN THUỘC CTDT</h3>

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

<div class="col-lg-2"></div>
<div class="col-lg-8" id="ketquaajax">
<form method="POST" action="index.php?page=khdaotao&act=themmon">
	<table class="table table-bordered table-responsive" style="margin-bottom: 15px;">
		<thead>
			<tr>
				<th>STT</th>
				<th><input type="checkbox" id="checkall"></th>
				<th>Tên môn</th>
				<th>Tín chỉ</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			while($row=mysqli_fetch_object($qr)){ ?>
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
					<input type="submit" name="submitHP" value="Đồng ý" class="btn btn-info" id="submitHP">
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
        //alert(slnienkhoa.value);
        $.ajax({
            url : "layout/giangvien/a_dshpchuamo.php",
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
		});

 //   	$('#submitHP').click(function() {
			
	// 	count = $('input:checked').length;
	// 	if(count<=0)
	// 	{
	// 		alert('Lựa chọn môn học!');
	// 		return false;
	// 	}
	// 	else{
	// 	    var r = confirm("Xác nhận thao tác!");
	// 	    if (r == true) {
	// 	        return true;;
	// 	    } else {
	// 	        return false;
	// 	    }
	// 	}
	// });
});
</script>