<?php 
session_start();
error_reporting(0);
include('../include/Config.php');
include('../include/create.php');

$_SESSION['user'] = '';
if(strlen($_SESSION['Admin'])==0)
 {
	 header('location:../AdminLogin.php');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>E-Khumbh Mela | Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../Asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../Asset/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../Asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="../bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/create.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
            </div>
        </div>
             <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="manage-books.php"><div class="alert alert-success back-widget-set text-center">
                      <i class="fa fa-users fa-5x"></i>
<?php 

$sql ="SELECT * from pilgrim ";
$result= mysqli_query($con,$sql);
$listpilgrim = mysqli_num_rows($result);
?>


                            <h3><?php echo htmlentities($listpilgrim);
				    ?></h3>
                      No. Of Pilgrim
                        </div>
                        </a>
                    </div>

            
      
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="reg-students.php"><div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                            <?php 
				    
$sql1 ="SELECT * from item_list ";
$result1 = mysqli_query($con,$sql1);
$items = mysqli_num_rows($result1);
?>
                            <h3><?php  echo htmlentities($items);
				    ?></h3>
                           No. of Items
                        </div></a>
                    </div>

        </div>

 <div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="manage-authors.php"><div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-rupee fa-5x"></i>
<?php 

$sql2 ="SELECT * from donation_list ";
$result2=mysqli_query($con,$sql2);
$donation = mysqli_num_rows($result2);
?>


                            <h3><?php echo htmlentities($donation);
				    ?></h3>
                      No. of Donation
                        </div></a>
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
      <!-- CUSTOM SCRIPTS  -->
    <script src="../Asset/js/custom.js"></script>

</body>
</html>
<?php include('../include/footer.php');?>