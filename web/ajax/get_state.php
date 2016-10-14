<?php 
require_once('../private/initialize.php');
if(empty($_GET['id'])) {
  redirect_to(BASE.'/Masters/index');
}
$state_set = Im_Mr_State::find_all_by_country($_GET["id"]);
if(count($state_set)>0){
  echo '<select name="statecode" id="statecode" class="form-control" required onchange="GetDistrict(this);GetGeo(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  foreach($state_set as $state){
    echo "<option value={$state->ist_statecode}>".ucfirst($state->ist_statename)."</option>";
  }
  echo '</select>';
}else{
  echo '<select name="statecode" id="statecode" class="form-control" required onchange="GetDistrict(this);GetGeo(this);">';
  echo '<option value="" selected="selected">-- Select --</option>';
  echo '</select>';
}