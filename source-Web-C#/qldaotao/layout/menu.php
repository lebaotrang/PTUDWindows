<?php $page=isset($_GET['page']) ? filter_data($_GET['page']) : NULL; ?>
<nav class="navbar navbar-inverse" role="navigation"><!-- Static navbar -->
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header pull-left">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	
	<div class="navbar-collapse collapse" id="navbarCollapse">
		<ul class="nav navbar-nav">
			<li <?php if($page=='') echo "class='active'"; ?>><a href="index.php">Trang chủ</a></li>
			<li class="<?php if($page=='ctdaotao') echo "active"; ?>"><a href="index.php?page=ctdaotao">CT đào tạo</a></li>
			<li class="<?php if($page=='qldangky') echo "active"; ?>"><a href="index.php?page=qldangky">Đăng ký ĐT</a></li>
			<li class="<?php if($page=='qldangkyhp') echo "active"; ?>"><a href="index.php?page=qldangkyhp">Đăng ký HP</a></li>
			<li class="<?php if($page=='ketqua') echo "active"; ?>"><a href="index.php?page=ketqua">Kết quả</a></li>
			<li class="<?php if($page=='doithongtin') echo "active"; ?>"><a href="index.php?page=doithongtin">Đổi thông tin</a></li>
			<li class="<?php if($page=='doimatkhau') echo "active"; ?>"><a href="index.php?page=doimatkhau">Đổi mật khẩu</a></li>
			<li class="<?php if($page=='lienhe') echo "active"; ?>"><a href="index.php?page=logout">Đăng xuất</a></li>
		</ul>
		<!-- <div class="navbar-collapse collapse navbar-right">
			<form class="navbar-form navbar-right pull-right" role="form" id="menu" action="index.php?page=timkiem&" method="GET">
				<div class="form-group">
					
				  <table>
					<tr>
						<td><input type="hidden" value="timkiem" name="page"  style="display: none;"/></td>
						<td><input type="text" placeholder="Tin tức cần tìm..." class="form-control" name="keyword"></td>
						<td><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></td>
						<td>&nbsp;<a href="index.php?page=timkiem&act=nangcao"><button type="button" class="btn btn-default" style="padding: 7px; color: white;">Nâng cao</button></a></td>
					</tr>
				 </table>
				</div>
				
			</form>
		</div> --><!--/.navbar-collapse -->
		
		
	</div><!--/.nav-collapse -->
</nav><!-- end Static navbar -->

<div class="jumbotron">
	<div class="container">
		<h2>Quản lý đào tạo Online<span style="color: #fff"></span></h2>
		<p> Trường Đại học Cần Thơ</p>
	</div>
</div>
	  
