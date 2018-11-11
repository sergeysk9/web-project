<?php
#Authort by Serge Skudaev 10/26/16
$userdb="";
include("includes/conn.php");

$username="";
$password1="";

if(isset($_POST['username']))
$username=$_POST['username'];
if(isset($_POST['password']))
$password1=$_POST['password'];

 	  //setcookie("user","", time() + (86400 * 30), "/");
 	  //	setcookie("role","", time() + (86400 * 30), "/");
       		setcookie("user","");
 	     	setcookie("role","");

//5f4dcc3b5aa765d61d8327deb882cf99  = password
//197d44b83d398dbc2e711b4951d89f5c = Password9@

$password=md5($password1);

$auth = false; // Assume user is not authenticated

if (isset( $username ) && isset($password))
{

    $sql = "SELECT username, password, role FROM visitors WHERE username = '".$username."' AND password = '".$password."' AND active=1";

        if($result = mysqli_query($link, $sql ))
        {

		$row=mysqli_fetch_array($result, MYSQLI_NUM);

		    	$userdb=$row[0];
		    	$passodb=$row[1];
		    	$roledb=$row[2];

	        	setcookie("user","");
	         	setcookie("role","");
	         	setcookie("user",$userdb);
	         	setcookie("role",$roledb);

            $msg="Welcome!";
	        header("Location:act_myprofile.php?msg=".$msg."&username=".$username);
        }
        else
        $msg.=" No result ";

    if ($userdb=="")
    {
	    $asql ="SELECT active, email FROM visitors WHERE username = '".$username."' AND password = '".$password."'";

	       $aresult = mysqli_query($link, $asql);

	            if($arow=mysqli_fetch_array($aresult, MYSQLI_NUM ))
                {
			    $active=$arow[0];
			    $email=$arow[1];
                }

	       if(($active !=1)&&($email !=""))
	    	{
	    	$crnl="\r\n";
	    	$subject = 'User Activation';
	        $headers  = 'MIME-Version: 1.0' . $crnl;
			$headers .= 'Content-type: text/html; charset=iso-8859-1'. $crnl;
			$headers .='From: '.$site_email.$crnl;
            $parameter='-f'.$site_email;

	        $msg.="Click this link to activate your account<br>http://".$domain."/activate.php?username=".$username;
	        $msg= wordwrap($message, 70);

	        mail($email, $subject, $message, $headers, $parameter);
	        $msg.=" Your account is not active. Please check your email and activate your account.";

	       header("Location:sign_in.php?msg=".$msg);
	        }
	        else
	        {
             $msg.=" You login or password not correct!";

		     header("Location:sign_in.php?msg=".$msg);
		    }
	    } // if not auth

} else {
         $msg.="Please enter login and password!";
        header("Location:sign_in.php?msg=".$msg);
}
?>