<div class="container">
	<h2 class="text-center text-info">Chi tiết văn bản</h2>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="?page=qlvanban"><button type="button" class="btn btn-xs btn-success" value="Trở về">
			<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<table class="table table-striped table-hover table-bordered col-md-6">
				<thead>
					<tr>
						<th class="text-center" colspan="2">Thông tin chung</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT * FROM van_ban vb, ban_nganh bn, quan_huyen qh WHERE vb.qh_id=qh.qh_id AND vb.bn_id=bn.bn_id AND vb_id=$vb_id";
					$qr=mysqli_query($con, $sql);
					if(!$qr) die('Lỗi truy vấn CSDL!');
					if(mysqli_num_rows($qr)<=0)
						redirect("?page=qlvanban",0);
					$row=mysqli_fetch_array($qr); ?>
					<tr><td width="25%">Tên VB</td><td class="text-justify"><?php echo $row['vb_ten']; ?></td></tr>
					<tr><td>Ngày BH</td><td class="text-justify"><?php echo date('d-m-Y', strtotime($row['vb_ngaybanhanh'])); ?></td></tr>
					<tr><td>Ngày KT</td><td class="text-justify"><?php echo date('d-m-Y', strtotime($row['vb_ngayketthuc'])); ?></td></tr>
					<tr><td>Loại VB</td><td class="text-justify"><?php if($row['vb_loai']==1) echo "Văn bản pháp lý"; else echo "Văn bản mẫu"; ?></td></tr>
					<tr><td>Khu vực</td><td class="text-justify"><?php echo $row['qh_ten']; ?></td></tr>
					<tr><td>Ban ngành</td><td class="text-justify"><?php echo $row['bn_ten']; ?></td></tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-8">
			<object data="<?php echo "../file/"."$row[vb_url]"; ?>" type="application/pdf" width="100%" height="600px" style="margin-bottom: 50px;" ></object>
		</div>
	
	</div>
</div>