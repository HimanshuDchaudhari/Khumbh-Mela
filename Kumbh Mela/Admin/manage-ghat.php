<?php
session_start();
error_reporting(0);

include('../include/Config.php');
include('../include/create.php');

if(strlen($_SESSION['Admin'])==0)
    {   
header('location:../adminLogin.php');
}
else{ 
if(isset($_GET['del']))
{
	$id = $_GET['del'];
	$del_sql ="DELETE FROM ghat_list WHERE ghat_no='$id'";
	mysqli_query($con,$del_sql);
	?>
	 <script>alert('Delete Sucessfully');</script>
	<?php
	
	}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Khumb Mela | Manage Ghats</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../Asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../Asset/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="../Asset/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../Asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="../bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <!------MENU SECTION START-->
<?php ?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Ghats</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Ghats Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center>#</center></th>
                                            <th><center>Ghat No</center></th>
                                            <th><center>Maximum Occupancy</center></th>
                                            <th><center>Type</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$cnt=1;
$sql = "SELECT * FROM ghat_list";
$result = mysqli_query($con,$sql);
   while($row= mysqli_fetch_array($result)){
    ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><center><?php echo htmlentities($cnt);?></center></td>
                                            <td class="center"><center><?php echo htmlentities($row['ghat_no']);?></center></td>
                                            <td class="center"><center><?php echo htmlentities($row['max_occupancy']);?></center></td>
                                            <td class="center"><center><?php echo htmlentities($row['ghat_type']);?></center></td>
                                          
                                            <td class="center">
								<center>
                                            <a href="edit-ghat.php?ghatid=<?php echo htmlentities($row['ghat_no']);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
                                          <a href="manage-ghat.php?del=<?php echo htmlentities($row['ghat_no']);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></a></center>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1; }?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->

      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="../Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../Asset/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="../Asset/js/dataTables/jquery.dataTables.js"></script>
    <script src="../Asset/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="../Asset/js/custom.js"></script>
</body>
</html>
<?php } ?>
  <?php include('../include/footer.php');?>