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
$msg="";

if(isset($_GET['msg']))
$msg=$_GET['msg'];

include('includes/message.php');

?>
<!--page start-->
<section class="start-fixed js--start-fixed">
<h1>Using PDO with MySQL</h1>
<p class="calibre1">PDO is a Database Access Abstraction Layer, an application programming interface which unifies the communication between a computer application and different databases. In this chapter we will disscus how to use PDO with MySQL.</p>
<p class="calibre1">According to PHP.NET, PDO class is supported in PHP since version 5.1.0</p>
<p class="calibre1">To connect to MySQL, use the following code.<br />
pdo_conn.php</p>
<pre><p class="code">
&lt;?php
$host = 'localhost';
$db='yourdb';
$charset = 'utf8';
$userdb = 'youruser';      // or root if you do not create user
$passdb = 'yourpassword';   //or blank if you did not set password


$pdo=null;
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false,

);

try {

$pdo = new PDO($dsn, $userdb, $passdb, $options);

} catch(PDOException $e) {
echo "Could not connect to database!";
}
?&gt;
</p></pre>

 <p class="calibre1">Create the usernames table. You can create it by "copy and paste" the following create table statement.</p>
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

<p class="calibre1">Let&acute;s insert a recod in our usernames table. In this code we will use bindParam method.<br />
pdo_insert_user.php</p>
<pre><p class="code">
&lt;?php
// insert using bindParam method
include('pdo_conn.php');

$isql="insert into usernames(lastname, firstname, username, password, email, role, city, country, bio, website, active)
values (:lastname, :firstname, :username, :password, :email, :role, :city, :country, :bio, :website, :active)";

$lastname="Smith";
$firstname="John";
$username="johnsm";
$password="secret";
$email="johnsm@yahoo.com";
$role="user";
$city="Clearwater";
$country="USA";
$bio="I am a great guy!";
$website="http://myearth.today";
$active=1;

 try {

$stmt = $pdo->prepare($isql);

$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
$stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':role', $role, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':country', $country, PDO::PARAM_STR);
$stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
$stmt->bindParam(':website', $website, PDO::PARAM_STR);
$stmt->bindParam(':active', $active, PDO::PARAM_INT);

$stmt->execute();

$insertId = $pdo->lastInsertId();

echo "LastID=".$insertId;

echo "New records inserted successfully";
    }
        catch(PDOException $e)
    {

   echo "Error: " . $e->getMessage();
    }
?&gt;
<p class="calibre1">OUTPUT:<br />
LastID=1  New records created successfully</p>
<p class="calibre1">The is a second way to insert record with PDO. In this method we are using placeholder.<br />
pdo_insert_user2.php</p>
<pre><p class="code">
&lt;?php
//insert using placeholder
include('pdo_conn.php');

$isql="insert into usernames(lastname, firstname, username, password,email, role, city, country, bio, website, active)
values (?,?,?,?,?,?,?,?,?,?,?)";

$lastname="Barry";
$firstname="John";
$username="johnb";
$password="secret";
$email="johnb@yahoo.com";
$role="user";
$city="Brooklyn";
$country="USA";
$bio="I am a great guy!";
$website="http://configure-all.com";
$active=1;

 try {

$stmt = $pdo->prepare($isql);

//argument for execute method must be array[]
$stmt->execute([$lastname, $firstname, $username, $password, $email, $role, $city, $country, $bio, $website, $active]);

$insertId = $pdo->lastInsertId();

echo "LastID=".$insertId;

echo "New records inserted successfully";
    }
        catch(PDOException $e)
    {

   echo "Error: " . $e->getMessage();
    }
?&gt;
</pre></p>
<p class="calibre1">OUTPUT:<br />
LastID=2  New records inserted successfully</p>

<p class="calibre1">Updating record, using bindParameter method.<br />
pdo_update_user.php</p>
<pre><p class="code">
&lt;?php
//update using bindParam method
include('pdo_conn.php');

$isql="update usernames set role=:role where username=:username";

$username='johnsm';

