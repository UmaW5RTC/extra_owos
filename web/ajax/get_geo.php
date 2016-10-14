<?php 
require_once('../private/initialize.php');
if(empty($_GET['id'])) {
  redirect_to(BASE.'/Masters/index');
}
$geo_set = Im_Mr_Geocode::find_all_by_state($_GET["id"]);
if(count($geo_set)>0){
  echo '<select name="geo" id="geo" class="form-control">';
  echo '<option value="" selected="selected">-- Select --</option>';
  foreach($geo_set as $geo){
    echo "<option value={$geo->ige_geocode}>".ucfirst($geo->ige_geocodename)."</option>";
  }
  echo '</select>';
}else{
  echo '<select name="geo" id="geo" class="form-control" >';
  echo '<option value="" selected="selected">-- Select --</option>';
  echo '</select>';
}