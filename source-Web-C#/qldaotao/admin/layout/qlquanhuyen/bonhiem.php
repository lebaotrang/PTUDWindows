<script language="javascript">
	$(document).ready(function() {
		$('#checkall').click(function(){
			if( $(this).is(':checked') ){
				$('input[type=checkbox]').prop('checked', true);
			}
			else{
				$('input[type=checkbox]').prop('checked', false);
			}
		})
    });
</script>
<div class="container">

<div class="row">
	
	<div class="col-md-3 text-right"></div>
	
	<div class="col-md-6 text-center">
		<h2 class="text-center text-info">Bổ nhiệm chức vụ <?php if(!empty($slchucvu)) echo $slchucvu; ?></h2>
		<form class="form-inline" action="index.php?page=qlquanhuyen&act=bonhiem&qh_id=<?php echo $qh_id; ?>" method="post">
			<div class="form-group">
				<div class="col-lg-12">
					<select name='slChucVu' class='form-control'>
						<option value='0'>---Chọn chức vụ---</option>
						<option value='Phó ban' <?php if(strcmp($slchucvu, "Phó ban")==0) echo "selected"; ?>>Phó ban</option>
						<option value='Ủy viên' <?php if(strcmp($slchucvu, "Ủy viên")==0) echo "selected"; ?>>Ủy viên</option>
					</select>
					<button type="submitselect" class="btn btn-md btn-success">Chọn</button>
				</div>
			</div>
		</form>
	</div>
	
	<div class="col-md-3 text-right"></div>
	
</div>
<br/>

<form action="index.php?page=qlquanhuyen&qh_id=<?php echo $qh_id;?>&act=bonhiem" method="POST">
<div class="row" <?php if(!empty($slchucvu)) echo "style=display:block"; else echo "style=display:none"; ?>>
	<div class="col-md-12 text-right">
		<input type="hidden" value="<?php echo $slchucvu; ?>" name='slChucVu'>
		<button type="submit" name="submit" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Đồng ý</button>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th width="40px" class="text-center"><input type="checkbox" id="checkall"></th>
					<th>Pháp danh</th>
					<th>Điện thoại</th>
					<th>TĐ.Văn hóa</th>
					<th>TĐ.Phật học</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$soproduct=getcd_trang($con, 'admin');
				$base_url= 'index.php?page=qlquanhuyen&act=bonhiem&';
				if(isset($_GET['start']))
					$s = $_GET['start'];
				else
					$s = 0;	
				$query = mysqli_query($con, "SELECT * FROM nhan_su WHERE ns_id NOT IN (SELECT ns_id FROM quanhuyen_nhansu WHERE qh_id=$qh_id AND (qh_ns_quyen='Trưởng ban' OR qh_ns_quyen='Phó ban' OR qh_ns_quyen='Ủy viên'))"); 
				$tongsodong = mysqli_num_rows($query);

				$sql = "SELECT * FROM nhan_su WHERE ns_id NOT IN 
					   (SELECT ns_id FROM quanhuyen_nhansu qh_ns WHERE qh_ns.qh_id=$qh_id AND (qh_ns_quyen='Trưởng Ban' OR qh_ns_quyen='Phó ban' OR qh_ns_quyen='Ủy viên')) ORDER BY ns_id DESC limit $s,$soproduct";
				//echo $sql;
				$qr=mysqli_query($con, $sql);
				if(!$qr) die("Lỗi truy vấn CSDL!");
				$i=0;
				if(mysqli_num_rows($qr)<=0)
					echo "<tr><td colspan=7>Chưa có nhân sự nào!</td></tr>";
				while($row=mysqli_fetch_array($qr)){
					$i++
					?>
					<tr>
						<td><?php echo $i+$s; ?></td>
						<td class="text-center">
							<input type="checkbox" name="multicheck[]" value="<?php echo $row["ns_id"]; ?>">
						</td>
						<td><?php echo $row['ns_phapdanh']; ?></td>
						<td><?php echo $row['ns_dienthoai']; ?></td>
						<td><?php echo $row['ns_td_vanhoa']; ?></td>
						<td><?php echo $row['ns_td_phathoc']; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<div class="navpg"><?php if($tongsodong>$soproduct) echo pagenav($base_url, $s, $tongsodong, $soproduct); ?></div>
	</div>
</div>
</form>
</div>