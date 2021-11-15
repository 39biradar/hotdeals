<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
    <div style="padding:15px 0px 10px 10px;"> 
<?php echo form_open_multipart('admin/dashboard/update_deal',array('data-toggle' => 'validator','role' => 'form','id' => 'submitdeal')); ?>
<fieldset>
<input type="hidden" id="dealid" name="dealid" placeholder="" value="<?php echo $deals['id'];?>" />
<label>Deal URL</label>
<div class="form-group">
  <input class="form-control" type="text" id="url" name="url"  data-error="Deal url can't be empty !" value="<?php echo set_value('deal url', $deals['deal_url']); ?>" autofocus="" required/>
  <div class="help-block with-errors"></div>
</div>
<label>Deal Title</label>
<div class="form-group">
  <input class="form-control" type="text" id="title" name="title" placeholder=" Enter Title " autofocus="" 
  value="<?php echo set_value('title', $deals['deal_title']); ?>" data-error="Title can't be empty !" required/>
  <div class="help-block with-errors"></div>
</div>
<label>Price</label>
<div class="form-group">
  <input class="form-control" value="<?php echo set_value('price', $deals['deal_price']); ?>" type="text" id="price" name="price" placeholder=" Enter Price "  autofocus="" />
</div>
<label>Category</label>
<div class="form-group">
  <select class="form-control" name="category">
    <?php foreach($categories as $row)
            { 
			  if(strcmp($deals['category_name'],$row['category_name']) ==0 ) {
              echo '<option selected="selected" value="'.$row['id'].'">'.$row['category_name'].'</option>';
			  }
			  else
			  {
			  echo '<option  value="'.$row['id'].'">'.$row['category_name'].'</option>';
			  }
            }
            ?>
  </select>
</div>
<div class="form-group" >
<label>Enabled ?</label>
 <input type="checkbox" <?php echo $deals['deal_status'] == 1 ? 'checked="checked"' : '' ?>  name="is_disable" >
</div>
<label>Hot Count</label>
<div class="form-group">
  <input class="form-control" onkeypress='validate(event)' value="<?php echo set_value('hot count', $deals['deal_hot_count']); ?>" type="text" name="deal_hot_count" name="price" placeholder=""  autofocus="" />
</div>
<label>Deal Photo</label>
<div class="form-group"> <img id="output" src="<?php echo site_url();?>uploads/deal_thumb/<?php echo $deals['deal_image']?>" width="50%" style="margin-bottom:10px"/>
  <input type='file'  name='userfile' accept="image/*" onchange="loadFile(event)" />
</div>
<label>Details</label>
<div class="form-group">
  <textarea class="form-control" id="details" type="text" data-error="Details can't be empty !" name="details" 
              placeholder="Describe the deal in your own words and explain to members why it is good deal ! " 
             value="" rows="5" required ><?php echo set_value('description', $deals['deal_desc']); ?></textarea>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <div class="text-center">
      <input class="btn btn-primary" type="submit"  value="Submit Deal"/>
   
  </div>
</div>
<?php echo  form_close(); ?>
</div>
</div>
</div>
<!--/.row-->
