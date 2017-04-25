
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo isset($title) ? $title : 'Quản lý đào tạo' ?>-Online</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css">
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
</head>

<style type="text/css">
.card-container.card {
    max-width: 400px;
    margin-left: -7px;
    
}
.container, .row{
    background-color: #ccc;
    width: 400px;
    padding: 0px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 6px 0px;

    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(30,144,255);
}

.forgot-password {
    color: rgb(104, 145, 162);
    float: right;
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(30,144,255);
}
.footer{
    margin: 20px 0px 0px 0px;
}
body{
    margin-top: 30px;
}
</style>

<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
<body>
    
    <img src="./img/wave.png" style="position: absolute; top: -8%; width: 100%; z-index: -99;">
    
    <?php 
    include_once "./db/dbcon.php"; 
    include_once "./function/function.php";

    //cấu hình thông tin do google cung cấp
    $api_url     = 'https://www.google.com/recaptcha/api/siteverify';
    $site_key    = '6LewGBoUAAAAAP-Xhe8AP79gJy4nWUjmc_MV-avd';
    $secret_key  = '6LewGBoUAAAAAIb41UmIfebtJ6-QgY8JPh7S8bPa';

    $gioitinh=0;
    if(isset($_POST['submit'])){
        $email = isset($_POST['txtEmail']) ? filter_data($_POST['txtEmail']) : NULL;
        $matkhau = isset($_POST['txtMatKhau']) ? filter_data($_POST['txtMatKhau']) : NULL;
        $hoten = isset($_POST['txtTen']) ? filter_data($_POST['txtTen']) : NULL;
        $gioitinh = isset($_POST['rdGioiTinh']) ? filter_data($_POST['rdGioiTinh']) : 0;
        $ngaysinh = isset($_POST['txtNgaySinh']) ? filter_data($_POST['txtNgaySinh']) : 0;
        //var_dump($gioitinh); die();
        if(empty($email) || empty($matkhau) || empty($hoten) || empty($ngaysinh))
            $loi = "Điền đầy đủ thông tin bên dưới!";
        else{
            $partten = "/^([A-Z]){1}([\w_\!@#$%^&*()]+){5,31}$/";
            if(!preg_match($partten ,$matkhau, $matchs))
                $loi="Mật khẩu bắt đầu bằng chữ in hoa, có ít nhất 1 ký tự đặc biệt, có chữ số";

            if(getdate()["year"] -substr($ngaysinh, 0, 4)<18)
                $loi = "Năm sinh phải đủ 18 tuổi";

            $sql = "SELECT * FROM sinhvien WHERE sv_email='".$email."'";
            $rs = mysqli_query($con, $sql);
            if(mysqli_num_rows($rs)>0)
                $loi = "Tài khoản Email này đã tồn tại!";
        }

        //lấy dữ liệu được post lên
        $site_key_post    = $_POST['g-recaptcha-response'];
          
        //lấy IP của khach
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $remoteip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $remoteip = $_SERVER['REMOTE_ADDR'];
        }
         
        //tạo link kết nối
        $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
        //lấy kết quả trả về từ google
        $response = file_get_contents($api_url);
        //dữ liệu trả về dạng json
        $response = json_decode($response);
        if(!isset($response->success)){
           $loi="Hãy xác nhận không phải robot";
        }
        if($response->success != true){
            $loi= 'Xác nhận không phải robot';
        }

        if(empty($loi)){
            $matkhau=md5($matkhau);
            $sql = "INSERT INTO `sinhvien`(`sv_hoten`, `sv_gioitinh`, `sv_ngaysinh`, `sv_email`, `sv_matkhau`, `sv_trangthai`) VALUES ('$hoten',$gioitinh,'$ngaysinh','$email','$matkhau',0)";
            //echo $sql;
            $rs = mysqli_query($con, $sql);
            if($rs){
                $ok = "Tạo tài khoản thành công! Chuyển đến đăng nhập trong 3 giây";
                $email =  $matkhau = $hoten = $gioitinh = $ngaysinh = "";
                echo "<script>alert('Đăng ký thành công! Hãy đăng nhập để sử dụng hệ thống');</script>";
                redirect("index.php",0);
            }
            
        }
             
    }
    ?>
    
        
    <div class="container" style="background-color:white;">

        <div class="row">
            
            <div class="col-md-12">


             <div class="container">
                <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="img/admin.png" />
                    <p id="profile-name" class="profile-name-card">
                        <?php if(isset($loi)) echo show_error($loi);?>
                    </p>
                    <form class="form-signin" method="post" action="">
                        <span id="reauth-email" class="reauth-email"></span>
                        <label>Email:</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus required name="txtEmail" value="<?php if(isset($email)) echo $email; ?>">

                        <label class="Pass">Password:</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="txtMatKhau" required value="<?php if(isset($matkhau)) echo $matkhau; ?>">

                        <label>Họ tên:</label>
                        <input type="text" id="inputEmail" class="form-control" placeholder="Họ tên khai sinh..." required name="txtTen" value="<?php if(isset($hoten)) echo $hoten; ?>">

                        <label>Giới tính:</label>
                        <input type="radio" name="rdGioiTinh" value="0" <?php echo isset($gioitinh) && $gioitinh==0 ? "checked" : '';?>> Nam</option> 
                        <input type="radio" name="rdGioiTinh" value="1" <?php echo isset($gioitinh) && $gioitinh==1 ? "checked" : '';?>> Nữ</option><br/>

                        <label>Ngày sinh:</label>
                        <input type="date" id="inputEmail" class="form-control" placeholder="Ngày sinh..." required name="txtNgaySinh" value="<?php if(isset($ngaysinh)) echo $ngaysinh; ?>">

                        <div class="g-recaptcha" data-sitekey="6LewGBoUAAAAAP-Xhe8AP79gJy4nWUjmc_MV-avd"></div>

                        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block btn-signin" value="Register" style="margin-top: 10px;" />
                        <a href="index.php">Đăng nhập</a>
                    </form><!-- /form -->
                    
                </div><!-- /card-container -->
            </div><!-- /container -->


            </div>
        </div>
    </div>

</body>
</html>
