<style type="text/css">
td, th {
	padding: 2px;
}
.col_width_1 {
	width:30%;
	vertical-align:top;
	text-align:left;
}
.col_width_2 {
	width:70%;
	vertical-align:top;
	text-align:left;
}
</style>
<div class="row">
  <div class="col-md-12">
    <div class="middle-body">
      <div align="center" style="padding:10px;width:80%;margin:0 auto;">
        <table width="100%" cellspacing="2" cellpadding="2" border="0" id="areaToPrint" style="font-size:12px;border:1px solid #333;line-height:20px;padding:10px !important;">
          <tbody>
            <tr>
              <td valign="top" width="30%" align="left" style="text-align:left; border-bottom:1px dashed #333;padding-left:10px;">
              <img width="80" height="100"  alt="MECW" src="<?php echo base_url();?>assets/images/logo.png"></td>
              <td valign="middle" width="70%" align="left" style="text-align:left; border-bottom:1px dashed #333;font-size:18px;
              line-height:24px !important;"> Application Form (For B.Tech. 2016-17) </td>
            </tr>
            <tr>
              <td class="col_width_1" style="text-align:center;border-bottom:1px dashed #333;" colspan="2">
              <h1 style="font-family:Arial,Helvetica,sans-serif;font-size:16px;margin:10px !important;">Application for  - <?php echo $application_details['branch_preference'];	?></h1></td>
            </tr>
            <tr>
              <td valign="top" colspan="2" align="left" style="border-bottom:1px dashed #333;"><table width="100%" cellspacing="2" cellpadding="2" border="0">
                  <tbody>
                    <tr>
                      <td class="col_width_1"><strong>REGISTRATION NO:<br>
                        </strong></td>
                      <td class="col_width_2"><strong><?php echo $application_details['registration_number']; ?></strong></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="col_width_1" colspan="2"><table width="100%" cellspacing="2" cellpadding="2" border="0">
                  <tbody style="padding:10px !important;">
                    <tr>
                      <td class="col_width_1"><strong>Applicant Name 	:</strong></td>
                      <td class="col_width_2"><?php echo $application_details['applicant_name'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Father's Name :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['father_name'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Mobile :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['mobile'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Parent's Mobile :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['parent_mobile'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>DOB :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['dob'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Gender :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['gender'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Category :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['category'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Qualifying Exam :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['qualifying_exam'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Address :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['district'].' ,'.$application_details['state'].' Pin Code '.$application_details['pin'];	?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Transport Facility ? :</strong></td>
                      <td class="col_width_2"><strong>
                        <?php  echo $application_details['is_transport_facility_req'] == 1 ?  'Yes' : 'No'; ?>
                        </strong></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Hostel Facility ? :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['is_hostel_req'] == 1 ?  'Yes' :  'No'; ?></td>
                    </tr>
                    <tr>
                      <td class="col_width_1"><strong>Applied On :</strong></td>
                      <td class="col_width_2"><?php echo $application_details['datetime'];	?></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr> </tr>
          </tbody>
        </table>
        <div>
          <div style="padding:15px 0px 10px 10px;">
            <input class="btn btn-primary" type="submit" onclick="printDiv()" value="Print" name="print"/>
            <a class="btn btn-primary" href="<?php echo site_url();?>admin/dashboard/onlineApplicationListing">Show All Applications</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/.row-->
