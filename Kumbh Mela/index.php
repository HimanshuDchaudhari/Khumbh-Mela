<?php
session_start();
error_reporting(0);
 include('include/create.php');
 include('include/Config.php');
 
if($_SESSION['user']!=''){
$_SESSION['user']='';
}

 if(isset($_POST['login']))
 {
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	
	 
	 
	 
	 $sql = "SELECT * FROM pilgrim WHERE email='$email' and pilgrim_password='$password';";
	 $result = mysqli_query($con,$sql);		 
	 $cnt = mysqli_num_rows($result);
	 
		if($cnt==1)
		 {
			 $_SESSION["user"] = $email;
			 header('location:items.php');	 
			 }
			 
	
      
 }


 ?>
<!doctype html>
<html>
<head>
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
<meta charset="utf-8">
<title>Login Page</title>
</head>


<body>
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
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
     <form onSubmit="return valid()" method="post">

      <div class="form-group">
        <label>Enter Email id</label>
        <input class="form-control" type="email" id="emailid" name="email" required autocomplete="off" />
        <span id="span4"></span>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" id="pass" name="password" required autocomplete="off"  />
        <p class="help-block"><a href="user-forget-password.php">Forgot Password</a></p>
      </div>

       
       <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
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
<script>
 function valid(){
	 var emailno = document.getElementById('emailid').value;
                var emailreg = /\w+@\w+\.\w{2,3}/;
                var email = emailreg.test(emailno);
              
                if(email==false){
                   document.getElementById('span4').innerHTML="Enter valid email!!";
			 document.getElementById('emailid').value = "";
			 document.getElementById('pass').value = "";
			 document.getElementById('varcode').value = "";
			 return false;
                }
	 return true;
	 }

</script>
<?php 

include('include/footer.php');?>