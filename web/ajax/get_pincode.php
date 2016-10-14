<?php 
require_once('../private/initialize.php');
if(empty($_GET['id'])) {
  redirect_to(BASE.'/Masters/index');
}
$post = Im_Mr_Postoffice::find_by_id($_GET["id"]);

$arr = array ("pincode"=>"$post->ipo_pincode");
echo json_encode($arr);
