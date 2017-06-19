<?php
  include "../resources/header_admin.php";
  if(isset($_POST['hid']))
  {
    mysqli_query($con, "INSERT INTO `teaches` (`fac_id`, `sub_code`, `year`) VALUES ('".$_POST["fact_name"]."', '".$_POST["subj_code"]."', '".$_POST["year"]."')") or die(mysqli_error($con));
  }
 ?>
 <script src="../vendors/jquery/dist/jquery.min.js"></script>
 <!-- jQuery custom content scroller -->
<!-- ===========================================================
		                       BEGIN PAGE
		 =========================================================== -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Validation</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="POST" action="" class="form-horizontal form-label-left" novalidate>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Year</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="year" id="year" class="select2_single form-control action" tabindex="-1">
                            <option selected="">Select Year</option>
                            <option value="1">First Year</option>
                            <option value="2">Second Year</option>
                            <option value="3">Thard Year</option>
                            <option value="4">Forth Year</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject Code</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subj_code" id="subj_code" class="select2_single form-control action" tabindex="-1">
                            <option selected="">Select Subject Code</option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Faculty Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fact_name" id="fact_name" class="select2_single form-control" tabindex="-1">
                            <option selected="">Select Faculty Name</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
            						  <input type="hidden" name="hid">
                        </div>
                      </div>
                    </form>
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
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
    var action = $(this).attr("id");
    var query = $(this).val();
    var result = '';
    if(action == "year")
    {
     result = 'subj_code';
    }
    else
    {
     result = 'fact_name';
    }
    $.ajax({
      url:"fatch_teaches_code.php",
      method:"POST",
      data:{action:action, query:query},
      success:function(data){
        $('#'+result).html(data);
      }
    })
  }
 });
});
</script>
<?php
  include "../resources/footer_all.php";
?>