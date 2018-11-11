<?php
include("includes/conn.php");
include('includes/metaheader.php');

$username="";
$firstname="";
$lastname="";
$email="";
$city="";
$country="";
$bio="";

?>

<style>

#strength1, #strength2 {
   height:17px;
   margin:0;
   padding:0;
   width:200px;
   font-size:67%;
   background-color:white;
   color:#f0f0f0;
   float:left;
}

#strength_box1, #strength_box2 {
   position:relative;
   height:17px;
   margin:0;
   padding:0;
   width:276px;
   margin-top:2px;
   font-size:67%;
   background-color:white;
   border:1px solid #aaa;
   visibility:hidden;
   overflow:hidden;

}

#quality, #quality2 {
    color:red;
    float:right;
    width:60px;
}

</style>
<script>
function valForm()
{
          var val_error = 0;

          var score=0;
          var width1=0;
          var score2=0;
          var width2=0;

          var username = document.getElementById('username');
          var firstname = document.getElementById('firstname');
          var lastname = document.getElementById('lastname');
          var email = document.getElementById('email');

         var password1=document.getElementById('password1');
         var password2=document.getElementById('password2');
         var agree=document.getElementById('agree');

         var strength1=document.getElementById('strength1');
         var strength2=document.getElementById('strength2');
         var strength_box1=document.getElementById('strength_box1');
         var strength_box2=document.getElementById('strength_box2');

         var quality=document.getElementById('quality');
          var quality2=document.getElementById('quality2');

           if((firstname.value.length==0)||(firstname.value.length >20)||(firstname.value=="20 chars allowed!"))
           {
               if(firstname.value.length >20)
               {
                firstname.value="20 chars allowed!";
                firstname.style.color="#ff9999";
                }
              firstname.style.border="3px solid red";
               val_error++;
           }

          if((username.value.length==0)||(username.value.length >20))
           {
               if(username.value.length >20)
               {
                username.value="20 chars allowed!";
                username.style.color="#ff9999";
                }
              username.style.border="3px solid red";
               val_error++;
           }

            if((lastname.value.length==0)||(lastname.value.length >20)||(lastname.value=="20 chars allowed!"))
           {
               if(lastname.value.length >20)
               {
                lastname.value="20 chars allowed!";
                lastname.style.color="#ff9999";
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
                    email.style.color="#ff9999";
                    email.style.border="3px solid red";
                    val_error++;
                    }
            }


     //if password1 longer than 5 give 1 point
     if (password1.value.length > 5)
     score++;

     //if password1 has both lower and uppercase characters give 1 point
     if ( ( password1.value.match(/[a-z]/) ) && ( password1.value.match(/[A-Z]/) ) )
     score++;

     //if password1 has at least one number give 1 point
     if (password1.value.match(/\d+/))
     score++;

     //if password1 has at least one special caracther give 1 point
     if ( password1.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
     score++;

     //if password1 longer than 12 give another 1 point
     if (password1.value.length > 12)
     score++;

     width1=score*30;

     strength_box1.style.visibility="visible";
     strength1.style.backgroundColor="green";
     strength1.style.width=width1 + "px";

     strength1.innerHTML="";
     if(score < 2)
     quality.innerHTML="Weak";
     else if(score==2)
     quality.innerHTML="Medium";
     else if(score > 2)
     quality.innerHTML="Strong";

     if (password1.value.length < 6)
     {
     val_error++;

    password1.style.border="3px solid red";

    strength_box1.style.visibility="visible";
    strength1.style.backgroundColor="white";
    strength1.style.width="200px";
    strength1.style.color="red";
    strength1.innerHTML="Enter minimum 6 characters";
    quality.innerHTML="";
     }
     //========password 2================
     //if password2 longer than 6 give 1 point
     if (password2.value.length > 5)
     score2++;

     //if password2 has both lower and uppercase characters give 1 point
     if ( ( password2.value.match(/[a-z]/) ) && ( password2.value.match(/[A-Z]/) ) )
     score2++;

     //if password2 has at least one number give 1 point
     if (password2.value.match(/\d+/))
     score2++;

     //if password2 has at least one special caracther give 1 point
     if ( password2.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
     score2++;

     //if password2 longer than 12 give another 1 point
     if (password2.value.length > 12)
     score2++;

     width2=score2*30;
     strength_box2.style.visibility="visible";
     strength2.style.backgroundColor="green";
     strength2.style.width=width2 + "px";

     strength2.innerHTML="";
     if(score2 < 2)
     quality2.innerHTML="Weak";
     else if(score2==2)
     quality2.innerHTML="Medium";
     else if(score2 > 2)
     quality2.innerHTML="Strong";

     if ((password2.value.length < 6)&&(password2.value.length > 0))
     {
     val_error++;
    password2.style.border="3px solid red";
    strength_box2.style.visibility="visible";
    strength2.style.backgroundColor="white";
    strength2.style.width="200px";
    strength2.style.color="red";
    strength2.innerHTML="Enter minimum 6 characters";
    quality2.innerHTML="";
     }

     if(password2.value.length == 0)
     {
       quality2.innerHTML="";
       strength_box2.style.visibility="hidden";
     }

    if((password2.value !="")&&(password1.value !="")&&(password2.value != password1.value))
    {
    password1.style.border="3px solid red";
    password2.style.border="3px solid red";

     strength_box2.style.visibility="visible";
     strength2.style.width="200px";
     strength2.style.backgroundColor="white";
     strength2.style.color="red";
     strength2.innerHTML="Passwords not equal";
     quality2.innerHTML="";
     val_error++;
    }

                //if user selected lion, coyote or bear
                var radios = document.getElementsByName("choice");
                var beast=document.getElementById("beast");
                var checked=false;
                var selected=document.getElementById("selected");
                 var generated=document.getElementById("animal");
                 var invalid_choice=document.getElementById("invalid_choice");

                for (var i = 0, len = radios.length; i < len; i++) {
                     if (radios[i].checked)
                    {
                    //if generated animal == selected animal
                    if(selected.value==generated.value)
                    checked=true;
                    }
               }


                if(checked===false)
                {
                 //if animal selected but not equal to generated animal
                if(selected.value !="")
                invalid_choice.innerHTML="Invalid Choice!";

                beast.style.border="3px solid red";
                val_error++;
                 }

         if(val_error > 0)
         return false;
         else
         return true;
}

function toDefault(x, id)
{
x.style.color="black";
x.style.border="1px solid #aaa";
if((x.value=="20 chars allowed!")||(x.value=="Please provide a valid email address!"))
x.value="";

    if(id)
    {
    elem=document.getElementById(id);
    elem.style.visibility="hidden";
    }

}

function resetAll()
{
 strength_box2.style.visibility="hidden";
 strength_box1.style.visibility="hidden";
 quality.innerHTML="";
 quality2.innerHTML="";
 password1.style.border="1px solid #aaa";
 password2.style.border="1px solid #aaa";
}
//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
 // Returns a random integer between min (included) and max (included)
// Using Math.round() will give you a non-uniform distribution!
function getRandomAn() {
var ar = ["lion", "coyote", "bear"];

var an=document.getElementById("animal");

var msg=document.getElementById("msg");

 var min = Math.ceil(0);
 var max = Math.floor(2);

var i= Math.floor(Math.random() * (max - min + 1)) + min;

an.value=ar[i];
msg.innerHTML="Please select "+ ar[i]+" to prove you are human."
}
</script>
<style>
.animal {
    margin-left:20px;
}
</style>
</head>
<body onload="getRandomAn();">
<?php

if($username=="")
$username=$newusername;
print('<div class="page-wrap">');
print('<div class="head-cover">');      // row cover
print('<div class="row">');        //row 1
  include('includes/top_nav.php');
print('</div>');      // row 1
print('</div>');

$msg="";
$in=0;

if(isset($_GET['in']))
$in=$_GET['in'];


 if($in==1)
 {

if(isset($_GET['username']))
$username=$_GET['username'];

if(isset($_GET['firstname']))
$firstname=$_GET['firstname'];

if(isset($_GET['lastname']))
$lastname=$_GET['lastname'];

if(isset($_GET['email']))
$email=$_GET['email'];

 }

if(isset($_GET['msg']))
$msg=$_GET['msg'];

include('includes/message.php');

print('<div class="row">');     // row 2
print('<h3 class="cnt">Sign Up</h3>');
print('</div>'); // row 2
print('<section class="start-fixed js--start-fixed">');
print('<form method="POST" name="myform" id="frmMain" action="act_insert_member.php" class="contact-form-full">');
print('<div class="row aform">');   //row 3
print('<div class="row">&nbsp;</div>');
print('<div class="row">');   //row 4
    print('<div class="column w-2-5">');
	print('<label class="reg" for="username">Username*: </label>');
    print('</div>');
	print('<div class="column w-3-5">');
	print('<input type="text" name="username" id="username" value="'.$username.'" onfocus="toDefault(this);" class="txt" placeholder="User name" required>');
	print('</div>');
print('</div>');       // row 4

print('<div class="row">');     //row 5
	print('<div class="column w-2-5">');
	print('<label class="reg" for="firstname">First name*:</label>');
	print('</div>');
	print('<div class="column w-3-5">');
	print('<input type="text" name="firstname" id="firstname" onfocus="toDefault(this);" class="txt" placeholder="First name" value="'.$firstname.'" required >');
	print('</div>');
print('</div>');  // row 5

print('<div class="row">');   // row 6
	print('<div class="column w-2-5">');
	print('<label class="reg" for="lastname">Last name*:</label>');
	print('</div>');
	print('<div class="column w-3-5">');
    print('<input type="text" name="lastname" id="lastname" onfocus="toDefault(this);" class="txt" placeholder="Last name" value="'.$lastname.'" required >');
	print('</div>');
print('</div>');    //row 6

print('<div class="row">');   // row 7
	print('<div class="column w-2-5">');
	print('<label class="reg" for="email">Email*:</label>');
	print('</div>');
	print('<div class="column w-3-5">');
    print('<input type="email" name="email" id="email" onfocus="toDefault(this);" class="txt" placeholder="Email" value="'.$email.'" required >');
	print('</div>');
print('</div>');    // row 7

?>
<div class="row">  <!-- row 8 -->
	<div class="column w-2-5">
	    <label class="reg" for="password1">Password*:</label>
	</div>
    <div class="column w-3-5">
        <div><input type="password" name="password1" id="password1" onfocus="toDefault(this, 'strength_box1');" class="txt" placeholder="Password" value="<?php echo $password1; ?>" required ></div>
        <div id="strength_box1"><div  id="strength1"></div><div id="quality"></div></div>
    </div>
</div> <!-- row 8 -->

<div class="row">  <!-- row 9 -->
	<div class="column w-2-5">
	    <label class="reg" for="password2">Confirm*:</label>
	</div>
	<div class="column w-3-5">   <!-- row 3/4 -->
        <div><input type="password" name="password2" id="password2" onfocus="toDefault(this, 'strength_box2');" class="txt"  placeholder="Confirm password" value="<?php echo $password2; ?>" required ></div>
        <div id="strength_box2"><div  id="strength2"></div><div id="quality2"></div></div>
    </div>   <!-- row 3/4 -->
</div>  <!-- row 9 -->

<div class="row">   <!-- row 10 -->
<div class="column w-2-5">
  <input type="checkbox" name="agree" id="agree" onfocus="toDefault(this);" style="float:right;" required >
	</div>
	<div class="column w-3-5">
    <h5>* Confirm agreement with terms of service</h5>
	</div>
</div> <!-- row 10--->

<div class="row">      <!--row 11-->
<div class="column w-2-5"></div>
<div class="column w-3-5">
<h5 id="msg"></h5>
<h4 id="invalid_choice"></h4>
</div>
</div>   <!--row 11-->

<div class="row">                       <!--row 12-->
<div class="column w-2-5"></div>

<div class="column w-3-5"> <!--1/2-->
    <div class="row">               <!--row inside half-->
        <div class="column one-quarter"></div>
        <div class="column half" onclick="toDefault(this);"  id="beast">
            <div class="column one-third tooltip"><span class="tooltiptext">Lion</span><img src="resources/img/lionccdark.jpg" style="height:45px;" class="captcha-img" alt="" /><input type="radio" name="choice" id="lion" value="lion" class="animal"/></div>
            <div class="column one-third tooltip"><img src="resources/img/coyoteccdark.jpg" style="height:45px" alt="" class="captcha-img"/><span class="tooltiptext">Coyote</span><input type="radio" name="choice" id="coyote" value="coyote" class="animal"/></div>
            <div class="column one-third tooltip"><img src="resources/img/bearccdark.jpg" style="height:45px" alt="" class="captcha-img"/><span class="tooltiptext">Bear</span><input type="radio" name="choice" value="bear" id="bear" class="animal"/></div>
        </div>
        <div class="column one-quarter"></div>
    </div> <!--row inside 3/5-->
</div> <!--3/5-->

<input type="hidden" name="animal" id="animal" /><input type="hidden" name="selected" id="selected" />
</div>  <!--row 12-->

<div class="row">   <!--row 13-->
<div class="column w-2-5">&nbsp;</div>  <!--2/5 row 13-->
<div class="column w-3-5">  <!--3/5 row 13-->
<input type="submit" id="submitbtn" name="submit" value="Save" onclick="return valForm();">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="clear" value="Reset" onclick="resetAll();" >
</div> <!--3/5 row 13-->
</div>   <!--row 13-->
</div> <!--3-->
</form>
 </section>
</div>
</div>
<br><br><br><br><br><br><br>
<?php
print('<div class="site-footer">');
/*
sources of images
Northwest Power and Conservation Council
Coyote
Photo: Tony Grover
https://creativecommons.org/licenses/by/2.0/

by Magnus Johansson Follow
brown bear at Skansen3-3  15181578762_72e12fc20e_m commerciall allowed
https://creativecommons.org/licenses/by-sa/2.0/

cougar image by Oregon State University
https://creativecommons.org/licenses/by-sa/2.0/
*/
include('includes/bottommenu.php');
?>
</div>
<script>
$('input[type="radio"]').on('change', function(){
   if($(this).is(':checked'))
      $('#selected').val($(this).val());
});

</script>
</body>
</html>