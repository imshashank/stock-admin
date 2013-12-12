<?php
  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $host = "localhost"; //Host address (most likely localhost)
  $databaseName = "user"; //Name of Database
  $user = "user"; //Name of database user
  $pass = "leapstock123"; //Password for database user
  $tableName = "selected";
  $con = mysql_connect($host,$user,$pass);
  $selected = mysql_select_db($databaseName,$con) 
  or die("Could not select databasename");


  $query="SELECT * FROM  `selected` GROUP BY company";
  $res=mysql_query($query);
  $count=mysql_num_rows($res);
  $HTML='';
$companies=array();  
if($count > 0){
	$post="";
   while($row=mysql_fetch_array($res)){
	array_push ($companies, $row['name']);
}
}



for ($i=0;$i<sizeof($companies);$i++){
$q=$companies[$i];
{
    include_once(dirname(__FILE__).'/config.php');
    include_once(dirname(__FILE__).'/lib/TwitterSentimentAnalysis.php');

    $TwitterSentimentAnalysis = new TwitterSentimentAnalysis(DATUMBOX_API_KEY,TWITTER_CONSUMER_KEY,TWITTER_CONSUMER_SECRET,TWITTER_ACCESS_KEY,TWITTER_ACCESS_SECRET);

    //Search Tweets parameters as described at https://dev.twitter.com/docs/api/1.1/get/search/tweets
    $twitterSearchParams=array(
        'q'=>$q,
        'lang'=>'en',
        'count'=>10,
	'from'=>'aljazeera OR from:abcnewslive OR from:ap OR from:BBCBreaking OR from:BBCworld  OR from:boingboing OR from:breakingnews OR from:CBSTopNews OR from:ajelive OR from:cnn OR from:cnnbrk OR from:engadget OR from:foxnews OR from:makeuseof OR from:mashable OR from:mitnews OR from:nytimes OR from:nprnews OR from:reddit OR from:reuters OR from:reuterslive OR from:SkyNewsBreak OR from:techcrunch OR from:Slate OR from:twcbreaking OR from:WSJbreakingnews ',

    );
    $results=$TwitterSentimentAnalysis->sentimentAnalysis($twitterSearchParams);


    ?>
    <h1>Results for "<?php echo $q; ?>"</h1>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>User</td>
            <td>Text</td>
            <td>Twitter Link</td>
            <td>Sentiment</td>
        </tr>
        <?php
        foreach($results as $tweet) {
            $count++;
            $color=NULL;
            if($tweet['sentiment']=='positive') {
                $color='#00FF00';
		$positive++;
            }
            else if($tweet['sentiment']=='negative') {
		$negative++;
                $color='#FF0000';
            }
            else if($tweet['sentiment']=='neutral') {
                $color='#FFFFFF';
            }
            ?>
<?php
//echo $tweet['id'];
$q1='INSERT INTO tweets VALUES ("'.$tweet['id'].'","'.$q.'","'.$tweet['user'].'","'.$tweet['text'].'","'.$tweet['url'].'","'.$tweet['sentiment'].'","")';
//echo "<br/>".$q1 ."<br/><br/>";
$res=mysql_query($q1);

?>
            <tr style="background:<?php echo $color; ?>;">
                <td><?php echo $tweet['id']; ?></td>
                <td><?php echo $tweet['user']; ?></td>
                <td><?php echo $tweet['text']; ?></td>
                <td><a href="<?php echo $tweet['url']; ?>" target="_blank">View</a></td>
                <td><?php echo $tweet['sentiment']; ?></td>
            </tr>
            <?php
 }
echo "Total of $count tweets analyzed with $positive as positive and $negative negative tweets";

        ?>    
    </table>
    <?php
}
sleep(10);
}
?>
  
</body>
</html>
