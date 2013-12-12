<?php
include('header.php');
?>
<body>

<?php include('navbar.php');?>
<?php include('sidebar.php');?>
		<!--Start Content -->

<script type="text/javascript">
$( document ).ready(function() {
//twitterData();
})

function twitterData(){
//     var dataString1 = 'user='+'<?php echo $loggedInUser->displayname; ?>';
     var dataString1 = 'apple';
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: dataString1,
        url: "twitterdata.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#twitterdata").html(response); 
//            alert(response);
        }
    });
}


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
<div id="companydata" align="center"></div>

<div id="twitterdata" align="center"></div>

<div class="separator bottom"></div>
<div class="ui-widget">

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
