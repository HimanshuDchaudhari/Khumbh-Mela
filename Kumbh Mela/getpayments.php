<?php 
session_start();
error_reporting(0);
include('include/Config.php');

if(strlen($_SESSION['user'])==0)
    {   
header('location:index.php');
}
    ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Khumbh Mela </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="Asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="Asset/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="Asset/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="Asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <!------MENU SECTION START-->
<?php include('include/create.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Payments</h4>
    </div>
    

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          List of Payments
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>sr no</th>
                                            <th>Payment Id</th>
                                            <th>Amount</th>
                                            <th>mode</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 


    $email = $_SESSION['user'];
    $sql = "SELECT a.pilgrim_id, a.pilgrim_name, b.* from pilgrim a, payment_list b WHERE a.email = '$email' AND  b.pillgrim_id = a.pilgrim_id";
	$result =mysqli_query($con,$sql);
	
$cnt=1;
while($row=mysqli_fetch_array($result)){
	
          ?>                                      
          <tr class="odd gradeX">
          <td class="center"><?php  echo htmlentities($cnt);?></td>
          <td class="center"><?php echo htmlentities($row['payment_id']);?></td>
          <td class="center"><?php echo htmlentities($row['payment_amount']);	 ?></td>
          <td class="center"><?php echo htmlentities($row['payment_mode']);	 ?></td>
          <td class="center"><?php echo htmlentities($row['date']);?></td>
       </tr>
 	 <?php  $cnt=$cnt+1; }?>                                 
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
</div>

     <!-- CONTENT-WRAPPER SECTION END-->
  
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="Asset/js/dataTables/jquery.dataTables.js"></script>
    <script src="Asset/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>

</body>
</html>
<?php //} ?>
<?php include('include/footer.php');?>