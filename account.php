<?php
include('header.php');
?>
<body>
<?include('navbar.php');?>
<?include('sidebar.php');?>
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
     $(".flash").fadeIn(400).html
            ('Loading <img src="image/ajax-loading.gif" />');
     var dataString = 'pageLimit='+ pageLimit;
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

</script>


		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i>Stock Leap</a></li>
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

<div class="widget widget-2 widget-tabs widget-tabs-2">
	
	<div class="widget-body">
		<div class="tab-pane active" id="website-traffic-tab">


<h2>Selected Companies</h2>
<div id="responsecontainer" align="center">
</div>
								<hr class="separator" />
<h2 style="text-align: left;font-size: 25px;">All Companies</h2>
<div class="ui-widget">
    <label for="tags">Search:</label> <input id="tags" />
</div>
<br/>
	
		    <div id="wrapper">
         		<div id="pageData"></div>
		    </div>

			<div class="clearfix" style="clear: both;"></div>
			<div id="overview" style="height: 40px;"></div>
		</div>
	</div>

	</div>
</div>


<br/>		
				<!-- End Content -->
		</div>
		<!-- End Wrapper -->
		</div>
<?php
include('footer.php');		
?>
