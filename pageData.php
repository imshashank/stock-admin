<?php

$per_page=36;

require('includes/db.php');

if(isset($_POST['pageLimit']) && !empty($_POST['pageLimit'])){

    $pageLimit=$_POST['pageLimit'];
}else{

    $pageLimit='0';

}


if(isset($_POST['sectorSelect']) && !empty($_POST['sectorSelect'])){

    $sectorSelect=$_POST['sectorSelect'];

}else {

    $sectorSelect='undefined';

}

if(isset($_POST['industrySelect']) && !empty($_POST['industrySelect'])){

    $industrySelect=$_POST['industrySelect'];

}else {

    $industrySelect='undefined';

}

if ( $sectorSelect != 'undefined' ){
$query="SELECT * from new where sector ='".$sectorSelect."' ORDER BY symbol ASC limit $pageLimit,".$per_page ;

	}
	else if ( $industrySelect != 'undefined' ){
	$query="SELECT * from new where industry ='".$industrySelect."' ORDER BY symbol ASC limit $pageLimit,".$per_page ;
		}
		else
		$query="SELECT * from new ORDER BY symbol ASC limit $pageLimit,".$per_page ;
	
	

$res=mysql_query($query);

$count=mysql_num_rows($res);

$HTML='';

if($count > 0){
	$post="";
   while($row=mysql_fetch_array($res)){

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
       $post.= '</h2><div class="cname"><span class="cmp-name">'.$row['title'].'</span></div></div>';
       $post.= "</div>";
	$c++;
	if ($c%6 ==0 && $count!=0) 
	{
	$post.='</div><div class="separator"></div>';
	}
//echo $post;
//       $HTML.='</div>';
}
       $HTML=$post;	



$loadCount=$pageLimit+$per_page+$loadCount;
//echo $loadCount."<br/>";
/*
if ($loadCount> ($pageLimit+$per_page+$loadCount)){
$loadCount=$pageLimit+$per_page+$loadCount;
}
else $loadCount=$loadCount+6;



*/
 if($count >= $per_page){

?>

<script>
$(document).ready(function()
{

var load=0;
function last_msg_funtion() 
{ 
//loadData("<?php echo $loadCount; ?>");
load=load+36;
loadData(load).delay(1000);
}; 

$(window).scroll(function(){
if ($(window).scrollTop() == $(document).height() - $(window).height()){
last_msg_funtion();
}
	
}); 
});

//find parent

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
$HTML="";
?>

