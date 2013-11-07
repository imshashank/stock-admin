<?php

$per_page=18;

include_once('includes/db.php');

if(isset($_POST['pageLimit']) && !empty($_POST['pageLimit'])){

    $pageLimit=$_POST['pageLimit'];

}else{

    $pageLimit='0';

}


$query="SELECT * from new ORDER BY symbol ASC limit $pageLimit,".$per_page ;

//$query="SELECT * from companies ORDER BY symbol ASC limit $per_page";


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
       $post.= '</h2><span class="cmp-name">'.$row['title'].'</span></div>';
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
</script>


<?php
$HTML.='<span class="flash"></span></div>';
 }




}else{

       $HTML='No Data Found';

}

echo $HTML;
$HTML="";
?>
