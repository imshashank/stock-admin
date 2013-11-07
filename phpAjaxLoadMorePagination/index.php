<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Twitter Style PHP Ajax Load More Pagination Tutorial | 91 Web Lessons</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
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
</script>
</head>
<body>
<div id="container">
    <!--top section start-->
    <div id='top'>
         <a href="http://www.91weblessons.com" title="91 Web Lessons" target="blank">
             <img src="image/logo.png" alt="91 Web Lessons" title="91 Web Lessons" border="0"/>
         </a>
    </div>

    <div id='tutorialHead'>
         <div class="tutorialTitle"><h1>Twitter Style PHP Ajax Load More Pagination Tutorial</h1></div>
         <div class="tutorialLink"><a href="http://www.91weblessons.com/twitter-style-php-ajax-load-more-pagination-tutorial" title="Twitter Style PHP Ajax Load More Pagination Tutorial"><h1>Tutorial Link</h1></a></div>

    </div>

    <div id="wrapper">
         <div id="pageData"></div>
    </div>


    <!--fotter section start-->
    <div id="fotter">
         <p>Copyright &copy; 2012
              <a href="http://www.91weblessons.com" title="91 Web Lessons" target="blank">91 Web Lessons</a>.
              All rights reserved.
         </p>
    </div>
</div>

</body>
</html>