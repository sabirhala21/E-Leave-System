<?php
   include_once('config.php');
 ?>
<!DOCTYPE html>
           <?php 
					 ?>

           
                    <div class="row">
                        <div class="col-xs-12">                           
                            <div class="box">                               
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <th>No.</th>                                             
                                                 <th>Student Name</th>  
                                                 <th>Leave Type</th>
                                                 <th>Posting Date</th>   
                                                 <th>Status</th>
                                                 <th>Action</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
										 	$Srno=0;
										 	$query="select studentleave.mentorid,empreg.id,empreg.firstname from studentleave join empreg on studentleave.empid=empreg.id where studentleave.mentorid=11";
                                            $result = mysqli_query($conn,$query);
                                            if (mysqli_num_rows($result))
											{
                         
												while($row = mysqli_fetch_array($result))
												{	
													$Srno++;
                            echo $row['firstname'];
                             }}                     
										
                                            
									   ?>        
                                        </tbody>
                                        
                                        
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                   </form>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php include_once('include/jscript.php'); ?>
  

    </body>
</html>