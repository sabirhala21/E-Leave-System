<?php 

	include_once('include/config.php'); 
?>
<aside class="left-side sidebar-offcanvas">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    <div class="user-panel">
       <div class="pull-left image"> <img src="user.png" class="img-circle" alt="User Image"> </div>
      <div class="pull-left info">
        <p>
          <?php 
									if(isset($_SESSION['username']))
										echo "Hello&nbsp;&nbsp;".$_SESSION['username'];
									else
										header("location:index.php");
									 ?>
        </p>
        
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <style type="text/css">
				 	.disp_none{
						display:none;
					}
					.disp_blck{
						display:block;						
					}
				 </style>
    <?php					
		 $s1=$s2=$s3=$s4=$s5=$s6=$s7 ='style="display:none"';
		$a1 = 'class="active"';
		$a2 = '';
		$a3 = '';
		$a4 = '';
		$a5 = '';
		$a6 = '';
		
		$sysuser=dirname($_SERVER['PHP_SELF']).'/sys_user.php';
		
		$category=dirname($_SERVER['PHP_SELF']).'/level.php';
		$addcategory=dirname($_SERVER['PHP_SELF']).'/add_level.php';
		$news=dirname($_SERVER['PHP_SELF']).'/news.php';
		$add_news=dirname($_SERVER['PHP_SELF']).'/add_Question.php';
	
	   if($_SERVER['PHP_SELF'] == '/welcome.php'){
			$a1 = 'class="active"';
		}
		if($_SERVER['PHP_SELF'] == $category){
			$a2 = 'class="active"';
			$a1 = '';
		}	
	   if($_SERVER['PHP_SELF'] == $add_category){
			$a2 = 'class="active"';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $category || $_SERVER['PHP_SELF'] == $add_category ){
			$a4 = 'active';
			$a1 = '';
		}
		
		
		if($_SERVER['PHP_SELF'] == $news){
			$a3 = 'class="active"';
			$a1 = '';
		}
		if($_SERVER['PHP_SELF'] == $add_news){
			$a3 = 'class="active"';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $news || $_SERVER['PHP_SELF'] == $add_news ){
			$a6 = 'active';
			$a1 = '';
		}
		
		if($_SERVER['PHP_SELF'] == $date_change){
			$a5 = 'class="active"';
			$a1 = '';
		}
		
		
	?>
    <ul class="sidebar-menu">
      <li <?php echo $a1; ?>><a href="das.php"><span>Profile</span><i class="glyphicon glyphicon-user" style="margin-left: 135px;"></i></a></li>
     
      <li class="treeview <?php echo $a4; ?>"> <a href="#"> <span>Manage Deaprtmentl</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li <?php echo $a2; ?>><a href="department.php"><i class="fa fa-angle-double-right"></i>Department List</a></li>
        </ul>
      </li>
     
      <li class="treeview <?php echo $a6; ?>"> <a href="#"> <span>Manage Leave Type</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
            <li <?php echo $a3; ?>><a href="leavetype.php"><i class="fa fa-angle-double-right"></i>Leave Type List</a></li>
        </ul>
      </li>
      <li class="treeview <?php echo $a6; ?>"> <a href="#"> <span>Leave Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
           <li <?php echo $a3; ?>><a href="allleave_principal.php"><i class="fa fa-angle-double-right"></i>All Leave</a></li>
            <li <?php echo $a3; ?>><a href="principal_pending.php"><i class="fa fa-angle-double-right"></i>Pending Leave </a></li>
            
        </ul>
      </li>
	   <li  <?php echo $a1; ?>><a href="index.php"><span>Log Out</span><i class="fa fa-home pull-right"></i></a></li>
		
	  
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
