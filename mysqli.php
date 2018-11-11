<?php
$title="Using PDO with MySQL";
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
print('<section class="start-fixed js--start-fixed">');

$msg="";

if(isset($_GET['msg']))
$msg=$_GET['msg'];

include('includes/message.php');

?>
<!--page start-->



<h1>Connection to MySQL with MySQLi</h1>

 <p class="calibre1">Open command prompt and go to mysql/bin derictory</p>

 <p class="calibre1">mariadb1</p>

  <p class="calibre1">Type "show databases;" command to view which databases you have.</p>

  <p class="calibre1">mariadb2</p>

  <p class="calibre1">In my connection code example, I will use connection to usernames table located in myearcth database.</p>

  <p class="calibre1">Type "use myearth;" to switch to myearth database.</p>

  <p class="calibre1">To see, which tables exist in the myearth database, type command "SHOW TABLES FROM MYEARTH;"</p>

   <p class="calibre1">mariadb3</p>

   <p class="calibre1">I have the usernames table. You can create it by "copy and paste" the following create table statement.</p>
 <pre><p class="code">

 CREATE TABLE `usernames` (
    `userid` int(11) NOT NULL AUTO_INCREMENT,
    `lastname` varchar(20) DEFAULT NULL,
    `firstname` varchar(20) DEFAULT NULL,
    `username` varchar(20) DEFAULT NULL,
    `password` varchar(50) DEFAULT NULL,
    `email` varchar(30) DEFAULT NULL,
    `role` varchar(10) DEFAULT NULL,
    `city` varchar(20) DEFAULT NULL,
    `country` varchar(20) DEFAULT NULL,
    `bio` text,
    `website` varchar(100) DEFAULT NULL,
    `active` tinyint(4) DEFAULT NULL,
    PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
</p></pre>

<p class="calibre1">After the table is created, you may use a command "show columns from usernames;" to see all its columns</p>

<p class="calibre1">Create the connect.php file with the following code:</p>

<p class="code">&lt;?php</p>

<p class="code">$link=mysqli_connect("localhost","root","sergey_s", "myearth");</p>

<p class="code">if (mysqli_connect_errno())<br />
{<br />
 $msg="Failed to connect to MySQL: " . mysqli_connect_error(); <br />
}
</p>
<p class="calibre1">Later, you may include it in any php file that access data in the database.</p>

<p class="calibre1">To insert records in the usernames table, use the following code.</p>

<p class="calibre1">insert_record.php</p>

<pre><p class="code">&lt;?php

include('connect.php');

$lastname="Silver";
$firstname="John";
$username="johnsl";
$password="5f4dcc3b5aa765d61d8327deb882cf99"; // md5 encrypted word "password"
$email="johnsl@gmail.com";
$role="user";
$city="Treasure Island";
$country="None";
$bio="I am a pirat!";

$ipsql="insert into usernames(
userid,
lastname,
firstname,
username,
password,
email,
role,
city,
country,
bio,
active)
values
(0,'".$lastname."','".$firstname."','".$username."','".$password."','".$email."','".$role."','".$city."','".$country."','<pre>".$bio."</pre>', 1)";

    if(!mysqli_query($link,$ipsql))
	{
	$msg=mysqli_error($link);
	}
	else
	{
	$msg="record inserted successfully!";
        }
    echo $msg;

?&gt;
</p></pre>


<p class="calibre1">Run insert_record.php file and check in the command prompt that the record is inserted.</p>
<p class="calibre1">select your database and type: "select * from usernames".
The record is displayed. If it is not inserted, then, probably, you made a typo.</p>

<p class="calibre1">Create a display_record.php file to dislay the inserted record.</p>

<pre><p class="code">
&lt;?php

include('connect.php');

