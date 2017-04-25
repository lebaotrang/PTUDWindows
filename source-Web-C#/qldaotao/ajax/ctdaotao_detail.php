<?php
include_once "../db/dbcon.php";
include_once "../function/function.php";
$dt_id= isset($_GET['dt_id']) ? (int) $_GET['dt_id'] : 0;
// $sql="SELECT * FROM monhoc a, nhanvien b WHERE dt_id=$dt_id AND a.nv_id = b.nv_id ORDER BY mh_id";
$sql="SELECT * FROM monhoc WHERE dt_id=$dt_id ORDER BY mh_id";
$rs=mysqli_query($con, $sql);
if(!$rs) die("Lỗi truy vấn CSDL!");

$item_per_page=9;
echo '<script>';
echo 'var item_per_page='.$item_per_page;
echo '</script>';
?>
<style type="text/css">
.pagination{
	margin: 0px !important;
}
</style>

<script language="javascript">
$(document).ready(function() {

    $('#tbody_ds_sp tr').hide();
    //$('#pagging a:first').addClass('active-pagination');
    
    for(var i=0;i<(item_per_page);i++) {
         $('#tbody_ds_sp tr:eq('+i+')').show();
    }
    
    $('#pagging a').click(function(){
        // $('#pagging a').removeClass('active-pagination')
        // $(this).addClass('active-pagination')
        $('#tbody_ds_sp tr').hide();
        var stt=$(this).attr('stt');
        var start=(stt-1)*item_per_page;
        var end=start+item_per_page;
        if(start>=0){
            for(var i=(start);i<end;i++) {
                $('#tbody_ds_sp tr:eq('+i+')').show();
            }
        }
    });

});
</script>
<table id="tablechitiet" class="table table-striped table-hover table-bordered">
    <thead>
	    <tr>
	        <th>STT</th>
	        <th>Tên môn</th>
	        <th>Số tín chỉ</th>
	    </tr>
    </thead>
    <?php
    $sql1 = "select count(*) as tong from monhoc where dt_id = $dt_id";
    $rs1=mysqli_query($con, $sql1);

    $total_item=mysqli_fetch_object($rs1)->tong;
    echo $total_item;
    $total_page=ceil($total_item/$item_per_page); //echo $total_page;

    if($total_item>0){ ?>
    <tbody id="tbody_ds_sp">
	    <?php
	    $i=0;
	    while ($monhoc = mysqli_fetch_object($rs)){
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
    <?php
    }//dong if($total_item>0) ?>
    <tr>
    	<td colspan="4" class="text-center">
    		
    		<?php
           	$pagging="";
            if($total_page>1){
                for($i=1;$i<=$total_page; $i++){
                    $pagging.='<a href="javascript:;" class="page'.$i.' active" stt="'.$i.'" title="trang thứ '.$i.'">'.$i.'</a>&nbsp;';
                } 
                echo '<ul class="pagination"><li id="pagging">'.$pagging.'</li></ul>';
            }
            if($total_item==0)
            	echo "Môn học chưa cập nhật!";
            ?>

    	</td>
    </tr>

    <tr>
        <td colspan="5" align="center">
            <input type="button" value=" Đóng " name="close" id="detailContactClose" class="btn btn-xs btn-info btnclose" />
        </td>
    </tr>
</table>

    <script language="javascript">
	$(document).ready(function() {
		//dong table dang nhap
		$('#detailContactClose').click(function() {
			$('#popup').hide('slow');
		});
    });
	</script>
