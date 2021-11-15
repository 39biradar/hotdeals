<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
    <div style="padding:15px 0px 10px 10px;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/examinationListing">Show Examination</a> </div>
      
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
    <div class="panel-body"> <?php echo form_open_multipart('admin/dashboard/addExamination'. $id =!'' ? '/'.$id : '') ?>
      <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Notice Regarding Students Exams" value="<?php echo set_value('title', $title); ?>" name="title" type="text" autofocus=""/>
      </div>
      <div class="form-group">
      
        <textarea class="form-control" placeholder="Notice Description" rows="3"  name="description" ><?php echo set_value('description',$description);?></textarea>
      </div>
      <div class="form-group">
        <input placeholder="From Date" id="calendar"  name="fromdate" value="<?php echo set_value('fromdate',$fromdate); ?>" type="text" class="date-picker form-control" />
      </div>
      <div class="form-group">
        <input  placeholder="To Date" id="calendar1" name="todate"  value="<?php echo set_value('todate',$todate); ?>" type="text" class="date-picker form-control" />
      </div>
      <div class="form-group">
        <input type="file" name="userfile">
      </div>
      <input class="btn btn-primary" type="submit" value="Submit"/>
      </fieldset>
      <?php echo  form_close(); ?> </div>
  </div>
</div>
</div>
<!--/.row-->
