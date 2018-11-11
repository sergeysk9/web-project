<?php

include("includes/conn.php");
$sql="";
$loginname="";
$sqli="";
$lastname="";
$login_user="";
$username="";

if(isset($_COOKIE['user']))
$login_user=$_COOKIE['user'];

if(isset($_GET['username']))
$username=$_GET['username'];

if($username=="")
$username=$login_user;
$msg="";

if($amsg !="")
$msg=$amsg;



if(isset($_GET['msg']))
$msg.=$_GET['msg'];

if(isset($_GET['sqli']))
$sqli=$_GET['sqli'];

$sql="SELECT userid, firstname, lastname, username, password, email, role, active from visitors where username='".$username."' and active=1";

		if(!$result=mysqli_query($link,$sql))
		{
		$msg.=" ". mysqli_error($link);
		echo $msg."<br>";
		}
		else
		{
					while($row = mysqli_fetch_array($result, MYSQLI_NUM))
					{
					$userid=$row[0];
                    $firstname=$row[1];
					$lastname=$row[2];
                    $username=$row[3];
					$loginname=$row[1]. " ".$row[2];

					$active=$row[7];
					}
		}

if($lastname != "")
{
include('display_my_profile.php');
}
else
{
include('sign_in.php');
}
?>