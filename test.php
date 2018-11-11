<?php

include("includes/conn.php");

$username='jsmith';
$password1='password';

$password=md5($password1);

//echo $password."<br>";

$sql = "SELECT firstname, lastname, username, password, role FROM visitors WHERE username = '".$username."' AND password = '".$password."' AND active=1";


  $user_name="user";

        if($result = mysqli_query($link, $sql ))
        {
        $auth = true;
        $row=mysqli_fetch_array($result, MYSQLI_NUM);

             $firstname=$row[0];
             $lastname=$row[1];
             $user_value=$row[2];
             $role_value=$row[3];

        setcookie( $user_name, $user_value, time() + (86400 * 30), "/");
	   	setcookie( $role_name, $user_value, time() + (86400 * 30), "/");

           // echo  $role_value."<br>";
           // echo  $user_value."<br>";
          //  echo  $firstname."<br>";
          echo  $lastname."<br>";
         echo  $_COOKIE[$user_name];
         echo $sql."<br>"; 
     }
?>