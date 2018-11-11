<?php
include('includes/metaheader.php');

print('</head>');
print('<body>');
print('<div class="page-wrap">');
print('<div class="head-cover">');

print('<div class="row">');
include('includes/top_nav.php');
print('</div>');

print('</div>'); //head-cover
print('<div class="page_body">');
print('<div class="row">');
print('</div>');
$msg="";
if(isset($_GET['msg']))
$msg=$_GET['msg'];

$email="";
if(isset($_GET['email']))
$email=$_GET['email'];

include('includes/message.php');
?>
<br>
<div class="row">
<form method="POST" action="sendpassword.php" class="contact-form">
    <div class="row">
	    <div class="column one-quarter">
	    <label for="title">User</label>
	    </div>
	    <div class="column three-quarters">
	    <input type="text" name="username" id="title" placeholder="User" required>
	    </div>
    </div>
    <div class="row">
	    <div class="column one-quarter">
		    <label for="email">Email</label>
	    </div>
	    <div class="column three-quarters">
    <?php
    if($email !="")
	print('<input type="email" name="email" id="email" placeholder="Email" value="'.$email.'" required>');
    else
    print('<input type="email" name="email" id="email" placeholder="Email" required>');
    ?>
	    </div>
    </div>
    <div class="row">
        <div class="column one-quarter">&nbsp;</div>
        <div class="column three-quarters">
        <input type="submit" name="submit" value="Send Password">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="clear" value="Reset">
        </div>
    </div>

</form>
</div> <!--before form-->
</div><!---page body--->
</div><!---wrap page body--->
<div class="site-footer">
<?
include('includes/bottommenu.php');

?>
</div>
</body>
</html>