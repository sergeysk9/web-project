<?php
include('includes/metaheader.php');
?>
<script>
function confirmdel(del, mypostid, username)
{

var r=displayConfirm('warning','"'+del+'"' + ' will be deleted!', mypostid, username);

				if(!r)
		     return false;

	return true;
}


function displayConfirm(mytype, mytext, id, user)
{

var n=0;
$.noty.defaults.killer = true;

noty({
  text: mytext,
  layout: 'center',
  type: mytype,

  animation: {
         open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    } ,

  callback: {

          onClose: function() {
			if(n==1)
		 window.location.assign('delete_my_post.php?postid=' + id + '&username=' + user);
          }
    },

 buttons: [
     {addClass: 'btn btn-primary', text: '&nbsp;&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;&nbsp;', onClick: function($noty) {

         // this = button element
         // $noty = $noty element
		 n++;
         $noty.close();

       }
     },
     {addClass: 'btn btn-danger', text: '&nbsp;&nbsp;Cancel&nbsp;&nbsp;', onClick: function($noty) {
       $noty.close();

       }
     }
   ]
})


}

 function displayHelp() {

popupWindow = window.open('help.php',
'popUpWindow','height=1000,width=600,left=600,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no,titlebar=no');
}
</script>
<style>
a:link,
a:active,
a:hover,
a:visited {
color:#fff;
text-decoration:none;

}
</style>
</head>
<body>
<?php
print('<div class="page-wrap">');
print('<div class="head-cover">');
print('<div class="row">');   // row 1
include('includes/top_nav.php');
print('</div>');  // row1
print('</div>');  // cover

print('<div class="page_body">');
$msg="";

if(isset($_GET['msg']))
$msg=$_GET['msg'];

include('includes/message.php');

print('<div class="row">');  //row2

print('</div>'); //row 2

$sender=$_COOKIE['user'];

print('<section class="start-fixed js--start-fixed">');
print('<div class="row">');

if($lastname !="")
print('<br/><p class="cnt">Dear '. $firstname.' '.$lastname.'! Thank you for registration on my site!</p><br/>');
elseif($login_user!="")
print('<br/><p>Dear '. $login_user.'! Thank you for registration on my site!</p><br/>');
else
print('<br/><p>Dear visitor! Thank you for registration on my site!</p><br/>');
print('</div>');
?>
<div class="row">
<h3 class="cnt">The Demo Profile Page</h3>
</div>
<div class="row">

 <div class="column two">&nbsp;</div>

<div class="column two">
<a href="http://www.amazon.com/dp/B008C4JK98" style="display:block;"><img src="resources/img/php150.jpg" style="border:0;"/></a>
</div>

<div class="column two">
<a href="http://www.amazon.com/dp/B00JNSNL8S" style="display:block;"><img src="resources/img/vb150.jpg" style="border:0; "/></a>
</div>

<div class="column two">
<a href="http://www.amazon.com/dp/B00EUSMTUW" style="display:block;"><img src="resources/img/cplus150.jpg" style="border:0; "/></a>
</div>

<div class="column two">
<a href="http://www.amazon.com/dp/B009PD6A2U" style="display:block;"><img src="resources/img/sql150.jpg" style="border:0;"/></a>
</div>
 <div class="column two">&nbsp;</div>

</div>

<div class="row">
<div class="column two">&nbsp;</div>
<div class="column two">
<a href="http://www.amazon.com/dp/B00IHIR4VA" style="display:block;"><img src="resources/img/format150.jpg" style="border:0; "/></a>
</div>

<div class="column two">
<a href="https://www.amazon.com/dp/B06Y1H1HG3" style="display:block;"><img src="resources/img/algebra150.jpg" style="border:0; "/></a>
</div>

<div class="column two">
<a href="https://www.amazon.com/dp/B073PC14Z2" style="display:block;"><img src="resources/img/geometry150.jpg" style="border:0;"/></a>
</div>

<div class="column two">
<a href="https://www.amazon.com/dp/B0738P9CHZ" style="display:block;"><img src="resources/img/chemistry150.jpg" style="border:0;"/></a>
</div>
 <div class="column two">&nbsp;</div>
</div>


<br/><br/><br/>
</section>
</div></div></div></div>
<div class="site-footer">
<?php
include('includes/bottommenu.php');
?>
</div>
</body>
</html>