<div class="subscribers">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <form>
          <div class="col-xs-12 col-md-3 text-right">
            <div class="row">
              <h3>Subscribe to Newsletter</h3>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <input type="text" placeholder="Your Email Address" required>
          </div>
          <div class="col-xs-12 col-md-3 sub_btn">
            <div class="row">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<footer class="bhwhite">
<div class="container footer">
  <div class="row">
    <div class="col-xs-12 col-md-4">
      <h3 class="text-uppercase">Download</h3>
      <img src="<?php echo site_url();?>assets/images/appstore.jpg" class="apps-icon"> <img src="<?php echo site_url();?>assets/images/googleplay.jpg" class="apps-icon"> </div>
    <div class="col-xs-12 col-md-4">
      <h3 class="text-uppercase">QUICK LINKS</h3>
      <ul class="quick-link">
        <li><a href="#">Home</a></li>
        <li><a href="#">Log in</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">Popular tags</a></li>
      </ul>
    </div>
    <div class="col-xs-12 col-md-4">
      <h3>FOLLOW US:</h3>
      <div class="social-icon text-left"> <a href="#"><img src="<?php echo site_url();?>assets/images/facebook.png"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/rssfeed.png"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/twitter.png"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/google-plus.png"></a> </div>
    </div>
  </div>
  </footer>
  <div class="copyright text-center">Copyright  © Mewat Engineering College. 2014 All rights reserved </div>
</div>
<div id="modal" class="popupContainer" style="display:none;">
  <header class="popupHeader"> <span class="header_title">Login</span> <span class="modal_close"><i class="fa fa-times"></i></span> </header>
  <section class="popupBody">
    <!-- Social Login -->
    <div class="social_login">
      <div class=""> <a href="<?= $facebook_login_url ?>" class="social_box fb modal_close"> <span class="icon"><i class="fa fa-facebook"></i></span> <span class="icon_title">Connect with Facebook</span> </a> <a href="#" class="social_box google"> <span class="icon"><i class="fa fa-google-plus"></i></span> <span class="icon_title">Connect with Google</span> </a> </div>
      <div class="centeredText"> <span>Or use your Email address</span> </div>
      <div class="action_btns">
        <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
        <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
      </div>
    </div>
    <!-- Username & Password Login form -->
    <div class="user_login">
      <form>
        <label>Email / Username</label>
        <input type="text" />
        <br />
        <label>Password</label>
        <input type="password" />
        <br />
        <div class="checkbox">
          <input id="remember" type="checkbox" />
          <label for="remember">Remember me on this computer</label>
        </div>
        <div class="action_btns">
          <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
          <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
        </div>
      </form>
      <a href="#" class="forgot_password">Forgot password?</a> </div>
    <!-- Register Form -->
    <div class="user_register">
      <form>
        <label>Full Name</label>
        <input type="text" />
        <br />
        <label>Email Address</label>
        <input type="email" />
        <br />
        <label>Password</label>
        <input type="password" />
        <br />
        <div class="checkbox">
          <input id="send_updates" type="checkbox" />
          <label for="send_updates">Send me occasional email updates</label>
        </div>
        <div class="action_btns">
          <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
          <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
        </div>
      </form>
    </div>
  </section>
</div>
<script type="text/javascript">
	$("#modal_trigger,#modal_trigger_home,#btn_hot_home,#btn_cold_home").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
<script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
	var preview_img = document.getElementById('deal_image');
    preview_img.src = URL.createObjectURL(event.target.files[0]);
	
  };
</script>



<script type="text/javascript">
function makeAjaxCall(){
	
	var deal_id  	= $("#dealid").val();	
	var user_id  	= $("#userid").val();
	var comment 	= $("#comment").val();
	if(comment == '')
	{
	alert('comment cannot be blank');
	}
	else
	{
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/submitdeal/postcomment",
		data: "deal_id="+deal_id+"&user_id="+user_id+"&comment="+comment,
        cache: false,               
        success: function(data){		
		  $('#comment-list').prepend(data);
		  $('#comment').val('');
		}

		});
		}
return false;
}
</script>

<script type="text/javascript">
function makeDealCold(deal_id){
	
	var deal_id  	= deal_id;	
	var isCold 		= 'cold';
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/home/make_hot_cold",
		data: "deal_id="+deal_id+"&is_cold="+isCold,
        cache: false,               
        success: function(data){		
		  $('#degree'+deal_id).text(data);
		  $('#btn_cold'+deal_id).removeClass("btn-success").addClass("btn_disable");
		  $('#btn_hot'+deal_id).removeClass("btn-danger").addClass("btn_disable");
		}

		});

	return false;
}
</script>

<script type="text/javascript">
function makeDealHot(deal_id){
	var deal_id  	= deal_id;	
	var isCold 		= 'hot';
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/home/make_hot_cold",
		data: "deal_id="+deal_id+"&is_cold="+isCold,
        cache: false,               
        success: function(data){		
		  $('#degree'+deal_id).text(data);
		  $('#btn_cold'+deal_id).removeClass("btn-success").addClass("btn_disable");
		  $('#btn_hot'+deal_id).removeClass("btn-danger").addClass("btn_disable");
		}

		});

	return false;
}
</script>

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo site_url();?>assets/js/validator.min.js"></script>
<script src="<?php echo site_url();?>assets/js/application.js"></script>

</body></html>