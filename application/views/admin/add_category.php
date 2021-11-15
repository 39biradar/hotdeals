<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
    <div style="padding:15px 0px 10px 10px;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard">Show Category</a> </div>
      
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if($this->session->flashdata('error')){  ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
    
    <?php echo validation_errors('<div class="color-red">'); ?>
    <div class="panel-body"> <?php echo form_open_multipart('admin/dashboard/addCategory'. $id =!'' ? '/'.$id : '') ?>
      <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Category Name" value="<?php echo set_value('category name', $category_name); ?>" name="category_name" type="text" autofocus=""/>
      </div>
      <label>Sequence</label>
<div class="form-group">
  <input class="form-control" onkeypress='validate(event)' value="<?php echo set_value('sequence', $sequence); ?>" type="text" name="sequence" placeholder=""  autofocus="" />
</div>
      
<div class="form-group" >
<label>Is Menu Category </label>
 <input type="checkbox" <?php echo $is_menu == 1 ? 'checked="checked"' : '' ?>  name="is_menu" >
</div>
<div class="form-group" >
<label>Status </label>
 <input type="checkbox" <?php echo $status == 1 ? 'checked="checked"' : '' ?>  name="status" >
</div>

<input class="btn btn-primary" type="submit" value="Submit"/>
</fieldset>
      <?php echo  form_close(); ?> </div>
</div>
</div>
</div>
<!--/.row-->
