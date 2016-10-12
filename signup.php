<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>sign Up</title>
</head>
<body>
<form method="post" name="from" action="#">
Firstname<input type="text" name="fname" id="fname" /><br />
Lastname<input type="text" name="lname" id="lname" /><br />
email<input type="text" name="email" id="email" /><br />
password<input type="password" name="pass" id="pass" /><br>
<?php
$no1=rand(1,10);
$no2=rand(1,10);
$sum=$no1+$no2;
session_start();
$_SESSION['sum_captcha']=$sum;
?>
captcha <?php echo $no1;?>+<?php echo $no2;?>=<input type="text" name="captcha" id="captcha"/><br/>
<input type="button" name="button" value="Sign Up" id="signup"/>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
	document.getElementById('signup').onclick=function()
	{
		var fname=document.getElementById('fname').value;
		var lname=document.getElementById('lname').value;
		var email=document.getElementById('email').value;
		var pass=document.getElementById('pass').value;
		var captcha=document.getElementById('captcha').value;
		var data={fname:fname,lname:lname,email:email,pass:pass,captcha:captcha,action:'signup'};
		$.ajax({
		                type: "GET",
		                url: "PHP/signup.php",
		                data: data,
		                 dataType: "html",
		                success: function(response)
		                {
		               		console.log(response);
		                  
		                }
		              });
	}
</script>
</body>
</html>