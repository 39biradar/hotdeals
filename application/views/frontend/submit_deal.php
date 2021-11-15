<div class="content-main"> 
<div class="container bhwhite"> 
<div class="bs-example">   
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                   <div class="deal-box">
              <div class="col-xs-12 col-md-3">
                <div class="row"> <img id="deal_image" src="<?php echo site_url();?>assets/images/no-thumbnail.png" class="deal-box-thumb"> </div>
              </div>
              <div class="col-xs-12 col-md-9">
                
                <a class="deal_title" href="#"> <h3> <span id="preview_title"></span> </h3></a>
                <p style="max-height:62px;min-height:200px;overflow:hidden;"><span id="preview_description"></span> </p>
              </div>
            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="row"> 
<div class="col-xs-12 col-md-8"> 
<div class="col-xs-12 col-md-12"> 
<div class="row">
  <div class="col-xs-12 col-md-12 text-center" style="margin: 20px 0;">
    <h4>Submit a Deal Here</h4>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-12 text-center" style="margin: 20px 0;"> <?php echo $this->session->flashdata('success_msg'); ?>
   <?php echo $this->session->flashdata('error_msg'); ?> </div>
</div>

<?php echo form_open_multipart('submitdeal/postdeal',array('data-toggle' => 'validator','role' => 'form','id' => 'submitdeal')); ?>
<fieldset>
<label>Deal URL</label>
<div class="form-group">
  <input class="form-control" type="text" id="url" name="url"  data-error="Deal url can't be empty !" autofocus="" required/>
  <div class="help-block with-errors"></div>
</div>
<label>Deal Title</label>
<div class="form-group">
  <input class="form-control" type="text" id="title" name="title" placeholder=" Enter Title " autofocus="" data-error="Title can't be empty !" required/>
  <div class="help-block with-errors"></div>
</div>
<label>Price</label>
<div class="form-group">
  <input class="form-control" type="text" id="price" name="price" placeholder=" Enter Price "  autofocus="" />
</div>
<label>Category</label>
<div class="form-group">
  <select class="form-control" name="category">
    <?php foreach($categories as $row)
            { 
              echo '<option value="'.$row['id'].'">'.$row['category_name'].'</option>';
            }
            ?>
  </select>
</div>
<label>Deal Photo</label>
<div class="form-group"> 
<img id="output" width="50%" style="margin-bottom:10px"/>
  <input type='file'  name='userfile' accept="image/*" onchange="loadFile(event)" required/>
</div>
<label>Details</label>
<div class="form-group">

  <textarea class="form-control" id="details" type="text" data-error="Details can't be empty !" name="details" 
              placeholder="Describe the deal in your own words and explain to members why it is good deal ! " 
              rows="5" required ></textarea>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <div class="text-center">
  <div class="col-xs-12 col-md-6"> 
    <input class="btn btn-success" type="submit" style="min-width:60%;margin-top:10px;" value="Submit Deal"/>
    </div>
    <div class="col-xs-12 col-md-6"> 
    <a id="btn_preview" href="#" class="btn btn-success" style="color:#ffffff;min-width:60%;margin-top:10px;">Deal Preview</a>
    </div>
  </div>
</div>
<?php echo  form_close(); ?>
</div> 
</div>
<div class="col-xs-12 col-md-4">
  <div class="right-box" style="margin: 20px 0;">
    <h4 class="text-center">General Deal Submission Hints</h4>
    <p>Here are some tips to make sure that your new submission is helpful to everyone:</p>
    <ol class="roman-list">
      <li>Did you search our forums to make sure its not a repost?</li>
      <li>Include complete details about the price and savings.</li>
      <li>Include detailed information about the product.</li>
      <li>If there are any specific steps, to get the deal, please include them.</li>
    </ol>
  </div>
</div>
</div> 
</div>
</div> 
