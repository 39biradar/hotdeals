<div class="row">
  <div class="col-md-12">
      <div class="middle-body">
       <div style="padding:0px 0px 10px 0;"> 
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Login Type</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            </thead>
          <tbody>
          
          <?php foreach ($users as $row): ?>
    		<tr>
        	<td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
			<td><?php echo $row['gender'];?></td>
        	<td><?php echo $row['login_type'];?></td>
            <td><?php echo $row['status'] == 1 ?'active' : 'inactive'?></td>
            <td><a href="<?php echo site_url();?>admin/dashboard/edit_deal/<?php echo $row['id']; ?>">Edit</a> 
            <span> &nbsp;&nbsp; </span> 
            <a href="<?php echo site_url();?>admin/dashboard/deleteDeal/<?php echo $row['id']; ?>">Delete</a></td>
    		</tr>
		 <?php endforeach; ?>
          </tbody>
        </table>
       
      </div>
    </div>

</div>
<!--/.row-->
