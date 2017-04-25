<?php if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_quyen'])) redirect('login.php', 0); ?>
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
$sql="SELECT * FROM nhanvien WHERE nv_tentaikhoan='"."$_SESSION[user_name]"."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$giangvien = mysqli_fetch_object($rs); //var_dump($sinhvien);
?>

<div class="col-md-6">

	<div class="panel panel-warning">
		<!--<div class="panel-heading">Sách nổi bật</div>-->
		<div class="panel-body">

			<div class="table-responsive">
				<table class="table table-bordered" style="margin-bottom: 0px;">
					<tr>
						<th class="text-center" colspan="2">Thông tin giảng viên</th>
					</tr>
					<tr>
						<td width="100px"><strong>Họ tên</strong></td>
						<td><?php echo $giangvien->nv_hoten ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Ngày sinh</strong></td>
						<td><?php echo date("d-m-Y", strtotime($giangvien->nv_ngaysinh)); ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Giới tính</strong></td>
						<td><?php echo $giangvien->nv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Điện thoại</strong></td>
						<td><?php echo $giangvien->nv_dienthoai; ?></td>
					</tr>
					<tr>
						<td width="100px"><strong>Quyền</strong></td>
						<td>
							<?php 
							$sql1="SELECT * FROM quyen WHERE ";
							$i=0; $numquyen = count($_SESSION['user_quyen']);
							foreach ($_SESSION['user_quyen'] as $quyen) {
								$sql1 .= " q_id=$quyen";
								$i++;
								if($i<$numquyen)
									$sql1 .= " OR ";
							}
							//echo $sql1;
							$rs1=mysqli_query($con, $sql1);
							if(!$rs1) die("Lỗi truy vấn CSDL!");
							$tenquyen = array();
							while ($quyen = mysqli_fetch_object($rs1)) {
								array_push($tenquyen, $quyen->q_ten);
							}
							echo implode(", ", $tenquyen);
							?>
						</td>
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

