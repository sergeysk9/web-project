<?php
require_once('includes/errors.php');
$link = mysqli_connect('localhost', 'michael', 'Password7@','test');

if (mysqli_connect_errno())
{
$msg="Failed to connect to MySQL: " . mysqli_connect_error();
}

$site_email="tutor@hardstuffez.com";
$domain="sergeyskudaev.com";

echo $msg;
?>
