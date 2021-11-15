<div class="content-main">
  <div class="container bhwhite" style="padding-top:10px;">
    <!-- banner starts here -->
    <?php /*?><?php $this->load->view('frontend/banner'); ?><?php */?>
    <!-- banner ends here -->
    <div class="row">
      <div class="col-xs-12 col-md-8" style="min-height:300px;">
        <div class="col-xs-12 col-md-12">
        	
           <?php if(count($deals) < 1) { ?>
                       <div class="deal-box" style="text-align:center;"> <h3>No Deals found in this category !</h3> </div>
           <?php } ?>        
          <?php foreach($deals as $row)
            { ?>
          <div class="row">
            <div class="deal-box">
              <div class="col-xs-12 col-md-3">
                <div class="row"><img src="<?php echo site_url();?>uploads/deal_thumb/<?php echo $row['deal_thumbnail'];?>" class="deal-box-thumb"></div>
              <center>
            <a class="btn btn-danger" target="_blank" style="width:90%;color:#fff;margin-top:15px;" href="<?php echo $row['deal_url'];?>">Get Deal</a>
          </center>
              </div>
              <div class="col-xs-12 col-md-9">
                <div class="col-xs-12 col-md-3 pull-right" style="padding-right:3px !important;">
                  <div class="row deal-right">                  
                    <div class="hot-box"><h3><span id="degree<?php echo $row['id'];?>"><?php echo $row['deal_hot_count'];?></span><sup>o</sup></h3></div>
                <?php if($this->session->userdata('email')!='') { ?> <!-- if user is logedin -->
				<?php $btn_class_hot =''; $btn_class_cold =''; if(in_array($row['id'], $my_hot_deals)){ $btn_class_hot = "btn btn_disable"; 
				$btn_class_cold ="btn btn_disable";} else {$btn_class_hot = "btn btn-danger";$btn_class_cold ="btn btn-success";}?>
                                       
                    <div class="hot-box"><button type ="button"  id="btn_hot<?php echo $row['id'];?>" onclick="return makeDealHot(<?php echo $row['id'];?>);" class="<?php echo $btn_class_hot;?>"><i class="glyphicon glyphicon-chevron-up white"></i><span style="padding-left:5px;">Hot</span></button></div>
                
                    <div class="hot-box"><button type ="button" id="btn_cold<?php echo $row['id'];?>" class="<?php echo $btn_class_cold; ?>" onclick="return makeDealCold(<?php echo $row['id'];?>);"><i class="glyphicon glyphicon-chevron-down white"></i><span style="padding-left:5px;">Cold</span></button></div>            <?php } else { ?> <!-- if user is not logedin then on click on btn show login popup -->
<div class="hot-box"><button type ="button"  id="btn_hot_home" href="#modal" class="btn btn-danger"><i class="glyphicon glyphicon-chevron-up white"></i><span style="padding-left:5px;">Hot</span></button></div>                   
                    <div class="hot-box"><button type ="button" id="btn_cold_home" href="#modal" class="btn btn-success"><i class="glyphicon glyphicon-chevron-down white"></i><span style="padding-left:5px;">Cold</span></button></div><?php } ?>                     
                  </div>
                </div>
                <a class="deal_title" href="<?php echo site_url();?>submitdeal/details/<?php echo $row['id'];?>"><h3><?php echo $row['deal_title'];?></h3></a>
                <p style="max-height:62px;min-height:62px;overflow:hidden;"><?php echo $row['deal_desc'];?></p>
                <div class="deal-details-bottom"> <span class="phase"><img src="<?php echo $row['profile_picture'];?>" class="phase-icon"><?php echo $row['name'];?> &nbsp;| &nbsp;</span> <span class="dealhot timeago" title="<?php echo date("c", strtotime($row['deal_posted_date'])); ?>"></span></div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-xs-12 col-md-4">
      <div class="banner-right">
        <ul>
        <?php $count=0; foreach($categories as $row) { if($row['is_menu']==0 && $count<8) { ?>   
                  
            <li><a  href="<?php echo site_url(); ?>submitdeal/category/<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
            <?php $count++; }} ?>
         
        </ul>
      </div>
        <div class="right-box_buttons">
          <div class="row">
          <?php if($this->session->userdata('email')!='') { ?>
            <div class="col-xs-12 col-md-12 text-center"><a href="<?php echo site_url();?>submitdeal" class="large_button">Submit Deal</a></div>
            <?php } else { ?>
            <div class="col-xs-12 col-md-12 text-center"><a id="modal_trigger_home" href="#modal" class="large_button">Submit Deal</a></div>
            <?php } ?>
          
          </div>
        </div>
        <?php $this->load->view('frontend/right_bar'); ?>
      </div>
      
    </div>
  </div>
</div>
