<?php
?>
<html>
<head>
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
</body>
</html>
