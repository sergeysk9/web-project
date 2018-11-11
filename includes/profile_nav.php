<?php
     print('<nav>');
      	 print('<div class="row">');
            print('<a class="nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>');
      		 print('<ul class="top-nav js--top-nav">');
             print('<li><a href="index.php">Home</a></li>');
      		//if(isset($_COOKIE['user']))
      	   //	{
      	   //	$login_user=$_COOKIE['user'];
      	   //	print('<li><a href="act_myprofile.php?username='.$login_user.'">Profile</a>');
      	   //	}

                 print('<li><a href="upload_file.php?username='.$username.'">Photo</a></li>');
                 print('<li><a href="album.php?username='.$username.'">Albums</a></li>');
                 if($albums_count > 0)
      			 print('<li><a href="mygallery.php?username='.$username.'">My Gallery</a></li>');
                 print('<li><a href="edit_author.php?username='.$username.'&imgpath='.$loginimgpath.'">Edit Bio</a></li>');
                 print('<li><a href="edit_userpwd.php?username='.$username.'&imgpath='.$loginimgpath.'">Password</a></li>');
                 print('<li><a href="enter_post.php?username='.$username.'&imgpath='.$loginimgpath.'">Add Post</a></li>');
                 print('<li><a href="#" onclick="displayHelp();">Help</a></li>');
                 if(!isset($_COOKIE['user']))
                 print('<li><a href="sign_in.php">Sign in</a></li>');
                 else
      			 print('<li><a href="sign_out.php">Sign off</a></li>');
      		 print('</ul>');
             print('</div>');
       print('</nav>');
       ?>