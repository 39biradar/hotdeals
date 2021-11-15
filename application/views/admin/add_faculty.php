<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
    <div style="padding:15px 0px 10px 10px;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/facultyListing">Show Faculty List</a> </div>
      
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
    <div class="panel-body"> <?php echo form_open_multipart('admin/dashboard/add_faculty'. $id =!'' ? '/'.$id : '') ?>
      <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Faculty Name" value="<?php echo set_value('name', $name); ?>" name="name" 
        type="text" autofocus=""/>
      </div>
      <div class="form-group">
      <input class="form-control" placeholder="Designation" value="<?php echo set_value('designation', $designation); ?>" name="designation" 
        type="text" autofocus=""/>
      </div>
      <div class="form-group">
         
              <label>Department Name</label>
              <select class="form-control" name="department">
                <?php foreach($departments as $each){ ?>
        		<option <?php echo $department_id == $each['id'] ? 'selected' :'' ?>  value="<?php echo $each['id']; ?>"><?php echo $each['department']; ?></option>';
    			<?php } ?>
              </select>
            
      </div>
      <div class="form-group">
      <textarea class="form-control" placeholder="About Faculty Profile" rows="6"  name="profile" ><?php echo set_value('profile',$profile);?></textarea>
      </div>
      <div class="form-group">
      <label>Faculty Photo</label>
        <input type="file" name="userfile">
      </div>
      <input class="btn btn-primary" type="submit" value="Submit"/>
      </fieldset>
      <?php echo  form_close(); ?> </div>
  </div>
</div>
</div>
<!--/.row-->
