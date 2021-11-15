<div class="row">
  <div class="col-md-12">
      <div class="middle-body">
       <div style="padding:0px 0px 10px 0;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/add_faculty">Add Faculty</a> </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Photo</th>
            <th>Action</th>
            </tr>
            </thead>
          <tbody>
          
          <?php foreach ($faculty as $row): 
		    $department_name = '';
    		//get department name by id
			foreach($departments as $department)
			{
		 	if($row['department_id'] == $department['id'])
		 	$department_name =  $department['department'];
			}?>
            
            <tr>
        	<td><?php echo $row['name'];?></td>
            <td><?php echo $row['designation'];?></td>
        	<td><?php echo $department_name; ?></td>
        	<td><img  width="50" height="60" src="<?php echo site_url(); ?>uploads/faculty_pics/<?php echo $row['photo'];?> "/>  </td>
            <td><a href="<?php echo site_url();?>admin/dashboard/add_faculty/<?php echo $row['id']; ?>">Edit</a> 
            <span> &nbsp;&nbsp; </span> 
            <a href="<?php echo site_url();?>admin/dashboard/deleteFaculty/<?php echo $row['id']; ?>">Delete</a></td>
    		</tr>
		 <?php endforeach; ?>
          </tbody>
        </table>
       
      </div>
    </div>

</div>
<!--/.row-->
