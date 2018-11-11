<?php
include("includes/conn.php");
$username="";
$usernamec="";
$msg="";
$imgpath="";

if(isset($_COOKIE['user']))
$login_user=$_COOKIE['user'];

if(isset($_GET['username']))
$username=$_GET['username'];

if(isset($_GET['msg']))
$msg=$_GET['msg'];

$role=$_COOKIE['role'];

if($username=="")
$username=$login_user;

include('includes/metaheader.php');
?>
<script>
function valForm()
{
          var val_error = 0;
          var bull=false;

          var oldpassword = document.getElementById('oldpassword');
          var password1 = document.getElementById('password1');
          var password2 = document.getElementById('password2');


          if((oldpassword.value.length==0)||(oldpassword.value.length >20)||(oldpassword.value=="20 chars allowed!"))
          {
                     if(oldpassword.value.length >20)
                    {
                    oldpassword.value="20 chars allowed!";
                    oldpassword.style.color=" #ff9999";
                    }
                    oldpassword.style.border="3px solid red";
                    val_error++;
             }

          if((password1.value.length==0)||(password1.value.length >20)||(password1.value=="20 chars allowed!"))
                {
                     if(password1.value.length >20)
                    {
                    password1.value="20 chars allowed!";
                    password1.style.color=" #ff9999";
                    }
                    password1.style.border="3px solid red";
                    val_error++;
             }

              if((password2.value.length==0)||(password2.value.length >20)||(password2.value=="20 chars allowed!"))
                {
                     if(password2.value.length >20)
                    {
                    password2.value="20 chars allowed!";
                    password2.style.color=" #ff9999";
                    }
                    password2.style.border="3px solid red";
                    val_error++;
             }

         if(val_error > 0)
         bull=false;
         else
         bull=true;

         return bull;
}

function toDefault(x)
{
x.style.color="black";
x.style.border="1px solid #aaa";
if(x.value=="20 chars allowed!");
x.value="";

}
</script>

<?php
print('</head>');
print('<body>');
print('<div class="page-wrap">');
print('<div class="head-cover">');
print('<div class="row">');
include('includes/top_nav.php');
print('</div>');  // row
print('</div>');  // cover

print('<div class="page_body">');
$msg="";

if(isset($_GET['msg']))
$msg=$_GET['msg'];

include('includes/message.php');

?>
<!--page start-->


<form method="POST" action="act_edit_userpwd.php" class="contact-form">
<div class="row">

<div class="row">
	<div class="column one-third">
	    <label for="username">User</label>
	</div>
	<div class="column two-thirds">
	    <input type="hidden" name="imgpath" value="<?php echo $imgpath; ?>">
	    <input type="text" name="username" id="username" readonly value="<?php echo $username; ?>">
	</div>
</div>
<div class="row">
	<div class="column one-third">
		<label for="oldpassword">Old password</label>
		</div>
	<div class="column two-thirds">
		<input type="password" name="oldpassword" id="oldpassword" placeholder="Old password" required>
	</div>
</div>
<div class="row">
	<div class="column one-third">
		<label for="password1">New Password</label>
		</div>
	<div class="column two-thirds">
		<input type="password" name="password1" id="password1" placeholder="New Password" required>
	</div>
</div>
<div class="row">
	<div class="column one-third">
		<label for="password2">Confirm password</label>
		</div>
	<div class="column two-thirds">
		<input type="password" name="password2" id="password2" placeholder="Confirm password" required>
	</div>
</div>
<div class="row">
    <div class="column one-third">&nbsp;</div>
    <div class="column two-thirds">
        <input type="submit" name="submit" value="Save" onclick="return valForm();">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="clear" value="Reset">
    </div>
</div>
</div>
</form><br><br>
<?php
print('</div>');
print('</div>');

print('</div>');
print('</div>');
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>