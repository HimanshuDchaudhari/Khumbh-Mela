<?php 
session_start();
error_reporting(0);
include('include/Config.php');

 if(isset($_POST['sub']))
 {
	 $email = $_POST['email'];
	 $pass = $_POST['newPassword'];
	 
	 $check_email = "SELECT * FROM pilgrim WHERE email = '$email'";
	 $result = mysqli_query($con,$check_email);
	 $count = mysqli_num_rows($result);
	 if($count>0){
	 $update_query="UPDATE pilgrim SET pilgrim_password = '$pass' WHERE email ='$email'";
	 mysqli_query($con,$update_query);
	 
	 ?>
       <script>
	   alert("Sucessfully change password");
	 </script>
       <?php
	 }
	  else{
		  ?>
              <script>
		  document.getElementById('span1').innerHTML ="Email does not exist";
		  </script>
              <?php
		  }
 }

?>
<?php include('include/create.php');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Forget Password</title>
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
	<div class="content-wrapper">
	 <div class="container">
	  <div class="row pad-botm">
	   <div class="col-md-12">
	     <h4 class="header-line">User Password Recovery</h4>
	   </div>
	  </div>
             
        <div class="row">
	   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
	    <div class="panel panel-info">
	     <div class="panel-heading">
              RECOVERY FORM
           </div>
           <div class="panel-body">
            <form role="form" name="chngpwd" method="post" onSubmit="return valid()">

             <div class="form-group">
              <label>Enter Reg Email id</label>
              <input class="form-control" type="email" name="email" required autocomplete="off" />
              <span id="span1"></span>
             </div>

		 <div class="form-group">
              <label>Password</label>
              <input class="form-control" id="newpass" type="password" name="newPassword" required autocomplete="off"  />
             </div>

             <div class="form-group">
              <label>ConfirmPassword</label>
              <input class="form-control" id="confirmpass" type="password" name="confirmpassword" required autocomplete="off"  />
              <span id="span"></span>
             </div>

             
              <input type="submit" value="change" name="sub" class="btn btn-info"> Change Password | <a href="index.php">Login</a>
      </form>
     </div>
    </div>
   </div>
  </div>  
 </div>
</div>

<script>
function valid(){
	var newpass = document.getElementById("newpass").value;
	var confirmpass = document.getElementById('confirmpass').value;
	  
	  if(newpass == confirmpass)
	  {
		  return true;
		  }
		  else{
			  document.getElementById('span').innerHTML = "Password not match";
			  newpass.value ="";
			  confirmpass.value="";
			  return false;
			  }
	
	}
</script>

</body>
</html>
<?php include('include/footer.php');?>

    <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>