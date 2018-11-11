<?php
$n=0;
     print('<nav>');
      	 print('<div class="row">');
            print('<a class="nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>');
      		 print('<ul class="top-nav js--top-nav">');

      		if(isset($_COOKIE['user']))
      		{
             $n=1;
      		$login_user=$_COOKIE['user'];

      		print('<li><a href="act_myprofile.php?username='.$login_user.'">My Profile</a>');
      		}
                 print('<li><a href="index.php">Home</a></li>');
                 print('<li><a href="mysqlpdo.php">PDO</a></li>');
                 print('<li><a href="mysqli.php" >MySQLi</a></li>');
                 print('<li><a href="images.php">Gallery</a></li>');
                 if($n==1)
                 {
                 print('<li><a href="edit_member.php">Edit Profile</a></li>');
                 print('<li><a href="sign_out.php">Sign off</a></li>');
                 }
                 else
                 {
                 print('<li><a href="sign_in.php" rel="nofollow">Sign in</a></li>');
                 print('<li><a href="enter_member.php">Sign Up</a></li>');
                 }
      		 print('</ul>');
             print('</div>');
       print('</nav>');
?>