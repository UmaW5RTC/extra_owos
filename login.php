<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
</head>
<body>
<form method="post" name="form_login" id="form_login" action="#">
Username<input type="text" name="user" id="user"><br>
password<input type="password" name="pass" id="pass"><br/>
<input type="button" name="login" id="login" value="LOGIN" />
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
	document.getElementById('login').onclick=function()
	{
		var user=document.getElementById('user').value;
		var pass=document.getElementById('pass').value;
		var data={user:user,pass:pass,action:'login'};
		$.ajax({
		                type: "GET",
		                url: "PHP/login.php",
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