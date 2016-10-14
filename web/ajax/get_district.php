<?php 
require_once('../private/initialize.php');
if(empty($_GET['id'])) {
  redirect_to(BASE.'/Masters/index');
}
$district_set = Im_Mr_District::find_all_by_state($_GET["id"]);
if(count($district_set)>0){
  echo '<select name="districtcode" id="districtcode" class="form-control" required onchange="GetPost(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  foreach($district_set as $district){
    echo "<option value={$district->idt_districtcode}>".ucfirst($district->idt_districtname)."</option>";
  }
  echo '</select>';
}else{
  echo '<select name="districtcode" id="districtcode" class="form-control" required onchange="GetPost(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  echo '</select>';
}