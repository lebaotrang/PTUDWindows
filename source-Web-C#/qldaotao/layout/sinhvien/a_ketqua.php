<?php
session_start();
include_once "../../function/function.php";
include_once "../../db/dbcon.php";

// $hk = isset($_GET['slhocky']) ? $_GET['slhocky'] : HKy_Hientai();
// $nk = isset($_GET['slnienkhoa']) ? $_GET['slnienkhoa'] : NK_Hientai();

$mh_id=isset($_GET['slketqua']) ? $_GET['slketqua'] : 0;

// $a="SELECT * FROM hockynienkhoa WHERE hocky=$hk AND nienkhoa=$nk";
// $qra=mysqli_query($con, $a);
// $hknk_id=mysqli_fetch_object($qra)->hknk_id;

// $sql="SELECT * FROM sinhvien a, ketqua b, lop c
// 	  WHERE a.sv_id=b.sv_id AND b.l_id=c.l_id AND hknk_id=$hknk_id AND sv_email='".$_SESSION['user_name']."'";
// $rs=mysqli_query($con, $sql);
// if(!$rs) die("Lỗi truy vấn CSDL!");
if($mh_id!=-1)
	$a="SELECT * FROM ketqua a, lop b, sinhvien c where mh_id=$mh_id AND a.l_id=b.l_id AND c.sv_id=a.sv_id AND sv_email='".$_SESSION['user_name']."'";
else
	$a="SELECT * FROM ketqua a, lop b, sinhvien c where a.l_id=b.l_id AND c.sv_id=a.sv_id AND sv_email='".$_SESSION['user_name']."'";

$qra=mysqli_query($con, $a);
//echo $a;
?>

<div id="ketquaajax">
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
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
	while($daotao = mysqli_fetch_object($qra)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daotao->l_ten; ?></td>
			<td>
				<?php 
				$b="SELECT mh_ten FROM monhoc WHERE mh_id=$daotao->m_id";
				$qrb=mysqli_query($con, $b);
				echo mysqli_fetch_object($qrb)->mh_ten;
				?>
			</td>
			<td><?php echo $daotao->kq_diemlan1; ?></td>
			<td><?php echo $daotao->kq_diemlan2==-1 ? NULL : $daotao->kq_diemlan2; ?></td>
			<td><?php echo $daotao->kq_trungbinh>=5.5 ? "<b class=text-success>$daotao->kq_trungbinh</b>"  : "<b class=text-danger>$daotao->kq_trungbinh</b>"; ?></td>
			<td><?php echo $daotao->kq_tichluy; ?></td>
		</tr>
		<?php
		$tongtc += $daotao->kq_tichluy; 
		// $trungbinh += (($daotao->kq_trungbinh)*$daotao->kq_tichluy);
	} ?>
</table>
<br/>
<?php
if($mh_id==-1) { ?>
	<strong>Tổng tín chỉ tích lũy: </strong><?php echo $tongtc; ?><br/>
	<?php
} ?>
<!-- <strong>Trung bình chung: </strong><?php //echo $tongtc!=0 ? number_format($trungbinh/$tongtc,3) : NULL; ?> -->
<br/><br/>
</div>