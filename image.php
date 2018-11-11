<?php
$p=1;
$mainfolder="mainimages";
$score=1;
$curr=0;

if(isset($_GET['current']))
$curr=$_GET['current'];

$files=array();
$count=0;

$files=scandir(dirname(__FILE__)."/".$mainfolder."/");

$images=array();

$count=sizeof($files);

for($i=0; $i<$count; $i++)
{
if($i >1)
$images[]=$files[$i];

}

$c=sizeof($images);

$p=$curr+1;
if($p >= $c)
$p=0;

$current=$mainfolder.'/'.$images[$curr];

$filename=$images[$curr];

$title="Gallery";
include('includes/metaheader.php');

print('</head>');
print('<body>');
print('<div class="page-wrap">');
print('<div class="head-cover">');
print('<div class="row">');
include('includes/top_nav.php');
print('</div>');  // row
print('</div>');  // cover
print('<section class="start-fixed js--start-fixed">');
print('<div class="page_body">');

print('<div class="row">');
print('<h1>The Wall Springs Park</h1>');
print('</div>');

print('<div class="row">');
print('<div class="column w-1-3"></div>');
print('<div class="column w-1-3"><img src="'.$current.'" alt="Image:'.$filename.'" style="width:100%;"  alt="Wall Springs Park"/></div>');
print('<div class="column w-1-3"></div>');

print('<div class="row">');
print('<p class="cnt"><a href="image.php?current='.$p.'&scode='.$scode.'">Next</a></p>');
print('</div>');

print('<div class="row">');
?>
<h1>Palm Harbor. Florida.</h1><br/>

</div>

</div><!--page-body-->
</section>
</div><!--wrap--page-->
<?php
print('<div class="site-footer">');
include('includes/bottommenu.php');
?>
</div>
</body>
</html>
