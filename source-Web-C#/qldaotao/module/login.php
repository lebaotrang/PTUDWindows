<?php
$email=isset($_POST['txtEmail']) ? filter_data($_POST['txtEmail']) : NULL;
$pass=isset($_POST['txtMatkhau']) ? filter_data($_POST['txtMatkhau']) : NULL;
$pass= ($pass!='') ? md5($pass) : NULL; //var_dump($pass); var_dump($email);
$rdtaikhoan=isset($_POST['rdTaiKhoan']) ? filter_data($_POST['rdTaiKhoan']) : 0;
if(isset($_POST['submit'])){

    if(!empty($email)&&!empty($pass)){
        if($rdtaikhoan==0){
            $sql="SELECT * FROM sinhvien WHERE sv_email='$email' and sv_matkhau='$pass'";
            $rs=mysqli_query($con, $sql);
            if(!$rs) die("Lỗi truy vấn CSDL!");

            if(mysqli_num_rows($rs)>0){
                $row=mysqli_fetch_array($rs);
                $_SESSION['user_name']=$row['sv_email'];
                //bắt quyền ở đây khi có radio phân quyền
                //$_SESSION['user_quyen']=4;
                redirect("index.php", 0);   
            }
            else{
                $loi = "Thông tin đăng nhập không đúng";
            }
        }
        else{
            $sql="SELECT * FROM nhanvien WHERE nv_email='$email' and nv_matkhau='$pass'";
            $rs=mysqli_query($con, $sql);
            if(!$rs) die("Lỗi truy vấn CSDL!");

            if(mysqli_num_rows($rs)>0){
                $row=mysqli_fetch_array($rs);
                $_SESSION['user_name']=$row['nv_email'];

                $sql1 = "SELECT * FROM quyennhanvien WHERE nv_id=$row[nv_id]";
                $rs1 = mysqli_query($con, $sql1);
                $_SESSION['user_quyen'] = array();
                while ($row1=mysqli_fetch_array($rs1)) {
                    array_push($_SESSION['user_quyen'], $row1['q_id']);
                }
                //var_dump($_SESSION['user_quyen']); //die();
                redirect("index.php", 0);   
            }
            else{
                $loi = "Thông tin đăng nhập không đúng";
            }
        }
        
    }
    else{
        //show_warning("Thông tin KHONG day du");
        $loi = "Thông tin không đầy đủ";
    }
}
include_once("layout/login.php"); // gọi giao dien Login
?>