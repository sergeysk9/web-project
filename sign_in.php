<?php
$title="sign in";
include('includes/metaheader.php');
$msg="";

if(isset($_GET['msg']))
$msg=$_GET['msg'];
?>
<script>
function valForm()
{
          var val_error=0;

          var username = document.getElementById('username');
          var password=document.getElementById('password');

            if(username.value.length==0)
            {
              username.style.border="3px solid red";
               val_error++;
             }
                else if(username.value.length >20)
                {
                username.value="20 chars allowed!";
                username.style.color="#ff9999";
                val_error++;
                }
                 else if(username.value=="20 chars allowed!")
                 {
                 username.style.border="3px solid red";
                  val_error++;
                 }

              if(password.value.length==0)
                {
                    password.style.border="3px solid red";
                    val_error++;

                }


        if(val_error > 0)
         return false;
         else
         return true;

 }

function toDefault(x)
{
x.style.color="black";
x.style.border="1px solid #aaa";
if(x.value=="20 chars allowed!")
x.value="";

}
</script>
<?php
print('</head>');
print('<body>');
print('<div class="page-wrap">');
print('<div class="head-cover">');
print('<div class="row">');
    print('<div class="column one-fifth">');
    print('</div>'); // 1/5
    print('<div class="column four-fifths">');
include('includes/top_nav.php');
    print('</div>');
print('</div>');  // row
print('</div>');  // cover
print('<section class="start-fixed js--start-fixed">');
print('<div class="page_body">');

include('includes/message.php');
print('<div class="row">');
print('<h2>Welcome!</h2>');
print('</div>')
?>

<form method="POST" action="login.php" class="contact-form">

    <div class="row">
	    <div class="column w-1-3">
	    <label for="username">User</label>
	    </div>
	    <div class="column w-2-3">
	    <input type="text" name="username" id="username" placeholder="User" required onfocus="toDefault(this);">
	    </div>
    </div>
    <div class="row">
	    <div class="column w-1-3">
		<label for="password">Passsword</label>
	    </div>
	    <div class="column w-2-3">
		<input type="password" name="password" id="password" placeholder="password" required onfocus="toDefault(this);">
	    </div>
    </div>
    <div class="row">
	    <div class="column w-1-3">
		<label>&nbsp;</label>
		</div>
		<div class="column w-2-3">
		<input type="submit" name="submit" value="Sign In" onclick="return valForm();">
	    </div>
    </div>

</form>
<div class="row">
	<p class="cnt"><a href="forgot_password.php">Forgot password?</a></p>
	<p  class="cnt">&nbsp;</p>
	<p  class="cnt"><a href="enter_member.php">Registration</a></p>
</div>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
 <div class="row">&nbsp;</div>
 <div class="row">&nbsp;</div>
</div>
</div><!--page_body-->
</section>
</div><!--page_wrap-->
<?php
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>