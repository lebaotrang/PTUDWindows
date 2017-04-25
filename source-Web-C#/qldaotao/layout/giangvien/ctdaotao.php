<?php if(!isset($_SESSION['user_name'])) redirect('login.php', 0); ?>
<style type="text/css">
#popup {
    z-index:999;  
    background:#000;
    background-color: rgba(0, 0, 0, 0.5);
    height:100%;
    width:100%;
    position:fixed;
    display:none;
    top:0;
    right:0;
    /*height: 100%;*/
    overflow: scroll;
}
#ketqua {
    z-index:999;  
    background:#000;
    background-color: rgba(0, 0, 0, 0.5);
    height:100%;
    width:100%;
    position:fixed;
    display:none;
    top:0;
    right:0;
}
#tablechitiet {
    background-color:#FFF;
    z-index:999;
    width:60%;
    height:auto;
    top:10%;
    left:20%;
    position:absolute;
}

</style>
<script type="text/javascript">
	$(document).ready(function(){

		$(".detail").click(function(){
			var dt_id=$(this).attr('dt_id'); //alert(dt_id);
			var data = 'dt_id='+ dt_id; //alert(data);
			$.ajax({
                url : "ajax/ctdaotao_detail.php",
                type : "get",
                dateType:"text",
                data : data,
                success : function (result){
                    //alert(result);
                    $('#popup').html(result).show();
                    //$('#ketqua').html(result);
                }
            });
            $('#popup').show('slow');
		});

		//dong table dang nhap
		$('#detailContactClose').click(function() {
			$('#popup').hide('slow');
		});
	});
</script>

<h3 class="text-center text-danger">CÁC CHƯƠNG TRÌNH ĐÀO TẠO HIỆN CÓ</h3>
<?php
$sql="SELECT * FROM daotao ORDER BY dt_id desc"; //echo $sql;
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");
$i=0;
?>
<!-- Popup xem chi tiết -->
<div class="col-md-12" id="popup">
	<!-- <table id="tablechitiet" class="table table-striped table-hover table-bordered">
        	
    </table>    -->
</div>

<?php
if(isset($confirm) && $confirm=="yes"){ ?>
    <form action="?page=ctdaotao&act=delete&dt_id=<?php echo $dt_id; ?>" method="POST">
        <div class="alert alert-block alert-danger">
            <h4>Cảnh báo xóa!</h4>
            <p>Thao tác sẽ xóa toàn bộ các môn học thuộc CTĐT này! Bạn có chắc chắn thực hiện?
                <!-- <input type="hidden" name="nn_id" value="<?php //echo $nn_id; ?>"> -->
                <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                <a href="?page=ctdaotao"><button type="button" name="cancelDel" id="cancelDel" class="btn btn-default">Hủy</button></a>
            </p>
        </div>
    </form>
    <?php
} ?>

<a href="index.php?page=ctdaotao&act=them">
    <input type="button" name="" class="btn btn-success btn-xs pull-right" value="Thêm mới">
</a>
<table class="table table-bordered table-responsive" style="margin-bottom: 0px;">
	<tr>
		<th>STT</th>
		<th>Mã CT</th>
		<th>Tên CT</th>
		<th>Mô tả</th>
		<th class="text-center">Tùy chọn</th>
	</tr>
	<?php
	while($daotao = mysqli_fetch_object($rs)){ 
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daotao->dt_ma; ?></td>
			<td><?php echo $daotao->dt_ten; ?></td>
			<td><?php echo $daotao->dt_mota; ?></td>
			<td class="text-center">
				<input type="button" name="detail" dt_id=<?php echo $daotao->dt_id; ?> class="btn btn-xs btn-success detail" value="Xem nhanh">

				<a href="./word.php?dt_id=<?php echo $daotao->dt_id; ?>">
				<input type="button" name="download" class="btn btn-xs btn-info" value="Tải về">
				</a>

                <a href="?page=ctdaotao&act=themmon&dt_id=<?php echo $daotao->dt_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-default" value="Thêm môn">
                </a>

                <a href="?page=ctdaotao&act=suamon&dt_id=<?php echo $daotao->dt_id; ?>">
                <input type="button" name="chitiet" dt_id=<?php echo $daotao->dt_id; ?> class="btn btn-xs btn-primary" value="Sửa môn">
                </a>

                <a href="?page=ctdaotao&act=edit&dt_id=<?php echo $daotao->dt_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-warning" value="Sửa">
                </a>

                <a href="?page=ctdaotao&act=delete&dt_id=<?php echo $daotao->dt_id; ?>">
                <input type="button" name="download" class="btn btn-xs btn-danger" value="Xóa">
                </a>
			</td>
		</tr>
		<?php
	} ?>
</table>
<br/>