<html>
<head>
<meta charset="utf-8">
<title>Welcome Hot Deals</title>
<link href="<?php echo site_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/css/main.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic,700italic,600italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>assets/css/popup.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.livequery.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.timeago.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
    $('#btn_preview').click( function(){
			$("#myModal").modal('show');
			var title   = $('#title').val();
			var details = $('#details').val();
			$('#preview_title').html(title);
			$('#preview_description').html(details);           
    });
	
	$("#post_comment").click(function() {
    $('html, body').animate({
        scrollTop: $("#div_post_comment").offset().top
    }, 2000);	
});
})
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".timeago").livequery(function() // LiveQuery 
{
$(this).timeago(); // Calling Timeago Funtion 
});
});
</script>
<script type="text/javascript">
        function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'search_data': input_data
                    };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/home/get_deals/",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
</script>
</head>
<body>
<div class="main">
<header class="bhwhite">
<div class="row">
    <div style="height:26px;background:#eeefee;"> <div class="container"><div class="row">
    <div class="col-xs-12 col-md-12 top_nav"> <ul class="navbar-right">
            <?php if($this->session->userdata('email')!='') { ?>
            <li><a  href="<?php echo site_url();?>home/logout"><?php echo $user_profile['name'];?></a></li>
            <li><a  href="<?php echo site_url();?>home/logout">Logout</a></li>
            <?php } else { ?>
            <li><a id="modal_trigger" href="#modal">Login</a></li>
            <?php } ?>
          </ul> </div>
    </div> </div> </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-3">
      <div class="row logo1"><a href="<?php echo site_url();?>"><img src="<?php echo site_url();?>assets/images/logo.png" class="logo" height="80px"></a> </div>
    </div>
    <div class="col-xs-12 col-md-6">
      <div class="search"> <?php echo form_open('submitdeal/search_btn_action',array('data-toggle' => 'validator','role' => 'form','class' => 'form-wrapper')); ?>
        <input type="text" onKeyUp="ajaxSearch();" autocomplete="off" name="search_data" id="search_data" placeholder="Search here..." required>
        <button type="submit">Search</button>
        <?php echo  form_close(); ?> </div>
      <div id="suggestions">
        <div id="autoSuggestionsList"> </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-3">
      <div class="row social-icon text-right"> <a href="#"><img src="<?php echo site_url();?>assets/images/facebook.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/rssfeed.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/twitter.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/google-plus.png" class="top_social_icon"></a> </div>
    </div>
  </div>
</div>
