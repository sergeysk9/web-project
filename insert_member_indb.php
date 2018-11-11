<?
//include("includes/conn.php");

$role="user";
$useridf=0;
$userid_count=0;

$sql="select count(userid) from visitors where lastname='".$lastname."' and firstname='".$firstname."' and email='".$email."'";

		if(!$uresult=mysqli_query($link,$sql))
		{
		 $msg.=" ". mysqli_error($link);
		}
		else
		{

		$urow = mysqli_fetch_array($uresult, MYSQLI_NUM);
		$userid_count=$urow[0];

     	}

        if($userid_count==0)
        {
$ipsql="insert into visitors(userid,firstname,lastname, username,password,email,role, active)
values (0,'".$firstname."','".$lastname."','".$username."','".$password."','".$email."','".$role."',0)";

					if(!mysqli_query($link,$ipsql))
					{
				      $msg.=" ". mysqli_error($link);
					}
					else
					{

					include('sendmail.php');
		            }  //if user record inserted end

         }
         else
         {
         $msg="Account exists with ".$email." email!";
         header("Location: forgot_password.php?email=".$email."&msg=".$msg);
         }



?>
