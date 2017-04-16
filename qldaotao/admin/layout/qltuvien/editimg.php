<?php
if(!isset($_SESSION['admin'])) die('Have no permision!');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.hide-modal').click(function(){
		$('#myModal').modal('hide');
	}); 
	$('#delete').click(function(){
		$('#myModal').modal('show');
	}); 
});
</script>
<style type="text/css">
body.modal-open,
.modal-open .navbar-fixed-top,
.modal-open .navbar-fixed-bottom {
    margin-right: 16px;
}
</style>


<!-- Modal HTML 
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cảnh báo</h4>
			</div>
			<div class="modal-body">
				<p>Do you want to save changes you made to document before closing?</p>
				<p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>-->

<div class="container">
<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltuvien&act=editimg&tv_id=<?php echo $tv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Nếu bạn xóa ảnh này, hãy chắc chắn!
				<input type="hidden" name="tv_id" value="<?php echo $tv_id; ?>">
				<input type="hidden" name="htv_id" value="<?php echo $htv_id; ?>">
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltuvien&act=editimg&tv_id=<?php echo $tv_id; ?>">
					<button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button>
				</a>
			</p>
		</div>
	</form>
	<?php
} ?>
<h2 class="text-center text-info">Quản lý danh sách hình ảnh</h2>
<div class="row">
	<div class="col-md-12 text-right">
		<a href="?page=qltuvien"><button type="button" class="btn btn-xs btn-success" value="Trở về">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Trở về</button></a>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" action="index.php?page=qltuvien&act=editimg&tv_id=<?php echo $tv_id; ?>" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">Thêm ảnh mới</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-3 control-label" for="image">Hình ảnh</label>
						<div class="col-lg-9">
							<input type="file" name="image" id="image" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body text-right">
					<p class="pull-left">Ngày tạo: <?php echo date('d/m/Y') ?></p>
					<button type="submit" class="btn btn-success" name="submit">Đồng ý</button>
				</div>
			</div>
		 </form>
	</div>
	
	<div class="col-md-6">
		<form class="form-horizontal" action="index.php?page=qltuvien&act=editimg" method="post" enctype="multipart/form-data">
			<?php
			$sql="SELECT * FROM hinh_tu_vien WHERE tv_id=$tv_id ORDER BY htv_trangthai DESC, htv_id DESC";
			$qr=mysqli_query($con, $sql);
			if(mysqli_num_rows($qr)<=0)
				redirect("?page=qltuvien");
			if(!$qr) die("Lỗi truy vấn CSDL!");
			?>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">Hình</th>
						<th class="text-center">Đại diện</th>
						<th colspan="2" class="text-center">Chức năng</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while($row=mysqli_fetch_array($qr)){
					$src="../img/tuvien/".$row['htv_url'];
					?>
					<tr>
						<td width="35%"><img class="img-thumbnail" src="<?php echo $src;?>" /></td>
						<td class="text-center text-success"><b><?php if($row['htv_trangthai']==1) echo "Đại diện"; ?></b></td>
						<td align='center' class='cotNutChucNang' colspan="2">
							<form class="form-horizontal" action="index.php?page=qltuvien&act=editimg&tv_id=<?php echo $tv_id; ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" name="tv_id" value="<?php echo $row['tv_id']; ?>">
									<input type="hidden" name="htv_id" value="<?php echo $row['htv_id']; ?>">
									<button type="submit" name="avatar" class="btn btn-xs btn-primary" value="avatar">
										<span class="glyphicon glyphicon-picture"></span>&nbsp;Đại diện
									</button>
								</div>
							</form>
							<a href="?page=qltuvien&act=editimg&tv_id=<?php echo $tv_id; ?>&htv_id=<?php echo $row['htv_id']; ?>">
								<button type="button" class="btn btn-xs btn-danger" id="delete"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa ảnh</button>
							</a>
						</td>
					</tr>
					<?php 
				} ?>
				</tbody>
			</table>
		</form>
	</div>
	
</div>

