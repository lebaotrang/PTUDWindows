<?php 
include_once "../../db/dbcon.php";
include_once "../../function/function.php";
$slquanhuyen = isset($_GET['slQuanHuyen']) ? (int) $_GET['slQuanHuyen'] : 0;
$tv_id = isset($_GET['tv_id']) ? (int) $_GET['tv_id'] : 0;

$sql="SELECT tv_id, tv_ten, qh_id FROM tu_vien WHERE qh_id=$slquanhuyen";
$qr=mysqli_query($con, $sql);
if(!$qr) die("Lỗi truy vấn CSDL!");
if(mysqli_num_rows($qr)<=0){
	?>
	<select name='slTuVien' class='form-control' id="tuvien">
		<option value="">No result!</option>
	</select>
	<?php
} 
else {?>
	<select name='slTuVien' class='form-control' id="slTuVien">
		<?php if($tv_id==0) {?><option value="">Chọn tự viện</option><?php } ?>
		<?php
		while($row=mysqli_fetch_array($qr)){ ?>
			<option value="<?php echo $row['tv_id']; ?>" <?php if($row['tv_id']==$tv_id) echo "selected"; ?>><?php echo $row['tv_ten']; ?></option>
			<?php
		} ?>
	</select>
	<?php
} ?>

<script language="javascript">
	$(document).ready(function() {
        $('#slTuVien').change(function() {
            $.get('ajax/ajax-ns-trutri.php', $('#ns-add').serialize(), function(e) {
                if( e ) {
                    $('#truTri').html(e);
                }	
            });
			//alert($('#ns-add').serialize());
        });	
		
    });
</script>