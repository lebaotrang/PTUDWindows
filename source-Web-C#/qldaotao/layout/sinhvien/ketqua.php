<h3 class="text-center text-danger">KẾT QUẢ HỌC TẬP</h3>
<?php
if(!isset($hk)) $hk = HKy_Hientai();
if(!isset($nk)) $nk = NK_HienTai();

$a="SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
$qra=mysqli_query($con, $a);
$hknk_id=mysqli_fetch_object($qra)->hknk_id;

$sql="SELECT * FROM sinhvien a, ketqua b, lop c
	  WHERE a.sv_id=b.sv_id AND b.l_id=c.l_id AND hknk_id=$hknk_id AND sv_email='".$_SESSION['user_name']."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
?>
<!-- <a href="./word1.php">
	<input type="button" name="" value="Download" class="btn btn-success btn-xs pull-right">
</a> -->
<!-- <div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="" method="POST" class="form-inline">
			<?php //echo isset($hk) ? showHocKy($con, $hk) : showHocKy($con); ?>
			<?php //echo isset($nk) ? showNienKhoa($con, $nk) : showNienKhoa($con); ?>
		</form>
	</div>
<div class="col-lg-3"></div>
</div> -->

<div class="col-lg-12">
<div class="col-lg-3"></div>
	<div class="form-group col-lg-6 text-center">
		<form action="" method="POST" class="form-inline">
			<?php
			$b="SELECT distinct mh_ten, mh_id FROM ketqua a, monhoc c, sinhvien d
				WHERE c.mh_id=a.m_id AND d.sv_id=a.sv_id AND sv_email='".$_SESSION['user_name']."'";
				//echo $b;
			$qrb=mysqli_query($con, $b);
			?>
			<select name="slKetQua" class="form-control" id="slKetQua">
				<option value="0">Chọn môn học</option>
				<?php
				while($rowb=mysqli_fetch_object($qrb)){ ?>
					<option value="<?php echo $rowb->mh_id; ?>"><?php echo $rowb->mh_ten; ?></option>
					<?php
				}
				?>
				<option value="-1">Tất cả</option>
			</select>
		</form>
	</div>
<div class="col-lg-3"></div>
</div>

<div id="ketquaajax">
<!-- <table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Tên lớp</th>
		<th>Tên môn</th>
		<th>Thi L1</th>
		<th>Thi L2</th>
		<th>Kết quả</th>
		<th>Tích lũy</th>
	</tr>
	<?php
	$i=0;
	$tongtl = 0;
	$tongtc = 0;
	$trungbinh = 0;
	while($daotao = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daotao->l_ten; ?></td>
			<td>
				<?php
				$a="SELECT * FROM monhoc WHERE mh_id=$daotao->mh_id";
				$qra=mysqli_query($con, $a);
				$monhoc = mysqli_fetch_object($qra);
				echo $monhoc->mh_ten;
				?>
			</td>
			<td><?php echo $daotao->kq_diemlan1; ?></td>
			<td><?php echo $daotao->kq_diemlan2==-1 ? NULL : $daotao->kq_diemlan2; ?></td>
			<td><?php echo $daotao->kq_trungbinh>=5.5 ? $daotao->kq_trungbinh." (<b class=text-success>Pass</b>)" : $daotao->kq_trungbinh." (<b class=text-danger>Fail</b>)"; ?></td>
			<td><?php echo $daotao->kq_tichluy; ?></td>
		</tr>
		<?php
		// $tongtc += $daotao->kq_tichluy; 
		// $trungbinh += (($daotao->kq_trungbinh)*$daotao->kq_tichluy);
	} ?>
</table> -->
<br/>
<!-- <strong>Tổng tín chỉ tích lũy: </strong><?php //echo $tongtc; ?><br/>
<strong>Trung bình chung: </strong><?php //echo number_format($trungbinh/$tongtc,3); ?> -->
<br/><br/>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#slHocKy, #slNienKhoa").change(function(){
        var slhocky = document.getElementById("slHocKy");
        var slnienkhoa = document.getElementById("slNienKhoa");
        //alert(slhocky.value);
        $.ajax({
            url : "layout/sinhvien/a_ketqua.php",
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

    $("#slKetQua").change(function(){
        var slketqua = document.getElementById("slKetQua");
        //alert(slketqua.value);
        $.ajax({
            url : "layout/sinhvien/a_ketqua.php",
            type : "get",
            dateType:"html",
            data : {
                slketqua: slketqua.value
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

   	$('#submitHP').click(function() {
			
		count = $('input[name=id[]]:checked').length;
		if(count<=0)
		{
			alert('Lựa chọn môn học!');
			return false;
		}
	});

});
</script>