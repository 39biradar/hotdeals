<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HotDeals - Dashboard</title>
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/datepicker3.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url('assets/js/lumino.glyphs.js');?>"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  if ((key < 48 || key > 57) && !(key == 8 || key == 9 || key == 13 || key == 37 || key == 39 || key == 46) ){
    theEvent.returnValue = false;
    if (theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
<script>
$(".navbar-nav  li  a").on("click", function(){
   $(".navbar-nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
</script>
</head>
<body>
	