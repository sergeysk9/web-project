<?php
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

$folder="thumnails";

$scode=1;

$mainfolder="mainimages1";

$files=scandir(dirname(__FILE__)."/".$folder."/");

$images=array();

$count=sizeof($files);
print('<section class="start-fixed js--start-fixed">');
print('<div class="row">');
print('<h1 class="cnt" >A Gallery Layout Example</h1>');
print('</div>');

for($i=0; $i<$count; $i++)
{
if($i >1)
$images[]=$files[$i];
}

$count=sizeof($images);

print('<div class="row" style="border:3px solid yellow;">');
print('<div class="column w-1-5" style="border:3px solid blue;"> 1/5 row </div>');
print('<div class="column w-3-5" style="border:1px solid orange;"><div class="row"><h4 class="cnt">The borders around of each div block are added on purpuse to make layout visible.</h4></div><div class="row cnt">3/5 row.</div>');
print('<div class="row" style="border:1px solid green;">');

for($i=0; $i<$count; $i++)
{

        print('<div class="column two" style="padding:2px; background-color:lightgreen;"><a href="image.php?scode='.$scode.'&current='.$i.'"><img src="'.$folder.'/'.$images[$i].'" class="cntm" style="width:98%;"></a></div>');
        if(($i+1) % 6==0)
        {
        print('</div><div class="row" style="border:1px solid cyan;">');
        }

}
print('</div>'); // row inside 3/5 row
print('</div>'); //3/5 row
print('<div class="column w-1-5" style="border:3px solid blue;">1/5 row</div>');
print('</div>'); //outside row
print('<div class="row">');
print('<p align="center">Desoto Boulevard, Palm Harbor,Florida</p>');
print('</div>');
?>
<div class="row">
<h3 class="cnt">How to create a grid layout with <a href="https://github.com/rohitkrai03/pillspills.css">pills.css</a></h3>
</div>
<div class="row">
<div class="column w-1-2">
<img src="resources/img/layout.jpg" alt="pills.css grid layout." />
</div><!--1/2-row end-->
<div class="column w-1-2"><br>
<p>The pills.css grid layout is based on 12 columns. 12 columns cover 100% of the webpage width. You can create a div block with any width from one column to 12 columns.</p>
 <p>What you should understand is that when you create a few blocks, each less than 12 columns wide, the sum of the width of these blocks must be 12 columns or 100%.</p>
<p>On the figure on the left, the most outer block is 12 columns. Inside this block, we have 3 blocks:
one block is 1/5 of the whole row, one block is 3/5 of the whole row and one block is 1/5 of the whole row. The whole row is 12 columns.</p>
<p>1/5 + 3/5 + 1/5 = 1 or 100% or the whole 12 columns row. </p>
<p>Inside the 3/5 block we have to place 6 small blocks with images.</p>
<p>It is very important to understand that we cannot place these 6 small blocks directly inside the 3/5 block. First, we must
place inside that 3/5 block the whole 12 columns block and only then we can place 6 small blocks inside that whole block.</p>
<p>To make each image responsive, we assign its width to 98% of the small block.</p>
</div> <!--1/2-row end-->
</div> <!--row end-->
</section>
<?php
print('</div>');     //page-wrap
print('<div class="site-footer">');
include('includes/bottommenu.php');
print('</div>');
?>
</body>
</html>
