<?php

//include("left-nav.php");
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require('includes/db.php');

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<title>Stocleap</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	
	<!-- Bootstrap Extended -->
	<link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
	<link href="bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="theme/scripts/select2/select2.css"/>
	
	<!-- Notyfy -->
	<link rel="stylesheet" href="theme/scripts/notyfy/jquery.notyfy.css"/>
	<link rel="stylesheet" href="theme/scripts/notyfy/themes/default.css"/>
	
	<!-- JQueryUI v1.9.2 -->
	<link rel="stylesheet" href="theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
	
	<!-- Glyphicons -->
	<link rel="stylesheet" href="theme/css/glyphicons.css" />
	
	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	
	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

	<!-- JQuery v1.8.2 -->
	<script src="theme/scripts/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
	
	<!-- Modernizr -->
	<script src="theme/scripts/modernizr.custom.76094.js"></script>
	
	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="theme/scripts/jquery-miniColors/jquery.miniColors.css" />
	
	<!-- Theme -->
	<link rel="stylesheet" href="theme/css/style.min.css?1363272390" />
	
	<!-- LESS 2 CSS -->
	<script src="theme/scripts/less-1.3.3.min.js"></script>
	
	
	<!--[if IE]><script type="text/javascript" src="theme/scripts/excanvas/excanvas.js"></script><![endif]-->
	<!--[if lt IE 8]><script type="text/javascript" src="theme/scripts/json2.js"></script><![endif]-->
<style>

.selected{
border: 10px #2d89ef solid;
height: 80px !important;
width: 111px !important;
}

.tile{
display: block;
float: left;
height:100px;
width: 130px;
background-color: #525252;
cursor: pointer;
box-shadow: inset 0px 0px 1px #FFFFCC;
text-decoration: none;
color: #ffffff;
position: relative;
font-family: 'Segoe UI Semilight', 'Open Sans', Verdana, Arial, Helvetica, sans-serif;
font-weight: 300;
font-size: 11pt;
letter-spacing: 0.02em;
line-height: 14pt;
font-smooth: always;
padding: 5px;
margin: 0 10px 10px 0;
overflow: hidden;
}

.tile h2{
color: white;
text-align: center;
}
.cmp-name{
font-size:10px;
}

.noneLink{display:none;}
#loadmore{

}

</style>

<script type="text/javascript">
$(document).ready(function() {

userData();
});

function userData(){
     var dataString = 'user='+'<?php echo $loggedInUser->displayname; ?>';
      $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        data: dataString,
        url: "api.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });

}



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

<script>
jQuery(document).ready(function($){
	$('#zipsearch').autocomplete({source:'suggest_zip.php', minLength:2});
});
</script>
</head>
<body>
	
	<!-- Start Content -->
	<div class="container-fluid fixed">
		
		<div class="navbar main">
			<a href="index.html?lang=en" class="appbrand"><span>Admin+ <span>lovely headline here</span></span></a>
			
						<button type="button" class="btn btn-navbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
						
			<ul class="topnav pull-right">
				<li class="visible-desktop">
					<ul class="notif">
						<li><a href="" class="glyphicons envelope" data-toggle="tooltip" data-placement="bottom" data-original-title="5 new messages"><i></i> 5</a></li>
						<li><a href="" class="glyphicons shopping_cart" data-toggle="tooltip" data-placement="bottom" data-original-title="1 new orders"><i></i> 1</a></li>
						<li><a href="" class="glyphicons log_book" data-toggle="tooltip" data-placement="bottom" data-original-title="3 new activities"><i></i> 3</a></li>
					</ul>
				</li>
				<li class="dropdown visible-desktop">
					<a href="" data-toggle="dropdown" class="glyphicons cogwheel"><i></i>Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="">Some option</a></li>
						<li><a href="">Some other option</a></li>
						<li><a href="">Other option</a></li>
					</ul>
				</li>
								<li class="hidden-phone">
					<a href="#themer" data-toggle="collapse" class="glyphicons eyedropper"><i></i><span>Themer</span></a>
					<div id="themer" class="collapse">
						<div class="wrapper">
							<span class="close2">&times; close</span>
							<h4>Themer <span>color options</span></h4>
							<ul>
								<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
								<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
								<li>
									<span class="link" id="themer-custom-reset">reset theme</span>
									<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
								</li>
							</ul>
							<div id="themer-getcode" class="hide">
								<hr class="separator" />
								<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i>Get LESS</button>
								<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i>Get CSS</button>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</li>
								<li class="hidden-phone">
					<a href="#" data-toggle="dropdown"><img src="theme/images/lang/en.png" alt="en" /></a>
			    	<ul class="dropdown-menu pull-right">
			      		<li class="active"><a href="?page=index&amp;lang=en" title="English"><img src="theme/images/lang/en.png" alt="English"> English</a></li>
			      		<li><a href="?page=index&amp;lang=ro" title="Romanian"><img src="theme/images/lang/ro.png" alt="Romanian"> Romanian</a></li>
			      		<li><a href="?page=index&amp;lang=it" title="Italian"><img src="theme/images/lang/it.png" alt="Italian"> Italian</a></li>
			      		<li><a href="?page=index&amp;lang=fr" title="French"><img src="theme/images/lang/fr.png" alt="French"> French</a></li>
			      		<li><a href="?page=index&amp;lang=pl" title="Polish"><img src="theme/images/lang/pl.png" alt="Polish"> Polish</a></li>
			    	</ul>
				</li>
				<li class="account">
										<a data-toggle="dropdown" href="form_demo.html?lang=en" class="glyphicons logout lock"><span class="hidden-phone text"><?php echo $loggedInUser->username;?></span><i></i></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="form_demo.html?lang=en" class="glyphicons cogwheel">Settings<i></i></a></li>
						<li><a href="form_demo.html?lang=en" class="glyphicons camera">My Photos<i></i></a></li>
						<li class="highlight profile">
							<span>
								<span class="heading">Profile <a href="form_demo.html?lang=en" class="pull-right">edit</a></span>
								<span class="img"></span>
								<span class="details">
									<a href="form_demo.html?lang=en"><?php echo $loggedInUser->displayname;?></a>
