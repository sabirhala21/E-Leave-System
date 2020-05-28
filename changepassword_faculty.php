<?php
   include_once('config.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
        
      <?php include_once('include/header.php');  ?>
      <title>Welcome To e-Leave System</title>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once('include/faculty_header.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/facultymenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                 <ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Profile </a></li>
                        <li class="active">Leave History</li>
                        
                    </ol>
               
                <!-- Main content -->
                <section class="content">
                    <form method="post" id="news-form" name="news-form" enctype="multipart/form-data" novalidate="novalidate" action="action.php">

                         <?php 
          @session_start();
           echo $_SESSION['msg'];
            unset($_SESSION['msg']); ?>
            
                    <div class="wrapper wrapper-content animated fadeInRight" style="min-height: 510px;"> 
                    <div class="row">                          
                        <div class="col-sm-6">
                        <legend style="background-color: gray; text-align: center;">Change Password</legend>   
                        <div class="form-group">
                                <label>Current Password: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Current Password."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text" name="cpass" id="word_title" value="" required="" aria-required="true">
                                
                                <input type="hidden" name="hidden_id" value="">
                                                               
                            </div> 
                        <div class="form-group">
                                <label>New Password: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the New Password."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text" name="newpass" id="word_title" value="" required="" aria-required="true">
                                
                                <input type="hidden" name="hidden_id" value="">
                                                               
                            </div>
                            <div class="form-group">
                                <label>Confirm Password Name: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please Confirm the Password."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text"  name="confirmpass" id="word_title" value="" required="" aria-required="true">
                                                           
                            </div>
                                                
                      </div> <!--END col-sm-6-->
  
                    </div> <!--END row class-->
                <input class="form-control" type="hidden" placeholder="Question" name="hidden_id" id="hidden_id" value="<?php echo $_SESSION['id'] ?>">
                <hr>
                <input type="submit" class="btn btn-primary" value="Change" id="btnnews" name="change_facultypassword">               
                <a href="faculty_history.php" class="btn btn-primary">Cancel</a>
                </div> <!--wrapper div end-->
                    </form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php include_once('include/jscript.php'); ?>
        
<script type="text/javascript">
           $(function() {
                $("#example1").dataTable(
				{
					'iDisplayLength': 50
				});
                var checkAll = $('input.all');
    var checkboxes = $('input.check');

   // $('input').iCheck();

    checkAll.on('ifChecked ifUnchecked', function(event) {        
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });            
            });
        </script>
 <script>
function checkChecked(formname) {
    var anyBoxesChecked = false;
    $('#' + formname + ' input[type="checkbox"]').each(function() {
        if ($(this).is(":checked")) {
            anyBoxesChecked = true;
        }
    });
 
    if (anyBoxesChecked == false) {
      alert('Please select at least one checkbox');
      return false;
    } 
}
</script>
       

    </body>
</html>