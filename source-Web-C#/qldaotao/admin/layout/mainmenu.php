<?php if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!'); 
$page=isset($_GET['page']) ? filter_data($_GET['page']) : '';
?>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dropdown").hover(function(){
		$(this).find('ul').slideDown('medium'); }
		,function(){
			$(this).find('ul').slideUp("slow");
		});
});
</script>
<nav class="navbar navbar-inverse">
	<!--<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="" class="navbar-brand">PhatGiaoHG.com</a>
	</div>-->

	<div class="navbar-collapse collapse" id="menu">
		<ul class="nav navbar-nav">
			<li <?php if($page=='') echo "class='active'"; ?>><a href="index.php"><span class="glyphicon glyphicon-home" style="margin-left: -15px;"></span>&nbsp; Home</a></li>
			<li <?php if($page=='qltuvien') echo "class='active'"; ?>><a href="?page=qltuvien">QL.Tự viện</a></li>
			<li <?php if($page=='qlnhansu') echo "class='active'"; ?>><a href="?page=qlnhansu">QL.Nhân sự</a></li>
			<li <?php if($page=='qlbannganh') echo "class='active'"; ?>><a href="?page=qlbannganh">QL.Ban ngành</a></li>
			<li <?php if($page=='qlquanhuyen') echo "class='active'"; ?>><a href="?page=qlquanhuyen">QL.Huyện</a></li>
			<li <?php if($page=='qlphatgiao') echo "class='active'"; ?>><a href="?page=qlphatgiao">QL.Phật giáo</a></li>
			<li class="dropdown <?php if($page=='qltintuc') echo "active"; ?>">
				<a data-toggle="dropdown" href="#">QL.Tin tức<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="?page=qltintuc&tt_loai=1">Tin trong tỉnh</a></li>
					<li><a href="?page=qltintuc&tt_loai=2">Tin ngoài tỉnh</a></li>
				</ul>
			</li>
			<li <?php if($page=='qlvanban') echo "class='active'"; ?>><a href="?page=qlvanban">QL.Văn bản</a></li>
			<li <?php if($page=='qlnhac') echo "class='active'"; ?>><a href="?page=qlnhac">Nhạc mp3</a></li>
			<li <?php if($page=='qllienhe') echo "class='active'"; ?>><a href="?page=qllienhe">Liên hệ</a></li>	
			<li <?php if($page=='qlcaidat') echo "class='active'"; ?>><a href="?page=qlcaidat">Cài đặt</a></li>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span>&nbsp; Tài khoản<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="?page=qltaikhoan"><span class="glyphicon glyphicon-globe"></span>&nbsp; QL.Tài khoản</a></li>
					<div class="divider"></div>
					<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Thông tin</a></li>
					<li><a href="?page=qltaikhoan&act=changepass"><span class="glyphicon glyphicon-lock"></span>&nbsp; Đổi mật khẩu</a></li>
					<div class="divider"></div>
					<li><a href="?page=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Thoát</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>

