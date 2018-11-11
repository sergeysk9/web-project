<?php
print('<div class="row gray">');
print('<ul class="bottom-nav">');
print('<li><a href="index.php?p=1">Home</a></li>');

if(!isset($_COOKIE['user']))
print('<li><a href="sign_in.php">Sign in</a></li>');
else
{
print('<li><a href="sign_out.php">Sign off</a></li>');
print('<li><a href="edit_userpwd.php">Change Password</a></li>');

}

print('<li><a href="#">Terms</a></li>');
print('<li><a href="#">Contact us</a></li>');
print('<li><a href="#">About</a></li>');


print('</ul>');
print('</div>');
?>
<script src="resources/js/jquery.waypoints.min.js"></script>
<script src="resources/js/fixed.js"></script>