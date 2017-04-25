<script language="javascript">
	$(document).ready(function() {
		/*$.get('ajax/ajax-ns-tuvien.php', $('#ns-add').serialize(), function(e) {
			if( e ) {
				$('#dsTuVien').html(e);
			}	
		});*/
        $('#slQuanHuyen').change(function() {
            $.get('ajax/ajax-ns-tuvien.php', $('#ns-add').serialize(), function(e) {
                if( e ) {
                    $('#dsTuVien').html(e);
                }	
            });
        });		
    });
</script>
<div class="container">
<form class="form-horizontal" action="index.php?page=qlnhansu&act=edit&ns_id=<?php echo $ns_id; ?>" method="post" enctype="multipart/form-data" id="ns-add">

	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin chung</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-lg-4 control-label" for="name">Họ tên</label>
						<div class="col-lg-8">
							<input type="text" name="name" placeholder="Họ tên" id="name" class="form-control" value="<?php if (!empty($name)) echo $name; else echo $row['ns_hoten']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="pname">Pháp danh <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="pname" placeholder="Pháp danh" id="pname" class="form-control" value="<?php if (!empty($pname)) echo $pname; else echo $row['ns_phapdanh']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="cmnd">CMND <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<input type="text" name="cmnd" maxlength="9" placeholder="Chứng minh" id="cmnd" class="form-control" value="<?php if (!empty($cmnd)) echo $cmnd; else echo $row['ns_cmnd']; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="namsinh">Năm sinh <span class="text-danger">(*)</span> </label>
						<div class="col-lg-8">
							<select name='slNamSinh' class='form-control' id="namsinh">
								<?php
								for($i=1900; $i<=2020; $i++){ ?>
									<option value="<?php echo $i; ?>" <?php if($i==$row['ns_namsinh']) echo "selected";?>><?php echo $i; ?></option>
									<?php
								} ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="vanhoa">Văn hóa</label>
						<div class="col-lg-8">
							<select name='slVanHoa' class='form-control'>
								<option value='0/0'>Trình độ văn hóa</option>
								<?php
								for($i=1; $i<=12; $i++){ ?>
									<option value="<?php echo $i."/12"; ?>" <?php if($i==$row['ns_td_vanhoa']) echo "selected";?>><?php echo $i."/12"; ?></option>
									<?php
								} ?>
								<option value='Trung cấp' <?php if($row['ns_td_vanhoa']=='Trung cấp') echo "selected";?>>Trung cấp</option>
								<option value='Cao đẳng' <?php if($row['ns_td_vanhoa']=='Cao đẳng') echo "selected";?>>Cao đẳng</option>
								<option value='Đại học' <?php if($row['ns_td_vanhoa']=='Đại học') echo "selected";?>>Đại học</option>
								<option value='Thạc sĩ' <?php if($row['ns_td_vanhoa']=='Thạc sĩ') echo "selected";?>>Thạc sĩ</option>
								<option value='Tiến sĩ' <?php if($row['ns_td_vanhoa']=='Tiến sĩ') echo "selected";?>>Tiến sĩ</option>
								<option value='Giáo sư' <?php if($row['ns_td_vanhoa']=='Giáo sư') echo "selected";?>>Giáo sư</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="phathoc">Phật học <span class="text-danger">(*)</span></label>
						<div class="col-lg-8">
							<select name='slPhatHoc' class='form-control'>
								<option value='0'>Trình độ Phật học</option>
								<option value="Không" <?php if($row['ns_td_phathoc']=='Không') echo "selected";?>>Không</option>
								<option value="Sơ cấp" <?php if($row['ns_td_phathoc']=='Sơ cấp') echo "selected";?>>Sơ cấp</option>
								<option value="Trung cấp" <?php if($row['ns_td_phathoc']=='Trung cấp') echo "selected";?>>Trung cấp</option>
								<option value="Cao đẳng" <?php if($row['ns_td_phathoc']=='Cao đẳng') echo "selected";?>>Cao đẳng</option>
								<option value="Đại học" <?php if($row['ns_td_phathoc']=='Đại học') echo "selected";?>>Đại học</option>
								<option value='Thạc sĩ' <?php if($row['ns_td_phathoc']=='Thạc sĩ') echo "selected";?>>Thạc sĩ</option>
								<option value='Tiến sĩ' <?php if($row['ns_td_phathoc']=='Tiến sĩ') echo "selected";?>>Tiến sĩ</option>
								<option value='Giáo sư' <?php if($row['ns_td_phathoc']=='Giáo sư') echo "selected";?>>Giáo sư</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Tại Chùa</label>
						<div class="col-lg-4">
							<?php 
							$sql1="SELECT * FROM tu_vien tv, tuvien_nhansu tv_ns, quan_huyen qh WHERE tv_ns.tv_id=tv.tv_id AND tv.qh_id=qh.qh_id AND ns_id=$row[ns_id]";
							$qr1=mysqli_query($con, $sql1);
							$row1=mysqli_fetch_array($qr1);
							showQHList($con, $row1['qh_id']);	
							//showQHList_add($con);
							?>
						</div>
						<div class="col-lg-4" id="dsTuVien">
							<?php showTV_QHList($con, $row1['qh_id'], $row1['tv_id']);?>
						</div>
					</div>
					
					<!--<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Trụ trì</label>
						<div class="col-lg-8" id="truTri">
						
						</div>
					</div>-->
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="phone">Điện thoại</label>
						<div class="col-lg-8">
							<input type="text" name="phone" placeholder="Điện thoại" id="phone" maxlength="11" class="form-control" value="<?php if (!empty($phone)) echo $phone; else echo $row['ns_dienthoai'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="address">Địa chỉ</label>
						<div class="col-lg-8">
							<textarea name="address" id="address" class="form-control"><?php if (!empty($address)) echo $address; else echo $row['ns_quequan']?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="image">Ảnh Đ.diện</label>
						<div class="col-lg-8">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" >Ảnh Đ.diện</label>
						<div class="col-lg-8">
							<?php if(strcmp($row['hns_url'], "no_image.gif")!=0) $link="../img/nhansu/"; else $link="../img/"; ?>
							<img src="<?php echo $link.$row['hns_url']; ?>" class="img-thumbnail"/>
						</div>
					</div>
					
				</div>
			</div>

		</div>
		
		<div class="col-md-7">

			<div class="panel panel-default">
				<div class="panel-heading">Tiểu sử</div>
				<div class="panel-body">
					<textarea name="description" id="description" class="form-control"><?php if (!empty($description)) echo $description; else echo stripslashes(html_entity_decode($row['ns_tieusu'])); ?></textarea>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-body text-right">
					<p class="pull-left">Ngày tạo: <?php echo date('d/m/Y') ?></p>
					<input type="hidden" name="tv_id" value="<?php echo $row['tv_id']; ?>">
					<button type="submit" class="btn btn-success" name="submit">Đồng ý</button>
				</div>
			</div>

		</div>
		
	</div>

</form>

<script>
	$(document).ready(function() {
		CKEDITOR.replace('description');
	});
</script>
</div>