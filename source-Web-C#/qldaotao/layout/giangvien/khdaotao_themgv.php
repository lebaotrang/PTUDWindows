<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<h3 class="text-center text-danger">CÁC GIẢNG VIÊN HIỆN CÓ</h3>

<?php

$sql="SELECT * FROM nhanvien a, khoa b, daotao c 
	  WHERE a.k_id=b.k_id AND b.k_id=c.k_id AND c.dt_id=$dt_id order by nv_id desc"; //echo $sql;
// $sql="SELECT * FROM nhanvien a, khoa b, daotao c 
//  	  WHERE a.k_id=b.k_id AND b.k_id=c.k_id AND c.dt_id=$dt_id order by nv_id desc";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$i=0;
?>

<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Phái</th>
		<th>Điện thoại</th>
        <th>Tài khoản</th>
        <th>Khoa</th>
        <th>Quyền</th>
		<th class="text-center">Tùy chọn</th>
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
            <td><?php echo $nhanvien->k_ten; ?></td>
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
				<?php
                $a="SELECT q_id FROM quyennhanvien WHERE nv_id=$nhanvien->nv_id";
                $qra=mysqli_query($con, $a);
                $quyen = array();
                while ($rowq=mysqli_fetch_array($qra)) {
                    array_push($quyen, $rowq['q_id']);
                }
                if(in_array("3", $quyen)){
	                ?>
	                <a href="index.php?page=khdaotao&act=themgv&dt_id=<?php echo $dt_id; ?>&hk=<?php echo $hk; ?>&nk=<?php echo $nk; ?>&mh_id=<?php echo $mh_id; ?>&l_id=<?php echo $l_id; ?>&nv_id=<?php echo $nhanvien->nv_id ?>">
	                <input type="button" name="download" class="btn btn-xs btn-info" value="Chọn">
	                </a>
	                <?php
	            } 
	            else{ ?>
	            	<input type="button" name="" class="btn btn-xs btn-info" value="Chọn" disabled>
	            	<?php
	            } ?>
			</td>
		</tr>
		<?php
	} ?>
</table>
<br/>