<?php

$per_page=12;

include_once('includes/db.php');

if(isset($_POST['pageLimit']) && !empty($_POST['pageLimit'])){

    $pageLimit=$_POST['pageLimit'];

}else{

    $pageLimit='0';

}

$pageLimit=$pageLimit;

$query="SELECT * from companies ORDER BY symbol ASC

        limit $pageLimit,".$per_page;

$res=mysql_query($query);

$count=mysql_num_rows($res);

$HTML='';


if($count > 0){

   while($row=mysql_fetch_array($res)){

//       $post=$row['symbol'];

//       $link=$row['link'];

//       $HTML.='<div>';

//arranges the elements in rows of 6
$c=0;
if ($c%6 ==0 ) $post.= '<div class="row-fluid">';
       $post.= '<div id="parent" class="span2">';
       $post.= '<div id="'.$row['symbol'].'" class="tile black-tooltip" data-toggle="tooltip" title="Sector:';
       $post.= $row['sector'];
       $post.= 'Industry:';
       $post.= $row['industry'];
       $post.= '"><h2>';
       $post.= $row['symbol'];
       $post.= '</h2><span class="cmp-name">'.$row['title'].'</span></div>';
       $post.= "</div>";
	$c++;
	if ($c%6 ==0 && $count!=0) 
	{
	$post.='</div><div class="separator"></div>';
}
	
       $HTML.=$post;

//       $HTML.='</div>';

    }

$loadCount=$pageLimit+$per_page;
//$loadCount=$per_page;



 if($count >= $per_page){

?>

<script>
$(document).ready(function()
{
function last_msg_funtion() 
{ 
//document.getElementById("loadmore").click();
//loadData("'.$loadCount.'");
loadData("<?php echo $loadCount; ?>");

}; 

$(window).scroll(function(){
if ($(window).scrollTop() == $(document).height() - $(window).height()){
last_msg_funtion();
}
}); 
});
</script>


<?php
/*
      $HTML.='<div class="load_more_link">';

       $HTML.='<input type="button" class="button" value="Load More" id="loadmore" 

       onclick=loadData("'.$loadCount.'")>';
       $HTML.='<span class="flash"></span></div>';
*/
$HTML.='<span class="flash"></span></div>';
 }




}else{

       $HTML='No Data Found';

}

echo $HTML;

?>
