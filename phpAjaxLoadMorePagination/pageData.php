<?php
$per_page=8;
include_once('inc/dbConnect.inc.php');
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
       $post=$row['symbol'];
//       $link=$row['link'];
       $HTML.='<div>';
       $HTML.=$post;
       $HTML.='</div><br/>';
    }
 $loadCount=$pageLimit+$per_page;
 if($count >= $per_page){
       $HTML.='<div class="load_more_link">';
       $HTML.='<input type="button" class="button" value="Load More" 
       onclick=loadData("'.$loadCount.'")>';
       $HTML.='<span class="flash"></span></div>';
 }
}else{
       $HTML='No Data Found';
}
echo $HTML;
?>