<?echo $loggedInUser->email; ?>
								</span>
								<span class="clearfix"></span>
							</span>
						</li>
						<li>
							<span>
								<a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="logout.php?lang=en">Sign Out</a>
							</span>
						</li>
					</ul>
									</li>
			</ul>
		</div>
		
				<div id="wrapper">
		<div id="menu" class="hidden-phone">
			<div id="menuInner">
				<div id="search">
					<input type="text" placeholder="Quick search ..." />
					<button class="glyphicons search"><i></i></button>
				</div>
				<ul>
					<li class="heading"><span>Category</span></li>
					<li class="glyphicons home active"><a href="index.html?lang=en"><i></i><span>Dashboard</span></a></li>
<?php
echo "<div id='main'>
Hey, $loggedInUser->displayname. This is an example secure page designed to demonstrate some of the basic features of UserCake. Just so you know, your title at the moment is $loggedInUser->title, and that can be changed in the admin panel. You registered this account on " . date("M d, Y", $loggedInUser->signupTimeStamp()) . ".</div>";
?>

					<li class="glyphicons cogwheels"><a href="ui.html?lang=en"><i></i><span>UI Elements</span></a></li>
					<li class="glyphicons charts"><a href="charts.html?lang=en"><i></i><span>Charts</span></a></li>
					<li class="hasSubmenu">
						<a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><i></i><span>Forms</span></a>
						<ul class="collapse" id="menu_forms">
							<li class=""><a href="form_demo.html?lang=en"><span>My Account</span></a></li>
							<li class=""><a href="form_elements.html?lang=en"><span>Form Elements</span></a></li>
							<li class=""><a href="form_validator.html?lang=en"><span>Form Validator</span></a></li>
							<li class=""><a href="file_managers.html?lang=en"><span>File Managers</span></a></li>
						</ul>
					</li>
					<li class="">
						<a class="glyphicons table" href="tables.html?lang=en"><i></i><span>Tables</span></a>
					</li>
					<li class="glyphicons calendar"><a href="calendar.html?lang=en"><i></i><span>Calendar</span></a></li>
					<li class="glyphicons user"><a href="login.html?lang=en"><i></i><span>Login</span></a></li>
				</ul>
				<ul>
					<li class="heading"><span>Sections</span></li>
					<li class="glyphicons coins"><a href="finances.html?lang=en"><i></i><span>Finances</span></a></li>
					<li class="hasSubmenu">
						<a data-toggle="collapse" class="glyphicons shopping_cart" href="#menu_ecommerce"><i></i><span>Online Shop</span></a>
						<ul class="collapse" id="menu_ecommerce">
							<li class=""><a href="products.html?lang=en"><span>Products</span></a></li>
							<li class=""><a href="product_edit.html?lang=en"><span>Add product</span></a></li>
						</ul>
					</li>
					<li class="glyphicons sort"><a href="pages.html?lang=en"><i></i><span>Site Pages</span></a></li>
					<li class="glyphicons picture"><a href="gallery.html?lang=en"><i></i><span>Photo Gallery</span></a></li>
					<li class="glyphicons adress_book"><a href="bookings.html?lang=en"><i></i><span>Bookings</span></a></li>
				</ul>
			</div>
		</div>
		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
	<li class="divider"></li>
	<li>Dashboard</li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
	<h3 class="glyphicons display"><i></i> Dashboard</h3>
	
	<div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>

