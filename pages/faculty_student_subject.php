<?php
include "../resources/header_faculty.php";
 ?>
 <!-- ===========================================================
 		                       BEGIN PAGE
 		 =========================================================== -->
         <!-- page content -->
         <div class="right_col" role="main">
           <div class="">
             <div class="page-title">
               <div class="title_left">
                 <h3>TEACHES</h3>
               </div>
             </div>

             <div class="clearfix"></div>

             <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                   <div class="x_title">
                     <h2>Teaches Details <small>List of topic teaches for the teacher</small></h2>
                     <div class="pull-right">
                     </div>
                     <div class="clearfix"></div>
                   </div>

                   <div class="x_content">
                     <table id="datatable" class="table table-striped table-bordered">
                       <thead>
                         <tr>
                           <th>Subject Name</th>
                           <th>Subject CODE</th>
                           <th>Semester</th>
                           <th>Action</th>
                         </tr>
                       </thead>
               				<tbody>
                 					<?php
                              $fac = mysqli_query($con,"SELECT `fac_id` FROM `faculty` WHERE `user_id` = '".$_SESSION['id']."'");
                              $fac_id = mysqli_fetch_array($fac, MYSQLI_ASSOC);
                 							$res=mysqli_query($con,"SELECT `teaches`.`sub_code`, `teaches`.`sem`, `subject`.`sub_name` FROM `teaches` JOIN `subject` ON `subject`.`sub_code` = `teaches`.`sub_code` WHERE `fac_id` = '".$fac_id['fac_id']."' ORDER BY `teaches`.`sem` ASC");
                 							while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                 							{
                 						?>
               						<tr>
                            <td><?php echo $row['sub_name']; ?> </td>
               							<td><?php echo $row['sub_code']; ?> </td>
               							<td><?php echo $row['sem']; ?> </td>
               							<td>
                              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['sub_code']; ?>"><i class="fa fa-folder"></i> Student List </button>
                              <a class="btn btn-primary btn-xs" href="faculty_submit_marks.php?id=<?php echo $row['sub_code']; ?>"><i class="fa fa-folder"></i> Submit Marks </a>
               							</td>
               						</tr>

                          <!-- View Modal -->
                          <div class="modal fade" tabindex="-1" id="myModal<?php echo $row['sub_code']; ?>" role="dialog">
                            <div class="modal-dialog" role="document">
                              <!-- View Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h2 class="modal-title">Student details</h2>
                                </div>
                                <div class="modal-body">
                                  <?php $result=mysqli_query($con,"SELECT `takes`.`roll_no`, `takes`.`sub_code`, `student`.`name`, `student`.`reg_no` FROM `takes` JOIN `student` ON `takes`.`roll_no` = `student`.`roll_no` WHERE `takes`.`sub_code` = '".$row['sub_code']."'");
                                  while($stu=mysqli_fetch_array($result,MYSQLI_ASSOC))
                                  { ?>
                                  <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12"><?php echo $stu['name']; ?></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12"><?php echo $stu['reg_no']; ?></div>
                                    <div class="col-md-4 col-sm-4 col-xs-12"><?php echo $stu['roll_no']; ?></div>
                                  </div>
                                  <?php } ?>
                                </div>
                                <div class="modal-footer">
                                  <a href="admin_faculty_view_pdf.php?id=<?php echo $row['user_id']; ?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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
