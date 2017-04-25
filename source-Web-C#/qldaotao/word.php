<?php
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
$filename=$_GET['dt_id']."_daotao_detail.doc";
header("Content-Disposition: attachment; Filename= ".$filename);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>

<body>
<?php
if(isset($_GET['dt_id'])){		
    $dt_id = $_GET['dt_id'];
    if(!is_numeric($dt_id))
    	redirect("index.php",0);
    else{
		$sql="SELECT * FROM daotao where dt_id = $dt_id";
		$rs=mysqli_query($con, $sql);
        if(!$rs) die("Lỗi truy vấn CSDL!");
        $row=mysqli_fetch_object($rs);
		?>

		<h3 class="text-center text-info">Chi tiết các học phần ngành <?php echo $row->dt_ten; ?></h3>
		<?php
		$sql1="SELECT * FROM daotao a, monhoc b WHERE a.dt_id=b.dt_id AND a.dt_id=$dt_id order by mh_id";
		//echo $sql1;
		$rs1=mysqli_query($con, $sql1);
		if(!$rs1) die("Lỗi truy vấn CSDL!");
		?>

        <table border="1" style="border-collapse:collapse">
        	<thead>
			    <tr>
			        <th>STT</th>
			        <th>Tên môn</th>
			        <th>Số tín chỉ</th>
			    </tr>
		    </thead>
			<tbody id="tbody_ds_sp">
			    <?php
			    $i=0;
			    while ($monhoc = mysqli_fetch_object($rs1)){
			    	$i++;
				    ?>
				    <tr>
				        <td><?php echo $i; ?></td>
				        <td><?php echo $monhoc->mh_ten; ?></td>
				        <td><?php echo $monhoc->mh_tinchi; ?></td>
				    </tr>

				    <?php
				} //end while
			    ?>
		    </tbody>
		</table>
	    <?php
	}	
}
?>
</body>
</html>