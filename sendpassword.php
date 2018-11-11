<?php

include("includes/conn.php");
$password="";


$username=$_POST['username'];
$email=$_POST['email'];
  $msg="";
$sql="select username, email, password from visitors where username='".$username."' and email='".$email."'";
//echo $sql;
       if(!$result=mysqli_query($link,$sql))
		{
		$msg.=" ". mysqli_error($link);
		}
		else
		{
		   if(mysqli_num_rows($result))
		   {
		     $row = mysqli_fetch_array($result, MYSQLI_NUM);
			 $username=$row[0];
			 $email=$row[1];
			 $password=$row[2];
			}

		}


if($password !="")
{
// To send HTML mail, the Content-type header must be set
$subject="Temporary Password to ".$domain;

$passw=substr($password,0,6);

	        $crnl="\r\n";

	        $headers  = 'MIME-Version: 1.0' . $crnl;
			$headers .= 'Content-type: text/html; charset=iso-8859-1'. $crnl;
			$headers .='From: '.$site_email.$crnl;
            $parameter='-f'.$site_email;

$message="Hi!<br>";

$message.='Your user:'.$username.', and password:'.$passw.' to '.$domain;

mail($email, $subject, $message, $headers, $parameter);

$pass=md5($passw);

$usql="update visitors set password='".$pass."' where username='".$username."'";

					if(!mysqli_query($link,$usql))
					{
				   $msg.=" ". mysqli_error($link);
					}
    $msg.="Your passwor is updated! Please check your email for a new password!";
header("Location: sign_in.php?msg=".$msg);

}
else
{
$msg="Your password is not updated!";
header("Location: sign_in.php?msg=".$msg);
}
?>