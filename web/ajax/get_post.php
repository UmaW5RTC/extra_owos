<?php 
require_once('../private/initialize.php');
if(empty($_GET['id'])) {
  redirect_to(BASE.'/Masters/index');
}
$post_set = Im_Mr_Postoffice::find_all_by_district($_GET["id"]);
if(count($post_set)>0){
  echo '<select name="post" id="post" class="form-control" onchange="GetPincode(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  foreach($post_set as $post){
    echo "<option value={$post->ipo_poid}>".ucfirst($post->ipo_poname)."</option>";
  }
  echo '</select>';
}else{
  echo '<select name="post" id="post" class="form-control" onchange="GetPincode(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  echo '</select>';
}