$role="ADMIN";

 try {

$stmt = $pdo->prepare($isql);

$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':role', $role, PDO::PARAM_STR);

$stmt->execute();

echo $username."&acute;s records updated successfully!";
    }
        catch(PDOException $e)
    {

   echo "Error: " . $e->getMessage();
    }
?&gt;
</p></pre>
<p class="calibre1">OUTPUT:<br />
johnsm&acute;s records updated successfully!</p>
<p class="calibre1">Updating record using placeholder.<br />
pdo_update_user2.php</p>
<pre><p class="code">
&lt;?php

//update using placeholder
include('pdo_conn.php');

$usql="update usernames set role=? where username=?";

$username='johns';

$role="OWNER";

 try {

$stmt=$pdo->prepare($usql);
$stmt->execute([$role, $username]);

echo $username."&acute;s records updated successfully!";
    }
        catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
?&gt;
</p></pre>
 <p class="calibre1">OUTPUT:<br />
johnsm&acute;s records updated successfully!</p>

<p class="calibre1">Selecting users<br />
pdo_select_user.php</p>
<pre><p class="code">
&lt;?php

include('pdo_conn.php');

$sql="select userid, firstname, lastname, username, role from usernames";


if(!$stmt=$pdo->query($sql))
{
echo mysql_errno() . ": ";
echo mysql_error() . "&lt;br/&gt;";
}
else
{
    while($row = $stmt->fetch(PDO::FETCH_NUM))
	{
	$userid=$row[0];
	$firstname=$row[1];
	$lastname=$row[2];
	$username=$row[3];
	$role=$row[4];

    echo $userid."|". $firstname. "| ".$lastname." | ".$username." | ".$role."&lt;br/&gt;";

	}
}
?&gt;

<p class="calibre1">OUTPUT:<br />
11|Barry| John | johnb |  user<br />
3|Silver| John | johnsl  | user<br />
9|Smith| John | johnsm  | user<br />
6|Silver| John | johnsl  | user<br />
8|Snider| John | johns | ADMINN</p>

<p class="calibre1">Delete user using bindParam method.<br />
pdo_delete_user.php</p>
<pre><p class="code">
&lt;?php
 //delete using bindParam method
include('pdo_conn.php');

$dsql="delete from usernames where lastname=:lastname";

$lastname="Johnsons";

 try {

$stmt = $pdo->prepare($dsql);

$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);

$stmt->execute();

echo $lastname."&acute;s records deleted successfully";
	}
	    catch(PDOException $e)
	    {
	   echo "Error: " . $e->getMessage();
	    }
?&gt;
</p></pre>
<p class="calibre1">OUTPUT:<br />
johns&acute;s records deleted successfully!</p>

<p class="calibre1">Delete user using placeholder.<br />
pdo_delete_user2.php</p>
<pre><p class="code">
&lt;?php
//delete using placeholder
include('pdo_conn.php');

$dsql="delete from usernames where lastname=?";

$lastname="Barry";

 try {

$stmt = $pdo->prepare($dsql);

$stmt->execute([$lastname]); //execute required array

echo $lastname."&acute;s records deleted successfully";
	}
	    catch(PDOException $e)
	    {
	   echo "Error: " . $e->getMessage();
	    }
?&gt;
</p></pre>
<p class="calibre1">OUTPUT:<br />
Barry&acute;s records deleted successfully!</p>
<p class="calibre1">Displaying column&acute;s names<br />
pdo_get_headers.php</p>
<pre><p class="code">
&lt;?php

include('pdo_conn.php');

    $rs = $pdo->query('SELECT * FROM usernames LIMIT 0');
	for ($i = 0; $i < $rs->columnCount(); $i++) {
	    $col = $rs->getColumnMeta($i);
	    echo $col['name']."&lt;br/&gt;";
	}

?&gt;
</p></pre>
<p class="calibre1">OUTPUT:<br />
userid<br />
lastname<br />
firstname<br />
username<br />
password<br />
email<br />
role<br />
city<br />
country<br />
bio<br />
website<br />
active</p>
</section>

</div>
</div>
<?php
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>