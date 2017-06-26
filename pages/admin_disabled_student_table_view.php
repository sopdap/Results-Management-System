<?php
  include "../resources/header_admin.php";
 ?>
<!-- ===========================================================
		                       BEGIN PAGE
		 =========================================================== -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>USERS</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student <small>Disable Student Information</small></h2>
                    <div class="pull-right">
                      <a href="admin_disabled_student_pdf.php" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Roll No.</th>
						              <th>Registration No.</th>
						              <th>Department</th>
						              <th>Semester</th>
                          <th>Address</th>
                          <th>Email ID</th>
                          <th>Phone No.</th>
						              <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
              						<?php
              						$res=mysqli_query($con,"SELECT `student`.`reg_no`, `student`.`roll_no`, `student`.`user_id`, `student`.`name`, `student`.`address`, `student`.`phone_no`, `student`.`date_of_birth`, `student`.`sem`, `student`.`department`, `student`.`reg_date`, `student`.`last_log_in`, `users`.`email_id` FROM `student` JOIN `users` ON `student`.`user_id` = `users`.`user_id` WHERE `users`.`user_type`= 'Student' and `users`.`user_status`='1' ORDER BY `department`, `sem` ASC");
              						while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
              						{
              						?>
                        <tr>
                          <td><?php echo $row['name']; ?> </td>
                          <td><?php echo $row['roll_no']; ?> </td>
              					  <td><?php echo $row['reg_no']; ?> </td>
                          <td><?php echo $row['department']; ?> </td>
              						<td><?php echo $row['sem']; ?> </td>
              						<td><?php echo $row['address']; ?> </td>
              						<td><?php echo $row['email_id']; ?> </td>
              						<td><?php echo $row['phone_no']; ?> </td>
                          <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['user_id']; ?>"><i class="fa fa-folder"></i> View </button>
                            <a href="faculty_edit.php?id=<?php echo $row['user_id'];?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <span class='enable btn btn-success btn-xs' id="<?php echo $row['user_id']; ?>"><i class="fa fa-user"></i> Enable User </span>
                          </td>
                        </tr>

                        <!-- View Modal -->
                        <div class="modal fade" tabindex="-1" id="myModal<?php echo $row['user_id']; ?>" role="dialog">
                          <div class="modal-dialog" role="document">
                            <!-- View Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Student details</h2>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Name</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['name']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Roll No.</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['roll_no']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Registration No.</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['reg_no']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Address</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['address']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Phone No.</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['phone_no']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Email ID</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['email_id']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Date Of Birth</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['date_of_birth']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Department</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['department']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Semester</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['sem']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Registration Date</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['reg_date']; ?></p></div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">Last Login</div>
                                  <div class="col-md-6 col-sm-6 col-xs-12"><p><?php echo $row['last_log_in']; ?></p></div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="admin_subject_details_pdf.php?id=<?php echo $row['user_id']; ?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
<!--  ===========================================================
		                        END PAGE
  		=========================================================== -->
<?php
  include "../resources/footer_all.php";
?>
<script>
$(document).ready(function(){
 $('.enable').click(function(){
  var el = this;
  var enableid = this.id;
  $.ajax({
   url: 'enable_user.php',
   type: 'POST',
   data: { id:enableid },
   success: function(response){
    $(el).closest('tr').css('background','SpringGreen');
    $(el).closest('tr').fadeOut(800, function(){
     $(this).remove();
    });
   }
  });
 });
});
</script>
