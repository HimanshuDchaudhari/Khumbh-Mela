<?php 
session_start();
error_reporting(0);
include('include/Config.php');
include('include/create.php');
if(strlen($_SESSION['user'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$email=$_SESSION['user'];  
$fname=$_POST['fullanme'];
$adhar=$_POST['adharNo'];
$address = $_POST['address'];
$sql="update pilgrim set pilgrim_name='$fname',pilgrim_adhar='$adhar',pilgrim_address='$address'  where email='$email'";
mysqli_query($con,$sql);
echo '<script>alert("Your profile has been updated")</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>E-Khumbh Mela | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="Asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="Asset/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="Asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
    <link href="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!------MENU SECTION START-->

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12"> `
                    <h4 class="header-line">My Profile</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Profile
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post">
                            <?php 
                                $Email=$_SESSION['user'];
                                $sql="SELECT * FROM  pilgrim  where email='$Email' ";
                                $result=mysqli_query($con,$sql);
                                $cnt=1;

                                $row=mysqli_fetch_array($result);
                                            ?>  

                                <div class="form-group">
                                    <label>Enroll ID : </label>
                                    <?php echo htmlentities($row['pilgrim_id']);?>
                                </div>

                                <div class="form-group">
                                    <label>Enter Full Name</label>
                                    <input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($row['pilgrim_name']);?>" autocomplete="off" required />
                                </div>


                                <div class="form-group">
                                    <label>Aadhar No :</label>
                                    <input class="form-control" type="text" name="adharNo" maxlength="11" value="<?php echo htmlentities($row['pilgrim_adhar']);?>" autocomplete="off" required />
                                </div>
                                        
                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($row['email']);?>"  autocomplete="off" required readonly />
                                </div>

                                <div class="form-group">
                                    <label>Enter Address</label>
                                    <textarea class="form-control" name="address"  id="address" rows="5" value=""><?php echo htmlentities($row['pilgrim_address']);?></textarea>
                                </div>
                              
                                <button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
     <!-- CONTENT-WRAPPER SECTION END-->

    <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>
</body>
</html>
<?php } ?>
    <?php include('include/footer.php');?>