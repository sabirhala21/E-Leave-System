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
        <?php include_once('include/topheader.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/leftmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                 <ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Dashboard </a></li>
                        <li class="active">Department List</li>
                        
                    </ol>
               
                <!-- Main content -->
                <section class="wrapper content animated fadeInRight"> 
                 <form id="form_category" name="form_category" action="action.php" method="post" onSubmit="return checkChecked('form_category');">
                
				<div class="row">
                	<div class="col-sm-1">
						
                     </div>
                    
					<div class="col-sm-11">
						<a href="add_dep.php" class="btn btn-primary pull-right"><span class="fa fa-plus">&nbsp;Add New Deaprtment</span> </a>
                    </div>
                    
               </div>
               <!--message-->
           <?php 
					@session_start();
					 echo $_SESSION['msg'];
					  unset($_SESSION['msg']); ?>

           
                    <div class="row">
                        <div class="col-xs-12">                           
                            <div class="box">                               
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <th>No.</th>                                             
                                                 <th>Department id</th>  
                                                 <th>Department name</th> 
                                                 <th>Department Short Name</th>   
                                                 <th>Edit</th>
                                                 <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
										 	$Srno=0;
										 	$query="select * from department";
                                            $result = $dbc->Query($query);
                                            if ($result->num_rows > 0)
											{
												while($row = $result->fetch_assoc())
												{	
													$Srno++;
										 ?>
                                            <tr>
                                              <td style="width:50px"><?php echo $Srno; ?></td>                                    
                                              <td style="width:650px"><?php echo $row["depid"] ?></td>                   
                                              <td style="width:650px"><?php echo $row["depname"] ?></td>       
                                              <td style="width:650px"><?php echo $row["shortname"] ?></td>
									          
                                              <td style="width:50px"><a href="add_dep.php?id=<?php echo $row['id']; ?>&action=update"><i class="fa fa-edit"></i></a></td>
                                             <td style="width:50px"><div class="alert alert-danger fade in"><a href="action.php?id=<?php echo $row['id']; ?>&action=delete_dep""><i class="fa fa-trash-o"></i></a></div></td> 
                                        </tr>
									 <?php }} ?>           
                                        </tbody>
                                        
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
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