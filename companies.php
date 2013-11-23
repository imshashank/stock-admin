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