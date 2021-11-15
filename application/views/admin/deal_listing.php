<div class="row">
  <div class="col-md-12">
      <div class="middle-body">
       <div style="padding:0px 0px 10px 0;"> 
       <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/addNotification">Add Notification</a> </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Title</th>
            <th>View Deal</th>
            <th>Posted On</th>
            <th>Submited By</th>
            <th>Action</th>
            </tr>
            </thead>
          <tbody>
          
          <?php foreach ($deals as $row): ?>
    		<tr>
        	<td><?php echo $row['deal_title'];?></td>
            <td><a target="_blank" href="<?php echo $row['deal_url'];?>">View Deal</a>  </td>
			<td><?php echo date_format(new DateTime($row['deal_posted_date']),'d/m/Y');?></td>
        	<td><?php echo $row['name'];?></td>
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
