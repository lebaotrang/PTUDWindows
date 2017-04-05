<?php
//In thông báo lỗi
function show_warning($message_warning=''){
	if(! empty($message_warning) ){?>
		<div class="alert alert-warning fade in alertStyle">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="<?php echo DOMAIN.'img/warning.png'; ?>"></img>&nbsp;<strong>Chú ý! </strong><?php echo $message_warning;?>
		</div>
		<?php
	}
}
//In thông báo lỗi
function show_error($message_errors=''){
	if(! empty($message_errors) ){?>
		<div class="alert alert-danger fade in alertStyle">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="<?php echo DOMAIN.'img/fail.png'; ?>"></img>&nbsp;<strong>Cảnh báo! </strong><?php echo $message_errors;?>
		</div>
		<?php
	}
}
//In thông báo thành công
function show_success($message_success=''){
	if(!empty($message_success) ){?>
		<div class="alert alert-success fade in alertStyle">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="<?php echo DOMAIN.'img/success.png'; ?>"></img>&nbsp;<strong>Thông báo! </strong><?php echo $message_success;?>
		</div>
		<?php
	}
}
//In thông báo thông tin
function show_info($message_info=''){
	if(!empty($message_info) ){?>
		<div class="alert alert-info fade in alertStyle">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="<?php echo DOMAIN.'img/success.png'; ?>"></img>&nbsp;<strong>Thông tin! </strong><?php echo $message_info;?>
		</div>
		<?php
	}
}
//In thông báo thông tin
function show_confirm($message_cf=''){
	if(!empty($message_cf) ){?>
		<div class="alert alert-danger fade in alertStyle">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<img src="<?php echo DOMAIN.'img/success.png'; ?>"></img>&nbsp;<strong>Thông tin! </strong><?php echo $message_info;?>
		</div>
		<?php
	}
}
function show_info_user($message_info=''){
	if(!empty($message_info) ){?>
		<div id="info"><img src="<?php echo DOMAIN.'img/success.png'; ?>"></img>&nbsp;<?php echo $message_info;?><span class="close">x</span></div>
		<?php
	}
}
//Chuyển hướng trang
function redirect($url = '', $second=0){
	if( $url === '' ){
		$url = 'index.php';
	}
	echo '<meta http-equiv="refresh" content="'.$second.';URL='.$url.'"/>';
	exit();
}
//lọc đầu vào dữ liệu
function filter_data($data=''){
	$filter_data=htmlspecialchars(addslashes(trim($data)));
	return $filter_data;
}

function checkQuyen($con, $val=array()){ 
	//var_dump($val);
	$sql = "SELECT * FROM quyen";
	$qr = mysqli_query($con, $sql);
	?>
    <div class="checkbox">
    	<?php
    	while($row=mysqli_fetch_object($qr)){ ?>
    		<label><input type="checkbox" name="checkQuyen[]" value="<?php echo $row->q_id ?>" <?php if(in_array($row->q_id, $val)) echo "checked"?>><?php echo $row->q_ten; ?>&nbsp;&nbsp;</label>
    		<?php
    	} ?>
    </div>
    <?php
}

//Combobox Khoa
function showKhoaList($con, $selectedValue=0) {
	//var_dump($selectedValue);
    $query = "select * from khoa";
    $result = mysqli_query($con, $query);
    echo "<select name='slKhoa' class='form-control' id='slKhoa'>
			<option value='0'>Chọn khoa</option>";
    while ($row = mysqli_fetch_array($result)) {
		if ($row['k_id'] == $selectedValue) {
			echo "<option value='" . $row['k_id'] . "' selected>" . $row['k_ten'] . "</option>";
		} else {
			echo "<option value='" . $row['k_id'] . "'>" . $row['k_ten'] . "</option>";
		}
    }
    echo "</select>";
}