<div class="menubar">
	<ul>
		<li><a href="./account.php">Companies</a></li>
		<li><a href="./user_details.php">Account</a></li>
		<li class="divider"></li>
		<li><a href="">Export</a></li>
	</ul>
</div>





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
		
		<!-- Sticky Footer -->
		<div id="footer" class="visible-desktop">
	      	<div class="wrap">
	      		<ul>
	      			<li class="dropdown dropup">
	      				<span data-toggle="dropdown" class="dropdown-toggle glyphicons cogwheel text" title=""><i></i><span class="hidden-phone">Layout Options</span></span>
	      				<ul class="dropdown-menu pull-left">
	      					<li class="active"><a href="#" data-toggle="layout" data-layout="fixed" title="">Fixed layout</a></li>
	      					<li><a href="#" data-toggle="layout" data-layout="fluid" title="">Fluid layout</a></li>
	      				</ul>
	      			</li>
	      			<li class="dropdown dropup">
	      				<span data-toggle="dropdown" class="dropdown-toggle glyphicons settings text" title=""><i></i><span class="hidden-phone">Menu Options</span></span>

	      				<ul class="dropdown-menu pull-left">
	      					<li class="active"><a href="#" data-toggle="menuPosition" data-menuPosition="left-menu" title="">Left menu</a></li>
	      					<li><a href="#" data-toggle="menuPosition" data-menuPosition="right-menu" title="">Right menu</a></li>
	      				</ul>
	      			</li>
	      			<li><a href="documentation.html?lang=en" class="glyphicons circle_question_mark text" title=""><i></i><span class="hidden-phone">Documentation</span></a></li>
	      		</ul>
	      	</div>
	    </div>
				
	</div>
	
	<!-- JQueryUI v1.9.2 -->
	<script src="theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- MiniColors -->
	<script src="theme/scripts/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Select2 -->
	<script src="theme/scripts/select2/select2.js"></script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = '#DA4C4C';
	</script>
	<script src="theme/scripts/jquery.cookie.js"></script>
	<script src="theme/scripts/themer.js"></script>
	
	<!-- Notyfy -->
	<script type="text/javascript" src="theme/scripts/notyfy/jquery.notyfy.js"></script>
	
	<!-- Dashboard Custom Script -->
	<script type="text/javascript" src="theme/scripts/index.js"></script>
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<!-- Sparkline -->
	<script src="theme/scripts/jquery.sparkline.js" type="text/javascript"></script>
	<script type="text/javascript">
	function genSparklines()
	{
		if ($('.sparkline').length)
		{
			$.each($('.sparkline'), function(k,v) 
			{
				var data = [[1, 3+charts.utility.randNum()], [2, 5+charts.utility.randNum()], [3, 8+charts.utility.randNum()], [4, 11+charts.utility.randNum()],[5, 14+charts.utility.randNum()],[6, 17+charts.utility.randNum()],[7, 20+charts.utility.randNum()], [8, 15+charts.utility.randNum()], [9, 18+charts.utility.randNum()], [10, 22+charts.utility.randNum()]];
			 	$(v).sparkline(data, 
				{ 
					width: 100,
					height: 28,
					lineColor: themerPrimaryColor,
					fillColor: '#fafafa',
					spotColor: '#467e8c',
					maxSpotColor: '#9FC569',
					minSpotColor: '#ED7A53',
					spotRadius: 3,
					lineWidth: 2
				});
			});
		}
	}
	$(function()
	{
		genSparklines();
	});
	</script>
		
	<!--  Flot (Charts) JS -->
	<script src="theme/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="theme/scripts/flot/jquery.flot.pie.js" type="text/javascript"></script>
	<script src="theme/scripts/flot/jquery.flot.tooltip.js" type="text/javascript"></script>
	<script src="theme/scripts/flot/jquery.flot.selection.js"></script>
	<script src="theme/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="theme/scripts/flot/jquery.flot.orderBars.js" type="text/javascript"></script>
	
		
	
	
	
	<!-- Resize Script -->
	<script src="theme/scripts/jquery.ba-resize.js"></script>
	
	<!-- Uniform -->
	<script src="theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- Bootstrap Script -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap Extended -->
	<script src="bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
	<script src="bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="bootstrap/extend/bootbox.js" type="text/javascript"></script>
	<script src="bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
	<script src="bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
	
	<!-- Custom Onload Script -->
	<script src="theme/scripts/load.js"></script>
	
	<!-- Layout Options -->
	<script src="theme/scripts/layout.js"></script>
	
	
</body>
</html>



