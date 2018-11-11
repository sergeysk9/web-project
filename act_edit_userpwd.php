<?php
include("includes/conn.php");
#Autor Serge Skudaev
#copyright by Sergey Skudaev  2016-2017

$msg="";
$nomatch=0;
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$username=$_POST['username'];
$oldpassword=$_POST['oldpassword'];

$oldpassword=trim($oldpassword);
$password1=trim($password1);
$password2=trim($password2);

		if($password1 != $password2)

		{
		$msg="Password are not the same!";
		$nomatch=1;
        header("Location: act_myprofile.php?msg=".$msg."&username=".$username);
		}
		else
		{

		$password=md5($password1);

$pass=$password;
$oldpassword=md5($oldpassword);


		$usql="UPDATE visitors SET password='".$password."' where username='".$username."' and password='".$oldpassword."'";
       // echo  	$usql;

					    if(!mysqli_query($link, $usql))
					    {
					    $msg.=" ". mysqli_error($link);
					    }
					    else
                        {
                        $msg="You changed your password!";
                        setcookie("pass", $pass, time() + (86400 * 30), "/");
                       header("Location: act_myprofile.php?msg=".$msg."&username=".$username);
					    }
		   }
?>