//Phân trang
function pagenav($base_url, $start, $max_value, $num_per_page) {
    $pgcont = 4;
    $pgcont = (int) ($pgcont - ($pgcont % 2)) / 2;
    if ($start >= $max_value)
        $start = max(0, (int) $max_value - (((int) $max_value % (int)  $num_per_page) == 0 ? $num_per_page : ((int) $max_value % (int)  $num_per_page)));
    else
        $start = max(0, (int) $start - ((int) $start % (int) $num_per_page));
    $base_link = '<a class="navpg" href="' . strtr($base_url, array('%' => '%%')) . 'start=%d' . '"><b class="normal-pagination">%s</b></a> ';
    $pageindex = $start == 0 ? '' : sprintf($base_link, $start - $num_per_page, '&lt;&lt;');
    if ($start > $num_per_page * $pgcont)
        $pageindex .= sprintf($base_link, 0, '1');
    if ($start > $num_per_page * ($pgcont + 1))
        $pageindex .= '<span style="font-weight: bold;"> ... </span>';
    for ($nCont = $pgcont; $nCont >= 1; $nCont--)
        if ($start >= $num_per_page * $nCont) {
            $tmpStart = $start - $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
        $pageindex .= '<b class="active-pagination">' . ($start / $num_per_page + 1) . '</b> ';
    $tmpMaxPages = (int) (($max_value - 1) / $num_per_page) * $num_per_page;
    for ($nCont = 1; $nCont <= $pgcont; $nCont++)
        if ($start + $num_per_page * $nCont <= $tmpMaxPages) {
            $tmpStart = $start + $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
        if ($start + $num_per_page * ($pgcont + 1) < $tmpMaxPages)
            $pageindex .= '<span style="font-weight: bold;"> ... </span>';
        if ($start + $num_per_page * $pgcont < $tmpMaxPages)
            $pageindex .= sprintf($base_link, $tmpMaxPages, $tmpMaxPages / $num_per_page + 1);
        if ($start + $num_per_page < $max_value) {
            $display_page = ($start + $num_per_page) > $max_value ? $max_value : ($start + $num_per_page);
            $pageindex .= sprintf($base_link, $display_page, '&gt;&gt;');
        }
        return $pageindex;
}
//Combobox Quan-Huyen
function showQHList($con, $selectedValue=0) {
    $query = "select qh_id, qh_ten from quan_huyen";
    $result = mysqli_query($con, $query);
    echo "<select name='slQuanHuyen' class='form-control' id='slQuanHuyen'>
			<option value='0'>Chọn khu vực</option>";
    while ($row = mysqli_fetch_array($result)) {
		if ($row['qh_id'] == $selectedValue) {
			echo "<option value='" . $row['qh_id'] . "' selected>" . $row['qh_ten'] . "</option>";
		} else {
			echo "<option value='" . $row['qh_id'] . "'>" . $row['qh_ten'] . "</option>";
		}
    }
    echo "</select>";
}
//Combobox thêm Quan-Huyen
function showQHList_add($con) {
    $query = "select qh_id, qh_ten from quan_huyen";
    $result = mysqli_query($con, $query);
    echo "<select name='slQuanHuyen' class='form-control' id='slQuanHuyen'>
			<option value='0'>Chọn khu vực</option>";
    while ($row = mysqli_fetch_array($result)) {
		echo "<option value='" . $row['qh_id'] . "'>" . $row['qh_ten'] . "</option>";
    }
    echo "</select>";
}
//Combobox Ban Nganh
function showBNList($con, $selectedValue=0) {
    $query = "select bn_id, bn_ten from ban_nganh";
    $result = mysqli_query($con, $query);
    echo "<select name='slBanNganh' class='form-control' id='slBanNganh'>
			<option value='0'>Chọn ban ngành</option>";
    while ($row = mysqli_fetch_array($result)) {
		if ($row['bn_id'] == $selectedValue) {
			echo "<option value='" . $row['bn_id'] . "' selected>" . $row['bn_ten'] . "</option>";
		} else {
			echo "<option value='" . $row['bn_id'] . "'>" . $row['bn_ten'] . "</option>";
		}
    }
    echo "</select>";
}
//Combobox thêm Ban Nganh
function showBNList_add($con) {
    $query = "select bn_id, bn_ten from ban_nganh";
    $result = mysqli_query($con, $query);
    echo "<select name='slBanNganh' class='form-control' id='slBanNganh'>
			<option value='0'>Chọn ban ngành</option>";
    while ($row = mysqli_fetch_array($result)) {
		echo "<option value='" . $row['bn_id'] . "'>" . $row['bn_ten'] . "</option>";
    }
    echo "</select>";
}

//
function showTV_QHList($con, $slquanhuyen, $selectedValue) {
    $query = "select tv_id,tv_ten,qh_id from tu_vien WHERE qh_id=$slquanhuyen";
    $result = mysqli_query($con, $query);
    echo "<select name='slTuVien' class='form-control' id='slTuVien'>
			<option value='0'>Chọn tự viện</option>";
    while ($row = mysqli_fetch_array($result)) {
		if ($row['tv_id'] == $selectedValue) {
			echo "<option value='" . $row['tv_id'] . "' selected>" . $row['tv_ten'] . "</option>";
		} else {
			echo "<option value='" . $row['tv_id'] . "'>" . $row['tv_ten'] . "</option>";
		}
    }
    echo "</select>";
}

function sendGMail($username, $password, $name, $addresses, $replyTos, $subject, $content){
	//require_once(DOMAIN."admin/PHPMailer/class.phpmailer.php");
	$mail = new PHPMailer(true);
	$mail->IsSMTP(); //Thiet lap mailer de su dung SMTP
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true; // Bat chung thuc SMTP 
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com"; // Chi dinh Server chinh va Server phu
	$mail->Port = "465"; // Thiet lap cong de su dung
	$mail->Username = $username; // username (Dia chi mail) cua nguoi gui 
	$mail->Password = $password;// Password cua nguoi gui
	
	foreach($addresses as $address){
		$mail->AddAddress($address[0], $address[1]);
	} // Dia chi nguoi nhan - Tao mot mang nhieu nguwoi nhan
	foreach($replyTos as $replyTo){
		$mail->AddReplyTo($replyTo[0], $replyTo[1]);
	} // mail duoc Reply cho ai - Tao mot mang nhieu nguoi duoc reply
	
	$mail->SetFrom($username, $name); // Tu nguoi gui, ten nguoi gui
	
	$mail->Subject = $subject; // chu de thu
	$mail->MsgHTML($content); // noi dung thu
	
	$mail->CharSet = 'UTF-8';
	$mail->Send();
}

//Lấy số trang từ bảng CSDL cài đặt số trang
function getcd_trang($con, $cd_ten='admin'){
	$sql="SELECT cd_trang FROM caidat WHERE cd_ten='$cd_ten'";
	$rs=mysqli_query($con, $sql);
	if(!$rs) die("Lỗi truy vấn CSDL!");
	$row=mysqli_fetch_array($rs);
	foreach ($row as $v)
		$cd_trang=(int)$v;
	return $cd_trang;
}
function select_db($sql){
	$qr=mysql_query($sql);
	//if(!$qr) die('Truy vấn không thành công!');
	if(!$qr) {
		return false;
		exit();
	}
	else {
		if(mysql_num_rows($qr)>0){
			while($data=mysql_fetch_assoc($qr)){
				$array[]=$data;
			}
		}
	}
	return isset($array) ? $array : array();
}

function insert_db($sql){
	$qr=mysql_query($sql);
	if(!$qr) 
		return false;
	else 
		return true;
}

function update_db($sql){
	$qr=mysql_query($sql);
	if(!$qr) 
		return false;
	else 
		return true;
}

function delete_db($sql){
	$qr=mysql_query($sql);
	if(!$qr) 
		return false;
	else 
		return true;
}
function disconnect($connect){
	if($connect){
		mysql_close($connect);
	}
}

class SimpleImage {
   
	var $image;
	var $image_type;
 
	function __construct($filename = null){
		if (!empty($filename)) {
			$this->load($filename);
		}
	}
 
	function load($filename)
	{
		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
 
		if ($this->image_type == IMAGETYPE_JPEG) {
			$this->image = imagecreatefromjpeg($filename);
		} elseif ($this->image_type == IMAGETYPE_GIF) {
			$this->image = imagecreatefromgif($filename);
		} elseif ($this->image_type == IMAGETYPE_PNG) {
			$this->image = imagecreatefrompng($filename);
		} else {
			throw new Exception("The file you're trying to open is not supported");
		}
	}
 
	function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null)
	{
		if ($image_type == IMAGETYPE_JPEG) {
			imagejpeg($this->image,$filename,$compression);
		} elseif ($image_type == IMAGETYPE_GIF) {
			imagegif($this->image,$filename);         
		} elseif ($image_type == IMAGETYPE_PNG) {
			imagepng($this->image,$filename);
		}
 
		if ($permissions != null) {
			chmod($filename,$permissions);
		}
	}
 
	function output($image_type=IMAGETYPE_JPEG, $quality = 80)
	{
		if ($image_type == IMAGETYPE_JPEG) {
			header("Content-type: image/jpeg");
			imagejpeg($this->image, null, $quality);
		} elseif ($image_type == IMAGETYPE_GIF) {
			header("Content-type: image/gif");
			imagegif($this->image);         
		} elseif ($image_type == IMAGETYPE_PNG) {
			header("Content-type: image/png");
			imagepng($this->image);
		}
	}
 
	function getWidth()
	{
		return imagesx($this->image);
	}
 
	function getHeight()
	{
		return imagesy($this->image);
	}
 
	function resizeToHeight($height)
	{
		$ratio = $height / $this->getHeight();
		$width = round($this->getWidth() * $ratio);
		$this->resize($width,$height);
	}
 
	function resizeToWidth($width)
	{
		$ratio = $width / $this->getWidth();
		$height = round($this->getHeight() * $ratio);
		$this->resize($width,$height);
	}
 
	function square($size)
	{
		$new_image = imagecreatetruecolor($size, $size);
 
		if ($this->getWidth() > $this->getHeight()) {
			$this->resizeToHeight($size);
			
			imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			imagecopy($new_image, $this->image, 0, 0, ($this->getWidth() - $size) / 2, 0, $size, $size);
 
		} else {
			$this->resizeToWidth($size);
			
			imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			imagecopy($new_image, $this->image, 0, 0, 0, ($this->getHeight() - $size) / 2, $size, $size);
 
		}
 
		$this->image = $new_image;
	}
   
	function scale($scale)
	{
		$width = $this->getWidth() * $scale/100;
		$height = $this->getHeight() * $scale/100; 
		$this->resize($width,$height);
	}
   
	function resize($width,$height)
	{
		$new_image = imagecreatetruecolor($width, $height);
		
		imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
		
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;   
	}
 
    function cut($x, $y, $width, $height)
    {
    	$new_image = imagecreatetruecolor($width, $height);	
 
		imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
 
		imagecopy($new_image, $this->image, 0, 0, $x, $y, $width, $height);
 
		$this->image = $new_image;
	}
 
	function maxarea($width, $height = null)
	{
		$height = $height ? $height : $width;
		
		if ($this->getWidth() > $width) {
			$this->resizeToWidth($width);
		}
		if ($this->getHeight() > $height) {
			$this->resizeToheight($height);
		}
	}
 
	function cutFromCenter($width, $height)
	{
		
		if ($width < $this->getWidth() && $width > $height) {
			$this->resizeToWidth($width);
		}
		if ($height < $this->getHeight() && $width < $height) {
			$this->resizeToHeight($height);
		}
		
		$x = ($this->getWidth() / 2) - ($width / 2);
		$y = ($this->getHeight() / 2) - ($height / 2);
		
		return $this->cut($x, $y, $width, $height);
	}
 
	function maxareafill($width, $height, $red = 0, $green = 0, $blue = 0)
	{
	    $this->maxarea($width, $height);
	    $new_image = imagecreatetruecolor($width, $height); 
	    $color_fill = imagecolorallocate($new_image, $red, $green, $blue);
	    imagefill($new_image, 0, 0, $color_fill);        
	    imagecopyresampled(	$new_image, 
	    					$this->image, 
	    					floor(($width - $this->getWidth())/2), 
	    					floor(($height-$this->getHeight())/2), 
	    					0, 0, 
	    					$this->getWidth(), 
	    					$this->getHeight(), 
	    					$this->getWidth(), 
	    					$this->getHeight()
	    				); 
	    $this->image = $new_image;
	}
 
}
?>