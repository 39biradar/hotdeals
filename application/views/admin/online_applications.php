<div class="row">
  <div class="col-md-12">
      <div class="middle-body">
     
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
            <th>Reg. No</th>
            <th>Applicant Name</th>
            <th>Mobile</th>
            <th>Branch Preference</th>
            <th>Address</th>
            <th>Date</th>
            <th>Action</th>
            </tr>
            </thead>
          <tbody>
          
          <?php foreach ($onlineapplications as $row): ?>
    		<tr>
            <td><?php echo $row['registration_number'];?></td>
        	<td><?php echo $row['applicant_name'];?></td>
            <td><?php echo $row['mobile'];?></td>
        	<td><?php echo $row['branch_preference'];?></td>
            <td><?php echo $row['district'].' , '.$row['state'].' Pin : '.$row['pin']?></td>
        	<td><?php echo $row['datetime'];?></td>
            <td><a href="<?php echo site_url();?>admin/dashboard/applicationDetailsById/<?php echo $row['id']; ?>">Details</a> 
            <span> &nbsp;&nbsp; </span> 
            <a href="<?php echo site_url();?>admin/dashboard/deleteNotification/<?php echo $row['id']; ?>">Delete</a></td>
    		</tr>
		 <?php endforeach; ?>
          </tbody>
        </table>
       
      </div>
    </div>

</div>
<!--/.row-->
