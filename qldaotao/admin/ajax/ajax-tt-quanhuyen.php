<?php
include_once "../../db/dbcon.php";
include_once "../../function/function.php";
$slcategory = isset($_GET['slCategory']) ? (int) $_GET['slCategory'] : 0;
if($slcategory==1){
	if(!isset($slquanhuyen)) showQHList_add($con); else showQHList($con, $slquanhuyen);
}
else
	echo "No result!"; ?>