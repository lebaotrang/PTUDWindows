<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		/*dropdown").hover(function(){
			$(this).find('ul').slideDown('medium'); }
			,function(){
				$(this).find('ul').slideUp("slow");
		});
		
		$(".navbar-toggle").click(function(){
			$("#navbarCollapse").toggle();
		});*/
	});
</script>
<?php 
$sql="SELECT * FROM sinhvien WHERE sv_email='"."$_SESSION[user_name]"."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$sinhvien = mysqli_fetch_object($rs); //var_dump($sinhvien);
?>

<div class="col-md-6">

	<div class="panel panel-warning">
		<!--<div class="panel-heading">Sách nổi bật</div>-->
		<div class="panel-body">

			<div class="table-responsive">
				<table class="table table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th class="text-center" colspan="2">Thông tin sinh viên</th>
					</tr>
					<tr>
						<td width="100px"><strong>Họ tên</strong></td>
						<td><?php echo $sinhvien->sv_hoten ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Ngày sinh</strong></td>
						<td><?php echo date("d-m-Y", strtotime($sinhvien->sv_ngaysinh)); ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Giới tính</strong></td>
						<td><?php echo $sinhvien->sv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Ngành học</strong></td>
						<td>
							<?php 
							$sql1="SELECT * FROM dangky dk, daotao dt
								   WHERE dt.dt_id=dk.dt_id AND dk.sv_id=$sinhvien->sv_id AND dk_trangthai='Đăng ký'";
							$rs1=mysqli_query($con, $sql1);
							if(!$rs1) die("Lỗi truy vấn CSDL!");
							$nganhhoc = mysqli_fetch_object($rs1); //var_dump($sinhvien);
							if(!empty($nganhhoc))
								echo $nganhhoc->dt_ten;
							else
								echo "Chưa cập nhật";
							?>
						</td>
					</tr>
					<tr>
						<td width="100px"><strong>Email</strong></td>
						<td><?php echo $sinhvien->sv_email; ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Giới tính</strong></td>
						<td><?php echo $sinhvien->sv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-center"><a href="">Xem thêm</a></td>
					</tr>
				</table>
			</div>

		</div>

	</div>

</div> <!--  end col-md-6 -->

<div class="col-md-6">
	<?php if(isset($_SESSION['user_name'])) include_once "./layout/slidebar.php"; ?>
</div>

