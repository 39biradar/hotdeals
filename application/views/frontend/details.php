<div class="content-main">
  <div class="container bhwhite">
    <div class="row deal-details" style="margin-top:20px;">
      <div class="col-xs-12 col-md-4">
        <div class="row">

            <img src="<?php echo site_url();?>uploads/deal_picture/<?php echo $deals['deal_image'];?>" class="deal-box-image">
          </center>
          <center>
            <h3>Price Rs : <?php echo $deals['deal_price'];?></h3>
          </center>
          <center>
            <a class="btn btn-danger" target="_blank" style="width:90%;color:#fff;margin-top:15px;" href="<?php echo $deals['deal_url'];?>">Get Deal</a>
          </center>
        </div>
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="col-xs-12 col-md-12">
          <div class="row">
            <div class="text-uppercase deal-details-title" style="margin-bottom:10px;">
              <h3><?php echo $deals['deal_title'];?></h3>
            </div>
            <div class="col-xs-12 col-md-9">
              <div class="deal-details-bottom"> <span class="phase"><img src="<?php echo $deals['profile_picture'];?>" class="phase-icon"><?php echo $deals['name'];?> &nbsp;| &nbsp; Posted </span> <span class="dealhot timeago" title="<?php echo date("c", strtotime($deals['deal_posted_date'])); ?>"></span></div>
              <div class="row social-icon-details"> <a href="#"><img src="<?php echo site_url();?>assets/images/facebook.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/rssfeed.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/twitter.png" class="top_social_icon"></a> <a href="#"><img src="<?php echo site_url();?>assets/images/google-plus.png" class="top_social_icon"></a> </div>
            </div>
            <div class="col-xs-12 col-md-3 pull-right">
              <div class="row deal-right">
                <div class="hot-box">
                  <h3><span id="degree<?php echo $deals['id'];?>"><?php echo $deals['deal_hot_count'];?></span><sup>o</sup></h3>
                </div>
                
              <?php if($this->session->userdata('email')!='') { ?> <!-- if user is logedin -->
              <div class="hot-box">
                <?php $btn_class_hot =''; $btn_class_cold =''; if(in_array($deals['id'], $my_hot_deals)){ $btn_class_hot = "btn btn_disable"; 
				$btn_class_cold ="btn btn_disable";} else {$btn_class_hot = "btn btn-danger";$btn_class_cold ="btn btn-success";}?>
                
                  <button type ="button" id="btn_hot<?php echo $deals['id'];?>" onclick="return makeDealHot(<?php echo $deals['id'];?>);" class="<?php echo $btn_class_hot; ?>"><i class="glyphicon glyphicon-chevron-up white"></i> <span style="padding-left:5px;">Hot</span></button>
                </div>
                <div class="hot-box">
                  <button type ="button" id="btn_cold<?php echo $deals['id'];?>" class="<?php echo $btn_class_cold; ?>" onclick="return makeDealCold(<?php echo $deals['id'];?>);"><i class="glyphicon glyphicon-chevron-down white"> </i><span style="padding-left:5px;">Cold</span></button>
                </div>
               <?php } else { ?> <!-- if user is not logedin then on click on btn show login popup -->
<div class="hot-box"><button type ="button"  id="btn_hot_home" href="#modal" class="btn btn-danger"><i class="glyphicon glyphicon-chevron-up white"></i><span style="padding-left:5px;">Hot</span></button></div>                   
                    <div class="hot-box"><button type ="button" id="btn_cold_home" href="#modal" class="btn btn-success"><i class="glyphicon glyphicon-chevron-down white"></i><span style="padding-left:5px;">Cold</span></button></div>
                <?php }?>
                
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <p style="min-height:200px;overflow:auto;"><?php echo $deals['deal_desc'];?></p>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top:20px;border-top:1px solid #ccc;padding:15px;" class="row">
      <div class="col-xs-12 col-md-12"> <span style="text-transform:uppercase;float:left;"> <?php echo sizeof($comments) ?> Comments </span>
        <button type="button" id="post_comment" class="btn btn-success" style="text-transform:uppercase;float:right;"><span> Post Comment</span></button>
      </div>
      <div class="col-xs-12 col-md-12" style="margin-top:10px;">
        <div class="comment">
        <?php if(sizeof($comments)>0){ ?>
          <?php } ?>
          <ul  id="comment-list" style="width:100%;">
            <?php  foreach($comments as $comment){ ?>
            <!--comment-->           
            <li><img height="70" width="60" src="<?php echo $comment->profile_picture; ?>"/>
            
            <span style="color:#006182;">
			<?php echo $comment->name;?></span> &nbsp;<span style="color:#ccc;" class='timeago' title="<?php echo date("c", $comment->date); ?>"></span>
              <p><?php echo $comment->message;?></p>
            </li>
            <?php  }  ?>
            <!--//comment-->
          </ul>
        </div>
      </div>
      <div id="div_post_comment" class="col-xs-12 col-md-12 text-center" style="margin:20px;">
        <h4>Post a Comment</h4>
        <form id="userForm" method="post" onsubmit="return makeAjaxCall();">
        <input type="hidden" id="dealid" name="dealid" placeholder="" value="<?php echo $deals['id'];?>" />
        <input type="hidden" id="userid" name="userid" placeholder="" value="<?php echo $this->session->userdata('userid');?>" />
        <div class="form-group">
          <textarea class="form-control" id="comment" type="text" data-error="Comment can't be empty !" name="comment" 
              placeholder="Post a Comment here about this deal only ! " 
              rows="5" required ></textarea>
          <div class="help-block with-errors"></div>
                  <?php if($this->session->userdata('email')!='') { ?> <!-- if user is logedin -->
                  <input type="submit" class="btn btn-success" style="text-transform:uppercase;float:right;" value="Post Comment"/>
<?php } else { ?> <!-- if user is not logedin then on click on btn show login popup -->
<input type="submit" class="btn btn-success" id="btn_cold_home" href="#modal" style="text-transform:uppercase;float:right;" value="Post Comment"/>
<?php } ?>

           </form>
        </div>
      </div>
    </div>
  </div>
</div>
