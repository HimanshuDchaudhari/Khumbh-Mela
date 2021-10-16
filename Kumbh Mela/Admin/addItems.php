<?php
session_start();
error_reporting(0);
include('../include/Config.php');
include('../include/create.php');
if(strlen($_SESSION['Admin'])==0)
    {   
header('location:../AdminLogin.php');
}
else{ 

if(isset($_POST['create']))
{
	
    $name  = $_POST['item'];
    $price = $_POST['price'];
    $avail = $_POST['avail'];
    $check="SELECT * FROM item_list WHERE item_name='$name'";
    $check_result =mysqli_query($con,$check);
    if(mysqli_num_rows($check_result)>0)
    {
        ?>
            <script>alert('Already Exist');</script>
        <?php
        header('location:addItems.php');
        }
        if( $_FILES['cover']['size'] > 0 && $_FILES['cover']['type']=='image/png')
            {
                $tmp_name =$_FILES['cover']['tmp_name'];
                $local = "../images/";
                move_uploaded_file($tmp_name,$local.$name.'.png');
                $sql="INSERT INTO  item_list(item_name,item_price,item_avail) VALUES('$name','$price','$avail')";
                mysqli_query($con,$sql);
                echo "<script>alert('Insert Sucessfully');</script>";
        }else{
            echo "<script>alert('Check Onces again...')</script>";
            }
    ?>

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
    <title>E-khumbh Mela | Add items</title>
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
<?php include('include/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
         <div class="container">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Items</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Item Info
</div>
<div class="panel-body">
<form role="form" method="post" form enctype="multipart/form-data">
    <div class="form-group">
        <label>item Name</label>
        <input class="form-control" type="text" name="item"  autocomplete="off" required />
    </div>
    <div class="form-group">
        <label>item Price</label>
        <input class="form-control" type="number" name="price"  autocomplete="off" required />
    </div>
    <div class="form-group">
        <label>item available</label>
        <input class="form-control" type="number" name="avail"  autocomplete="off" required />
    </div>
<div class="form-group">
<label>Choose Cover img To Be Upload (.png)</label>
          
                <input class="form-control"  id="userfile" type="file" name="cover" />
</div>
</br>          
<button type="submit" name="create" class="btn btn-info">Create </button>

 </form>
  </div>
  </div>
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
<?php } ?>
<?php include('../include/footer.php');?>