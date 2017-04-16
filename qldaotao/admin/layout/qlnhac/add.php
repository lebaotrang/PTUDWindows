<script>
		function checktt(){
			var music=document.getElementById('music').value;
			var reMusic=/^$|\s+/;
			var kq1=reMusic.test(music);
			if(kq1==true){
				alert("Tên file không chứa khoảng trắng!");
				return false;
			}
		}
		</script>
<div class="container">

<h2 class="text-center text-info">Thêm file âm thanh</h2>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form class="form-horizontal" action="index.php?page=qlnhac&act=add" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">Thêm file âm thanh</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-lg-3 control-label" for="name">Tên nhạc <span class="text-danger">(*)</span></label>
						<div class="col-lg-9">
							<input type="text" name="name" id="name" class="form-control" value="<?php if(isset($tennhac)) echo $tennhac; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label" for="music">File mp3 <span class="text-danger">(*)</span></label>
						<div class="col-lg-9">
							<input type="file" name="music" id="music" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body text-right">
					<p class="pull-left">Ngày tạo: <?php echo date('d/m/Y') ?></p>
					<a href="?page=qlnhac"><button type="button" class="btn btn-success" value="Trở về">Trở về</button></a>
					<button type="submit" class="btn btn-success" name="submit" onclick="return checktt();">Đồng ý</button>
				</div>
			</div>
		 </form>
	</div>
	<div class="col-md-3"></div>
	
</div>
