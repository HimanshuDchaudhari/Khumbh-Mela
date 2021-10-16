<?php 
session_start();
error_reporting(0);
include('include/create.php');
include('include/Config.php');
if($_SESSION['Admin']!='')
{
	$_SESSION['Admin']='';
	
}

if(isset($_POST['login']))
{
	$adhar = $_POST['adhar'];
	$password = $_POST['password'];
	
	
		$sql = "SELECT * FROM admin_list WHERE admin_adhar='$adhar' and admin_password='$password'";	
		$result = mysqli_query($con,$sql);
		$cnt = mysqli_num_rows($result);
	
		if($cnt>=1)
		{
			echo "<script>alert('Login Sucessful');</script>" ;
			$_SESSION["Admin"]= $adhar;
			header('location:Admin/dashboard.php');
		}
		else{
			header('location:./adminLogin.php');
			}
        
              
    
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

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
<div class="content-wrapper">
 <div class="container">
  <div class="row pad-botm">
   <div class="col-md-12">
    <h4 class="header-line">ADMIN LOGIN FORM</h4>
   </div>
  </div>
             
<!--LOGIN PANEL START-->           
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
    <div class="panel panel-info">
     <div class="panel-heading">
 	LOGIN FORM
     </div>
     <div class="panel-body">
      <form role="form" method="post">
       <div class="form-group">
        <label>Enter Adhar No</label>
        <input class="form-control" type="number" name="adhar" autocomplete="off" required />
       </div>
       <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" autocomplete="off" required />
       </div>
       
        <button type="submit" name="login" class="btn btn-info">LOGIN </button>
      </form>
     </div>
    </div>
   </div>
  </div>  
<!---LOGIN PABNEL END-->            
             
 
 </div>
</div>
        <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>


</body>
</html>
<?php include('include/footer.php');?>