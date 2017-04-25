<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">NGƯỜI DÙNG HỆ THỐNG HIỆN CÓ</h3>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
	<form action="?page=qltaikhoan&act=xoa&nv_id=<?php echo $nv_id; ?>" method="POST">
		<div class="alert alert-block alert-danger">
			<h4>Cảnh báo xóa!</h4>
			<p>Bạn chắc chắn thao tác này?
				<input type="hidden" name="nn_id" value="<?php echo $nn_id; ?>">
				<!--<input type="hidden" name="hnn_id" value="<?php //echo $hnn_id; ?>">-->
				<button type="submit" name="delete" class="btn btn-danger">Xóa</button>
				<a href="?page=qltaikhoan"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
			</p>
		</div>
	</form>
	<?php
} ?>

<?php
$sql="SELECT * FROM nhanvien a order by nv_id desc"; //echo $sql;
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$i=0;
?>

<a href="index.php?page=qltaikhoan&act=them">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm mới">
</a>
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Phái</th>
		<th>Điện thoại</th>
        <th>Tài khoản</th>
        <th>Quyền</th>
		<th class="text-center" colspan="2">Tùy chọn</th>
	</tr>
	<?php
	while($nhanvien = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $nhanvien->nv_hoten; ?></td>
			<td><?php echo $nhanvien->nv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
			<td><?php echo $nhanvien->nv_dienthoai; ?></td>
            <td><?php echo $nhanvien->nv_tentaikhoan; ?></td>
            <?php
            $sql1="SELECT * FROM quyen a, quyennhanvien b 
                   WHERE a.q_id=b.q_id AND nv_id=$nhanvien->nv_id"; //echo $sql1;
            $rs1=mysqli_query($con, $sql1);
            ?>
            <td><?php 
                while($quyen=mysqli_fetch_object($rs1)){
                    echo "-".$quyen->q_ten."<br/>"; 
                } ?>
            </td>
			<td class="text-center">

				<input type="button" class="btn btn-xs btn-success detail" value="Chi tiết" role="button" data-toggle="modal" data-target="#myModalDetail<?php echo $nhanvien->nv_id; ?>" data-toggle="tooltip" title="Xem thông tin">

				<a href="?page=qltaikhoan&act=resetpass&nv_id=<?php echo $nhanvien->nv_id; ?>">
				<input type="button" name="resetpass" class="btn btn-xs btn-info" value="reset pass">
				</a>

                <a href="?page=qltaikhoan&act=edit&nv_id=<?php echo $nhanvien->nv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-primary" value="Sửa">
                </a>
                <a href="?page=qltaikhoan&act=xoa&nv_id=<?php echo $nhanvien->nv_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>

<td>
<div class="modal fade" id="myModalDetail<?php echo $nhanvien->nv_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông tin chi tiết giảng viên <span style="color:#f0ad4e;"> <?php //echo $ph->ph_hoten; ?> </span></h4>
      </div>
      <div class="modal-body">
            <div class="container">
            <div class="col-lg-6" style="margin-left: -2% !important">
                <div id="errorSubmit"></div>
                <form class="form-horizontal" action="" method="post" id="form" name="form">
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <td>Họ tên:</td>
                            <td><?php echo $nhanvien->nv_hoten; ?></td>
                        </tr>
                        <tr>
                            <td>Giới tính:</td>
                            <td><?php echo $nhanvien->nv_gioitinh==0 ? "Nam" : "Nữ"; ?></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh:</td>
                            <td><?php echo $nhanvien->nv_ngaysinh; ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><?php echo $nhanvien->nv_diachi; ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại:</td>
                            <td><?php echo $nhanvien->nv_dienthoai; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $nhanvien->nv_email; ?></td>
                        </tr>
                        <tr>
                            <td>Khoa:</td>
                            <td>
                            <?php  
                            $s="SELECT * FROM khoa WHERE k_id=$nhanvien->k_id";
                            $qrs=mysqli_query($con, $s);
                            echo mysqli_fetch_object($qrs)->k_ten;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Quyền:</td>
                            <td>
                            <?php
				            $s1="SELECT * FROM quyen a, quyennhanvien b 
				                   WHERE a.q_id=b.q_id AND nv_id=$nhanvien->nv_id"; //echo $sql1;
				            $r1=mysqli_query($con, $s1);
				            ?>
				            <?php 
			                while($quyen=mysqli_fetch_object($r1)){
			                    echo "-".$quyen->q_ten."<br/>"; 
			                } ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
             <div class="col-lg-12">
             </div> 
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
      </div>
    </div>
  </div>
</div> <!---End div model edit-->
</td>

		</tr>
		<?php
	} ?>
</table>
<br/>

