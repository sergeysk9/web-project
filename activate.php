<?php
include("includes/conn.php");

$username=$_GET['username'];

$esql="Update visitors SET active=1 where username='".$username."'";

//echo $esql;

if(!mysqli_query($link, $esql))
{
$msg=" ". mysqli_error($link);
}
else
{

$msg=$username.", Your account is activated.";

header("Location: sign_in.php?msg=".$msg);
}
?>