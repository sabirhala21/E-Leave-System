<?php
   include ('config.php');
   $id=$_GET['id'];
  $query="select * from studentreg where id='$id'";
  $exe=mysqli_query($conn,$query);
  $raw=mysqli_fetch_array($exe);
 ?>
<!DOCTYPE html>
<html>
    <head>
        
      <?php include_once('include/header.php');  ?>
      <title>Welcome To e-Leave System</title>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once('include/student_header.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/studentmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <ol class="breadcrumb">
                        <li><a href="student_das.php"><i class="fa pull-right"></i> Profile </a></li>
                    </ol>
                <!-- Main content -->
                <section class="content">
                    <form method="post" id="news-form" name="news-form" enctype="multipart/form-data" novalidate="novalidate" action="action.php">
                    <div class="wrapper wrapper-content animated fadeInRight" style="min-height: 510px;"> 
                    <div class="row">                          
                        <div class="col-sm-6">
                        <legend style="background-color: gray; text-align: center;">Profile</legend>    
                        <div class="form-group">
                                <label>First Name: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the First Name."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text" name="fname" id="word_title" value="<?php echo $raw['firstname']; ?>" required="" aria-required="true">
                                
                                <input type="hidden" name="hidden_id" value="">
                                                               
                            </div>
                            <div class="form-group">
                                <label>Last Name: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Last Name."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text"  name="lname" id="word_title" value="<?php echo $raw['lastname']; ?>" required="" aria-required="true">
                                                           
                            </div>

                            <div class="form-group">
                                <label>DOB: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Date Of Birth."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="date" name="dob" id="word_title"  required="" aria-required="true" value="<?php echo $raw['dob']; ?>">
                                                           
                            </div>
                               <div class="form-group">
                                <label>Gender : <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please select Gender."> <span class="glyphicon glyphicon-info-sign menu-icon"> </span>    </a> </label>
                               
                                 <select class="form-control" name="gender" id="quizlevel" required="" aria-required="true" >
                                                          <option value="<?php echo $raw['gender']; ?>"><?php echo $raw['gender']; ?></option>
                                                                 <option value="Male"> Male</option> 
                                                             <option value="Femal"> Female</option> 
                                                               </select>
                                 </div>     
                             
                        <div class="form-group">
                                <label>Email: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Email."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="email" name="email" id="word_title" value="<?php echo $raw['email']; ?>" required="" aria-required="true">
                                                           
                            </div>
                        <div class="form-group">
                                <label>Department : <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please select Department."> <span class="glyphicon glyphicon-info-sign menu-icon"> </span>    </a> </label>
                               
                                 <select class="form-control" name="dept" id="quizlevel" required="" aria-required="true">
                                    <option value="<?php echo $raw['department']; ?>"><?php echo $raw['department']; ?></option>
                                                                <?php

        $conn=mysqli_connect('localhost','root','','eleavesystem');
        $fetch=mysqli_query($conn,"select * from department");
        while ($raws=mysqli_fetch_array($fetch)) {

            echo "<option>".$raws["depname"]."</option>";
        }
    ?> 
                                                               </select>
                                 </div>  
                        <div class="form-group">
                                <label>Address: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Address."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input type="text"  class="form-control" type="text" name="address" id="word_title" required="" aria-required="true" rows="5" cols="5" value="<?php echo $raw['address']; ?>" >
                                    </textarea>
                                <input type="hidden" name="hidden_id" value="">
                        </div>
                        <div class="form-group">
                                <label>Mobile No <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Mobile No."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
                                <input class="form-control" type="text" name="mono" id="word_title" value="<?php echo $raw['mobile']; ?>" required="" aria-required="true" pattern ="[0-9]+" maxlength="10">
                                <input type="hidden" name="hidden_id" value="">
                        </div>
                                                
                      </div> <!--END col-sm-6-->
  
                    </div> <!--END row class-->
                <input class="form-control" type="hidden" placeholder="Question" name="hidden_id" id="hidden_id" value="<?php echo $raw['id']; ?>">
                <hr>
                <input type="submit" class="btn btn-primary" value="Update" id="btnnews" name="student_update">               
                <a href="student_das.php" class="btn btn-primary">Cancel</a>
                </div> <!--wrapper div end-->
                    </form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

       


        ?>
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