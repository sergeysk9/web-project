<?php
//echo "act_insert_author.php";
//include("includes/admin.php");
include("includes/conn.php");

$lastname="";
$firstname ="";
$username="";
$email="";
$role="";
$city="";
$country="";
$bio="";
$password1="";
$password2="";
$agree="";
$msg="";


		if(isset($_POST['agree']))
	    $agree=$_POST['agree'];

	    if(isset($_POST['password1']))
	 $password1 = trim($_POST['password1']);

	  if(isset($_POST['password2']))
	 $password2 = trim($_POST['password2']);

      if(isset($_POST['lastname']))
	  $lastname = trim($_POST['lastname']);

	   if(isset($_POST['firstname']))
	 $firstname = trim($_POST['firstname']);

	 if(isset($_POST['username']))
	  $username = trim($_POST['username']);

         if(isset($_POST['email']))
	 	  $email=trim($_POST['email']);

	    if($agree=="on")
		{
					if($password1==$password2)
					{
					$password=md5($password1);

							  $rsql="Select username from visitors where username='".$username."'";

                    $rresult = mysqli_query($link, $rsql );

                $rnum = mysqli_num_rows( $rresult );
               // echo "num=".$rnum;
							  if(($rnum==0)||($rnum==""))
							  {
							// echo "rnum=".$rnum."<br>";
							  include('insert_member_indb.php');
							  }
							  else
							  {
			      $msg="The user is taken, please try again! ";
			   header("Location: enter_member.php?in=1&lastname=".$lastname."&firstname=".$firstname."&email=".$email."&msg=".$msg);

							  }
					}
					else
					{
					$msg="Passwords are not equal!";
				   header("Location: enter_member.php?in=1&username=".$username."&lastname=".$lastname."&firstname=".$firstname."&email=".$email."&msg=".$msg);
					}
		}
        else
        {
        $msg="Please confirm that you agree with terms of service!";
		header("Location: enter_member.php?in=1&username=".$username."&lastname=".$lastname."&firstname=".$firstname."&email=".$email."&msg=".$msg);
	     }
?>
