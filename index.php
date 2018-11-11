<?php
$title="Responsive Website";
include('includes/metaheader.php');

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
<section class="start-fixed js--start-fixed">

<h1 style="text-align:center;">A DEMO WEBSITE</h1>
<p>The source code for this demo web site that includes HTML, CSS, JavaScript, PHP
can be downloaded from my ebook: </p>

<p><a href="http://www.amazon.com/dp/B008C4JK98">PHP Programming for Beginners</a></p>

<p>You can edit style.css to change colors.</p>
<p>The PHP code includes a user registration and authorization and visitors comments.</p>
<p>Modification is required for conn.php file, because a connection to a database code may be different
on different hosts.</p>
<p>For this site, I use MySQLi extention to connect to MySQL database. </p>
<p>My host is Fatcow.com and my connection file is like that:</p>

<p class="code">&lt;?php</p>
<p class="code">$link = mysqli_connect('configureallcom.fatcowmysql.com', 'user', 'password','database');</p>

<p class="code">if (mysqli_connect_errno())<br>
{ <br>
$msg="Failed to connect to MySQL: " . mysqli_connect_error(); <br>
} <br>
$domain_email="webmaster@yourdomain.com";<br>
?&gt;</p>

<p>In most other cases you may use mysql_connect for connection file is like that:</p>

<p  class="code">&lt;?php<br>
$host="localhost";<br>
$user="youruser";<br>
$password="yourpassword";<br>
$database="yourdatabase";<br>

mysql_connect( $host, $user, $password)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or die ( 'Unable to connect to server.' );<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mysql_select_db($database )<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or die ( 'Unable to select database.' );<br>
$domain_email="webmaster@yourdomain.com";<br>
?&gt;</p>

<p>The domain email required to send an activation link to a user email.</p>

<p>1. You have to create a <a href="http://www.configure-all.com/cpanel_mysql_setup.php" target="_blank">database and users</a>
in your hosting control panel.<br>
<p>2 You have to set an <a href="http://www.configure-all.com/cpanel_mysql_setup.php" target="_blank">email account.</a><br>
<p>3. You have to create a usernames table, a pages table and a comments table. (Instruction is in the demosite.zip file)<br>
<p>4. You have to insert records in the usernames table and pages table. (Included in zip file)</p>
<p>You can run my demo website on your local PC, but system will not be able to send activation message to a user email.
and user account will not be active. You may insert 1 in the user active field manually to make the user active.</p>
<p>To explore this demo website, you may register with your real email and see how the registration and authentication sistem is working.</p>
<p>Don't worry, I will not use your email in any way or give it to other party.</p>
<p>Try to change password, try the forget password feature. A new password will be sent to your email.</p>
<p>Some email providers block email sent by computer. Make sure to check spam box for activation email.
If it does not help, add the email address <b>tutor@hardstuffez.com</b> to your contact list.</p>

<p>For demo, I created two users: a regular user James Williams (username jwill) and an admin user John Smith
(username jsmith). Initially, I created passwords &acute;password&acute; for both of them.
if someone changes the password for these two user, you can change it back by clicking the Reset Password link on the bottom menu.</p>
<p>The admin user has permission to approve and delete regular users comments. A regular user may delete only her own comments.</p>

<p>Good luck!</p>


</section>

</div>
</div>
<?php
//echo "user=" . $_COOKIE['user']."<br>";
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>