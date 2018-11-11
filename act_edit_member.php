<?php
include("includes/conn.php");

         $lastname="";
         $firstname ="";
         $username="";
         $email="";
         $msg="";

      if(isset($_POST['lastname']))
	  $lastname = $_POST['lastname'];

	   if(isset($_POST['firstname']))
	 $firstname = $_POST['firstname'];

	 if(isset($_POST['username']))
	  $username = $_POST['username'];

         if(isset($_POST['email']))
	 	  $email= $_POST['email'];


$lastname=trim($lastname);
$firstname=trim($firstname);
$email=trim($email);


$usql="update visitors SET lastname='".$lastname."', firstname='".$firstname."', email='".$email."' where username='".$username."'";

						    	if(!mysqli_query($link, $usql))
								{
						     	$msg=mysqli_error($link);
                               header("Location: act_myprofile.php?msg=".$msg);
								}
								else
								{
								$msg="The user data is updated.";
								header("Location: act_myprofile.php?msg=".$msg);
								}
?>
