<?php
include('../mysql/class.connection.php');
$connection=new getConnection();
$con=$connection->connect();
$action=$_REQUEST['action'];
if($action=='login')
{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	$qry_select="SELECT * FROM `signup` WHERE `email`='".$user."' AND `pass`='".$pass."'";
	$select_exe=mysqli_query($con,$qry_select);
	$no_of_rows=mysqli_num_rows($select_exe);
	if($no_of_rows>0)
	{
		session_start();
		$_SESSION['login_user']=$user;
		echo"success";
	}
	else
	{
		echo"login_fail";
	}
}