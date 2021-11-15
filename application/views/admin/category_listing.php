<div class="row">
  <div class="col-md-12">
      <div class="middle-body">
       <div style="padding:0px 0px 10px 0;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/addCategory">Add Category</a> </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Category Name</th>
            <th>Sequence</th>
            <th>Is Menu</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            </thead>
          <tbody>
          
          <?php foreach ($category as $row): ?>
    		<tr>
        	<td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['sequence'];?></td>
        	<td><?php echo $row['is_menu'];?></td>
        	<td><?php echo $row['status'] == 1 ? 'enabled' : 'disabled' ?></td>
            <td><a href="<?php echo site_url();?>admin/dashboard/addCategory/<?php echo $row['id']; ?>">Edit</a> 
            <span> &nbsp;&nbsp; </span> 
            <a href="<?php echo site_url();?>admin/dashboard/deleteCategory/<?php echo $row['id']; ?>">Delete</a></td>
    		</tr>
		 <?php endforeach; ?>
          </tbody>
        </table>
       
      </div>
    </div>

</div>
<!--/.row-->
