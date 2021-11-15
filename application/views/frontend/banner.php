<div class="row banner">
  <!--<div class="col-xs-12 col-md-8">
    <div class="row"> <img src="<?php echo site_url();?>assets/images/banner.jpg" class="img-responsive"> </div>
  </div>-->
  <div class="col-xs-12 col-md-4">
    <div class="row">
      <div class="banner-right">
        <ul>
        <?php $count=0; foreach($categories as $row) { if($row['is_menu']==0 && $count<8) { ?>   
                  
            <li><a  href="<?php echo site_url(); ?>submitdeal/category/<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></a></li>
            <?php $count++; }} ?>
          <!--<li><a href="#">Things to Do</a></li>
          <li><a href="#">Food & Drink</a></li>
          <li><a href="#">Electronics</a></li>
          <li><a href="#">Travel</a></li>
          <li><a href="#">House hold</a></li>
          <li><a href="#">Health & Fitness</a></li>
          <li><a href="#">Beauty & Spas</a></li>
          <li><a href="#">Delivery & Takeout</a></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>
