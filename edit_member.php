<?php
include("includes/conn.php");

$imgpath="";
$login_user="";
$username="";
$title="Edit Member";
$member="";
$email="";

 if(isset($_COOKIE['user']))
$login_user=$_COOKIE['user'];

if(isset($_GET['username']))
$username=$_GET['username'];

if($username=="")
$username=$login_user;

$sql="SELECT firstname, lastname, username, email FROM visitors WHERE username='".$username."'";
//echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>sql=".$sql;
$count=0;

		if(!$result=mysqli_query($link, $sql))
		{
	   	$msg.=" ". mysqli_error($link);
		}
		else
		{

					while($row = mysqli_fetch_array($result, MYSQLI_NUM))
					{

					$lastname=$row[1];
					$firstname=$row[0];
					$member=$row[0]. " ".$row[1];
					$username=$row[2];
					$email=$row[3];
					}
		}


    $title=	$firstname." ".$lastname." Profile";

include('includes/metaheader.php');
?>
<script>
function valForm()
{
          var val_error = 0;
          var bull=false;

          var firstname=document.getElementById('firstname');
          var lastname=document.getElementById('lastname');
          var email=document.getElementById('email');

             if((firstname.value.length==0)||(firstname.value.length >20)||(firstname.value=="20 chars allowed!"))
           {
               if(firstname.value.length >20)
               {
                firstname.value="20 chars allowed!";
                firstname.style.color=" #ff9999";
                }
              firstname.style.border="3px solid red";
               val_error++;
           }

            if((lastname.value.length==0)||(lastname.value.length >20)||(lastname.value=="20 chars allowed!"))
           {
               if(lastname.value.length >20)
               {
                lastname.value="20 chars allowed!";
                lastname.style.color=" #ff9999";
                }
              lastname.style.border="3px solid red";
               val_error++;
           }



             if(email.value.length==0)
             {
              email.style.border="3px solid red";
               val_error++;
             }
             else
             {
             /* https://www.webcodegeeks.com/javascript/javascript-form-validation-example/ */
               var filter =/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
               var match=filter.test(email.value);

                    if(!match)
                    {
                    email.value="Please provide a valid email address!";
                    email.style.color=" #ff9999";
                    email.style.border="3px solid red";
                    val_error++;
                    }
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
if((x.value=="20 chars allowed!")||(x.value=="1000 chars allowed!")||(x.value=="Please provide a valid email address!"))
x.value="";

}
</script>

<?php
print('</head>');
print('<body>');
print('<div class="page-wrap">');
print('<div class="head-cover">');      // row cover
print('<div class="row">');        //row 1
  include('includes/top_nav.php');
print('</div>');      // row 1
print('</div>');      //cover
print('<div class="row">');

print('</div>');

print('<section class="start-fixed js--start-fixed">');

print('<div class="row">');
print('<h3 class="cnt">Modify Profile</h3>');
print('</div>');
if(isset($_GET['msg']))
$msg=$_GET['msg'];
include('includes/message.php');
print('<div class="row">');
print('<form method="POST" action="act_edit_member.php" class="contact-form-full">');
print('<div class="row">');
	print('<div class="column one-quarter">');
	print('<label class="reg"  for="username">Username*:</label>');
	print('</div>');
	print('<div class="col column three-quarters">');
	print('<input type="text" name="username" id="username" value="'.$username.'"  readonly>');
	print('</div>');
print('</div>');
print('<div class="row">');
	print('<div class="column one-quarter">');
	print('<label class="reg"  for="firstname">First Name*:</label>');
	print('</div>');
	print('<div class="col column three-quarters">');
	print('<input type="text" name="firstname" id="firstname" placeholder="First Name" value="'.$firstname.'" onfocus="toDefault(this);" required>');
	print('</div>');
print('</div>');
print('<div class="row">');
	print('<div class="column one-quarter">');
	print('<label class="reg"  for="lastname">Last name*:</label>');
	print('</div>');
	print('<div class="col column three-quarters">');
	print('<input type="text" name="lastname" id="lastname" placeholder="Last name" value="'.$lastname.'" onfocus="toDefault(this);" required>');
	print('</div>');
print('</div>');
print('<div class="row">');
	print('<div class="column one-quarter">');
		print('<label class="reg"  for="email">Email*:</label>');
		print('</div>');
		print('<div class="col column three-quarters">');
		print('<input type="email" name="email" id="email" value="'.$email.'" placeholder="Email" onfocus="toDefault(this);" required>');
	print('</div>');
print('</div>');
print('<div class="row">');
	print('<div class="column one-quarter">');
		print('<label class="reg" >&nbsp;</label>');
		print('</div>');
		print('<div class="col column three-quarters">');
		print('<input type="submit" name="submit" value="Save" onclick="return valForm();">');
	print('</div>');
print('</div>');
print('</div>');
print('</form>');
print('<br><br></div>');
print('</div>');

include('includes/authormenu.php');
print('</div>');
print('</div>');
print('</section>');
print('</div>');  //wrap
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>