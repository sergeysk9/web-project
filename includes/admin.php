<?php

if((!isset($_COOKIE[role]))||( $_COOKIE[role] !="admin"))
{
    $msg="You do not have such permission!";
header("Location: index.php?msg=".$msg);
}
?>