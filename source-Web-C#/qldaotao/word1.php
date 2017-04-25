<?php
session_start();
define('ROOT_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))) . '/' );
define('DOMAIN', '/qldaotao/');
date_default_timezone_set('Asia/Saigon'); 

//Định nghĩa các hằng số kết nối đến database
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_NAME', 'quanlydaotao');

// Tạo chuỗi kết nối và thiết lập hiển thị tiếng việt
$con=mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME) or die("Lỗi! Không thể kết nối đến MySQL");

mysqli_query($con, "set names 'utf8'"); 
header("Content-type: application/vnd.ms-word");
$filename=$_SESSION['user_name']."_result.doc";
header("Content-Disposition: attachment; Filename= ".$filename);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <style type="text/css">table tr{padding: 3px;}</style>
</head>

<body>
<h3 class="text-center text-danger">KẾT QUẢ HỌC TẬP</h3>
<?php
$sql="SELECT * FROM sinhvien a, ketqua b, monhoc c
	  WHERE a.sv_id=b.sv_id AND b.mh_id=c.mh_id AND sv_email='".$_SESSION['user_name']."'";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
?>
<table border="1" style="margin-bottom: 0px; border-collapse: collapse; width: 100%;">
	<tr>
		<th>STT</th>
		<th>Tên môn</th>
		<th>Thi L1</th>
		<th>Thi L2</th>
		<th>Kết quả</th>
		<th>Tích lũy</th>
	</tr>
	<?php
	$i=0;
	$tongtl = 0;
	$tongtc = 0;
	$trungbinh = 0;
	while($daotao = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daotao->mh_ten; ?></td>
			<td><?php echo $daotao->kq_diemlan1; ?></td>
			<td><?php echo $daotao->kq_diemlan2; ?></td>
			<td><?php echo $daotao->kq_trungbinh>=5.5 ? $daotao->kq_trungbinh." (<b class=text-success>Pass</b>)" : $daotao->kq_trungbinh." (<b class=text-danger>Fail</b>)"; ?></td>
			<td>
			<?php 
			echo $daotao->kq_trungbinh>=5.5 ? $daotao->mh_tinchi : 0; ?>	
			</td>
		</tr>
		<?php
		$tongtl = $daotao->kq_trungbinh>=5.5 ? $tongtl += $daotao->mh_tinchi : $tongtl += 0;
		$tongtc += $daotao->mh_tinchi; 
		//if($daotao->kq_trungbinh>=5.5)
			$trungbinh += (($daotao->kq_trungbinh)*$daotao->mh_tinchi);
	} ?>
</table>
<br/>
<strong>Tổng tín chỉ tích lũy: </strong><?php echo $tongtl; ?><br/>
<strong>Trung bình chung: </strong><?php echo number_format($trungbinh/$tongtc,3); ?>
<br/><br/>
</body>
</html>