$sql="select lastname,firstname,username,email,role from usernames where email='".$email."'";

    if(!$uresult=mysqli_query($link,$sql))
	{
	 $msg=mysqli_error($link);
	 }
	 else
	 {

	 $urow = mysqli_fetch_array($uresult, MYSQLI_NUM);

	 $lastname=$urow[0];
	 $firstname=$urow[1];
	 $username=$urow[2];
	 $email=$urow[3];
	 $role=$urow[4];

     echo $lastname." | " . $firstname . " | " . $username . " | " . $role . "&lt;br&gt;";

     }
?&gt;
</p></pre>
<p class="calibre1">For updating the record, create the "update_record.php" file.</p>

<p class="calibre1">update_record.php</p>
<pre><p class="code">
 &lt;?php

include('connect.php');

$role="admin";
$username="sniderj";

$sql="UPDATE usernames SET role='".$role."' where username='".$username."'";

//echo "sql=".$sql."&lt;br&gt;";

    if(!mysqli_query($link, $sql))
    {
   	$msg=mysqli_error($link);
    	}
    	else
           {
   	$msg="Record is updated successfully!";
    }
    echo $msg;
?&gt;
</p></pre>
<p class="calibre1">For delete the record, create the "delete_record.php" file.</p>

<p class="calibre1">delete_record.php</p>
<pre><p class="code">
 &lt;?php

include('connect.php');

$userid=2;

$sql="delete from usernames where userid=".$userid;
//echo "sql=".$sql."&lt;br&gt;";

        if(!mysqli_query($link, $sql))
        {
        $msg=mysqli_error($link);
	}
	else
       {
	$msg="Record is deleted successfully!";
	}
	echo $msg;
?&Gt;
</p></pre>
<p class="calibre1">You can create a function to insert, update or delete a record.
This function will take a query as an argument that we pass by value and message argument that is passed by reference.
The function return 1 in case of success and 0 in case of failure.</p>
<pre><p class="code">
function execute($sql, &$msg)
{

        if(!mysqli_query($link, $sql))
     {
	 $msg=mysqli_error($link);
     return 0;
	 }
	 else
          {
    $msg="Record is deleted successfully!";
    return 1;
	}

}
</p></pre>
<p class="calibre1">You may display not only data, but also the table column names and other metadata.</p>
<pre><p class="code">
&lt;?php

include('connect.php');

$email="myemail@gmail.com";

$sql="select lastname,firstname,username,email,role from usernames where email='".$email."'";

if(!$result=mysqli_query($link,$sql))
{
$msg=mysqli_error($link);
}
else
{

    while ($fieldinfo=mysqli_fetch_field($result))
   {
   print("Database: ". $fieldinfo->db . " | " );
   print("Table: ". $fieldinfo->table . " | " );
   print("Name: ". $fieldinfo->name . " | " );
   print("charset #: ". $fieldinfo->charsetnr. " | ");
   print("Length: ". $fieldinfo->length. " | ");
   print("Max_Length: ". $fieldinfo->max_length. " | ");
   print("Type: ". $fieldinfo->type . " | ");
   echo "&lt;br&gt;";
   }

}

mysqli_free_result($result);
?&gt;
</p></pre>
<p class="head1">OUTPUT:</p>
<p class="calibre1">Database: myearth | Table: usernames | Name: lastname | charset #: 8 | Length: 20 | Max_Length: 6 | Type: 253 |</p>
<p class="calibre1">Database: myearth | Table: usernames | Name: firstname | charset #: 8 | Length: 20 | Max_Length: 4 | Type: 253 |</p>
<p class="calibre1">Database: myearth | Table: usernames | Name: username | charset #: 8 | Length: 20 | Max_Length: 7 | Type: 253 |</p>
<p class="calibre1">Database: myearth | Table: usernames | Name: email | charset #: 8 | Length: 30 | Max_Length: 17 | Type: 253 |</p>
<p class="calibre1">Database: myearth | Table: usernames | Name: role | charset #: 8 | Length: 10 | Max_Length: 5 | Type: 253 |</p>
</section>

</div>
</div>
<?php
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5998269-8");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>











