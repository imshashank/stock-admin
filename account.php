<?php
include('header.php');
?>
<body>

<?php include('navbar.php');?>
<?php include('sidebar.php');?>
		<!--Start Content -->

<script type="text/javascript">



 $(function () {
        $("#tags").autocomplete({
	    source:'suggest.php', minLength:2,
	select : function(event, ui) {
	var selectedObj = ui.item;
	$.post('insert.php', {ID: selectedObj.value, Name: '<?php echo $loggedInUser->displayname; ?>' },
	function(data){
	$("#message").html(data);
	$("#message").hide();
	$("#message").fadeIn(1500); //Fade in the data given by the insert.php file
	});
	userData();
    }
        });
    });


function loadData(pageLimit){
     $(".flash").show();
     $(".flash").fadeIn(400).html('Loading <img src="image/ajax-loading.gif"> ');
     var secsel=$("#sectorSelect option:selected").val();
     var indsel=$("#industrySelect option:selected").val();
     var dataString = 'pageLimit='+ pageLimit + '&sectorSelect='+ secsel +'&industrySelect='+ indsel ;
     $.ajax({
            type: "POST",
            url: "pageData.php",
            data: dataString,
            cache: false,
            success: function(result){ 
            $(".flash").hide();
            $(".load_more_link").addClass('noneLink');
            $("#pageData").append(result);
      }
  });
}
  loadData('0');

$('#parent > div').live('click', function (e) {

$(this).toggleClass("selected");

//Get values of the input fields and store it into the variables.
var ID=$(this).attr('id');
var Name="<?php echo $loggedInUser->displayname; ?>";
 
$.post('insert.php', {ID: ID, Name: Name },
function(data){
$("#message").html(data);
$("#message").hide();
$("#message").fadeIn(1500); //Fade in the data given by the insert.php file
});

userData();
return false;
});

/*
function sectorData(pageLimit1){
     $(".flash").show();
     $(".flash").fadeIn(400).html('Loading <img src="image/ajax-loading.gif"> ');
     var secsel=$("#sectorSelect option:selected").val();
     var dataString = 'pageLimit1='+ pageLimit1 + ', sectorSelect=' + secsel;
     $.ajax({
             type: "POST",
             url: "sectorData.php",
            data: dataString,
            cache: false,
            success: function(result){ 
            $(".flash").hide();
            $(".load_more_link").addClass('noneLink');
            $("#sectorData").append(result);
      }
  });
}
  sectorData('0');

$('#parent > div').live('click', function (e) {

$(this).toggleClass("selected");

//Get values of the input fields and store it into the variables.
var ID=$(this).attr('id');
var Name="<?php echo $loggedInUser->displayname; ?>";
 
$.post('insert.php', {ID: ID, Name: Name },
function(data){
$("#message").html(data);
$("#message").hide();
$("#message").fadeIn(1500); //Fade in the data given by the insert.php file
});

userData();
return false;
});
*/
</script>


		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.php?lang=en" class="glyphicons home"><i></i>Stock Leap</a></li>
	<li class="divider"></li> 
	<li><?php echo $loggedInUser->username;?></li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
	<h3 class="glyphicons display"><i></i> Dashboard</h3>
	
	<div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>

<?php include('menubar.php');?>

<div class="separator bottom"></div>
<h3>Companies in your portfolio</h3>
<div id="responsecontainer" align="center"></div>
<div class="separator bottom"></div>
<div class="ui-widget">

<div class="row-fluid">
	<div class="span3">
	<input id="tags" placeholder="Search" />
	</div>
	<div class="span2" style="margin-left: 8px;margin-right: 18px;">

<select id="sectorSelect" class="sectorSelect">
<option value="undefined">Select Sector</option>

<?php 
$query="SELECT DISTINCT sector FROM new ORDER BY industry";

$res=mysql_query($query);

$count=mysql_num_rows($res);

if($count > 0){
   while($row=mysql_fetch_array($res)){
if( $row['sector']!="" ){
echo '<option value="'.$row['sector'].'">'.$row['sector'].'</option>';
}
}}

?>
	</select>

	</div>
	<div class="span2">
<select id="industrySelect" class="industrySelect">
  		<option value="undefined">Select Industry</option>
<?php 
$query="SELECT DISTINCT industry FROM new ORDER BY industry";

$res=mysql_query($query);

$count=mysql_num_rows($res);

if($count > 0){
	$post="";
   while($row=mysql_fetch_array($res)){
if( $row['industry']!="" ){
echo '<option value="'.$row['industry'].'">'.$row['industry'].'</option>';
}
}}

?>
	</select>
<script>
$( ".sectorSelect" ).change(function() {
 $("#pageData").html(' ');
$(".industrySelect").val(0)
pagelimit=0;
 	loadData(pagelimit);
});

$( ".industrySelect" ).change(function() {
 $("#pageData").html(' ');
$(".sectorSelect").val(0)
pagelimit=0;
loadData(pagelimit);
});
</script>
		</div>
	</div>
</div>

<h3 style="text-align: left;font-size: 25px;">All Companies</h2>
	
			    <div id="wrapper">
	         		<div id="pageData"></div>
			    </div>

</div>
			<div class="clearfix" style="clear: both;"></div>
			<div id="overview" style="height: 40px;"></div>
</div>


<br/>		
				<!-- End Content -->
		</div>
		<!-- End Wrapper -->
		</div>
<?php
include('footer.php');		
?>
