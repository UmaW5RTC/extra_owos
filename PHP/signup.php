<?php
session_start();
//ob_start();
include('../mysql/class.connection.php');
require_once('../mail/PHPMailerAutoload');
$connection=new getConnection();
$con=$connection->connect();
$action=$_REQUEST['action'];
if($action=='signup')
{
	//echo"inside the area to register";
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$phone='123456789';
	$pass=$_REQUEST['pass'];
	$captcha=$_REQUEST['captcha'];
	$sum_captcha=$_SESSION['sum_captcha'];
	$qry_insert="INSERT INTO `owos`.`signup` (`userid`, `fname`, `lname`, `email`, `phone_no`, `pass`) VALUES (NULL, '".$fname."', '".$lname."', '".$email."', '".$phone."', '".$pass."')";
	//echo $captcha."::".$sum_captcha;
	if($captcha==$sum_captcha)
	{
			$select_qry="SELECT * FROM `signup` WHERE `email`='".$email."'";
			$sel_exe=mysqli_query($con,$select_qry);
			$no_of_row=mysqli_num_rows($sel_exe);
			if($no_of_row>0)
			{
				echo"exist";
			}
			else
			{
				$insert_qry=mysqli_query($con,$qry_insert);
				if($insert_qry)
				{
					$fromEmail='umashankar.ghadai@connectix.net';
					$subject='Registration success';
					$body='Registration successful';
					email_signup($email,$fromEmail,$subject,$body);
					echo"inserted";
				}
				else{
					echo"fail_to_insert";
				}
			}
	}
	else
	{
		echo"invalid captcha";
	}


}

function email_signup($tomail,$fromEmail,$subject,$body)
{
	
			$mail = new PHPMailer;
			$mail->isSMTP();    
			$mail->SMTPDebug = 1;                                // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                           // Enable SMTP authentication
			$mail->Username = 'ughadai.kulu@gmail.com';          // SMTP username
			$mail->Password = 'Kuntala#';                   // SMTP password
			$mail->SMTPSecure = 'tls';                          	// Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                  // TCP port to connect to

			$mail->setFrom($fromEmail, 'OWOS');
			$mail->addAddress($tomail);     // Add a recipient
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    =$body;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    echo 'success';
				}
}

