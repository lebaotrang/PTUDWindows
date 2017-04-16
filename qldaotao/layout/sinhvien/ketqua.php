<h3 class="text-center text-danger">KẾT QUẢ HỌC TẬP</h3>
<?php
$sql="SELECT * FROM sinhvien a, ketqua b, monhoc c
	  WHERE a.sv_id=b.sv_id AND b.mh_id=c.mh_id AND sv_email='".$_SESSION['user_name']."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
?>
<a href="./word1.php">
	<input type="button" name="" value="Download" class="btn btn-success btn-xs pull-right">
</a>
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
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
			<td><?php echo $daotao->mh_ten; ?></td>
			<td><?php echo $daotao->kq_diemlan1; ?></td>
			<td><?php echo $daotao->kq_diemlan2; ?></td>
			<td><?php echo $daotao->kq_trungbinh>=5.5 ? $daotao->kq_trungbinh." (<b class=text-success>Pass</b>)" : $daotao->kq_trungbinh." (<b class=text-danger>Fail</b>)"; ?></td>
			<td>
			<?php 
			echo $daotao->kq_trungbinh>=5.5 ? $daotao->mh_tinchi : 0; ?>	
			</td>
		</tr>
		<?php
		$tongtl = $daotao->kq_trungbinh>=5.5 ? $tongtl += $daotao->mh_tinchi : $tongtl += 0;
		$tongtc += $daotao->mh_tinchi; 
		//if($daotao->kq_trungbinh>=5.5)
			$trungbinh += (($daotao->kq_trungbinh)*$daotao->mh_tinchi);
	} ?>
</table>
<br/>
<strong>Tổng tín chỉ tích lũy: </strong><?php echo $tongtl; ?><br/>
<strong>Trung bình chung: </strong><?php echo number_format($trungbinh/$tongtc,3); ?>
<br/><br/>