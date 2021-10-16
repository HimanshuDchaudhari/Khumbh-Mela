<?php
session_start();
error_reporting(0); 
include('include/create.php');
include('include/Config.php');

if($_SESSION['user']!=''){
  $_SESSION['user']='';
  }
  
if(isset($_POST['submit']))
{
 	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$fullname = $fname." ".$lname;
	$adhar = $_POST['adhar'];
	$mail = $_POST['email'];
  echo "<script>alert('Aadhar NO already register');</script>";
	$pass = $_POST['password'];
  $address = $_POST['address'];
	$emailerr='';
	$mobileerr='';
	$sql="SELECT email,pilgrim_adhar FROM pilgrim WHERE email='$mail' or pilgrim_adhar='$adhar'";
       $result=mysqli_query($con,$sql);
	 
	 $count = mysqli_num_rows($result);
	 if($count==1)
	 {
		$row = mysqli_fetch_assoc($result);
		
		if($mail==$row['email'])
		{
			echo "<script>alert('Email already register');</script>";
		}
		else if($adhar == $row['adhar'])
		{
			echo "<script>alert('Aadhar NO already register');</script>";
		}
	 }
	
      else{
        $sql = "INSERT INTO pilgrim (pilgrim_name,email,pilgrim_adhar,pilgrim_password,pilgrim_address) values ('$fullname','$mail','$adhar','$pass','$address');";
         mysqli_query($con,$sql);
	   $_SESSION['user']=$mail;	
	   header('location:items.php');
	}
   
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SignupForm</title>
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
<h4 class="header-line">SIGNUP FORM</h4>
</div>
</div>
<div class="content-wrapper">
      <div class="container">
        <div class="row">   
         <div class="col-md-9 col-md-offset-1">
           <div class="panel panel-danger">
            <div class="panel-heading">
                           SINGUP FORM
            </div>
            <div class="panel-body">
              <form name="signup" method="post" onSubmit="return dis();">
               <div class="form-group">
                 <label>Enter First Name</label>
                 <input class="form-control" type="text" name="fname" id="fname" autocomplete="off" required />
                   <span id="span1"></span>
                </div>
                
                <div class="form-group">
                 <label>Enter Last Name</label>
                 <input class="form-control" type="text" name="lname" id="lname" autocomplete="off" required />
                    <span id="span2"></span>
                </div>


                <div class="form-group">
                  <label>Enter Email :</label>
                  <input class="form-control" type="email" name="email" id="email"  autocomplete="off" required />
                    <span id="span3"></span>
                </div>
                                        
                <div class="form-group">
                 <label>Adhar No :</label>
                 <input class="form-control" type="number" name="adhar" id="adhar"   autocomplete="off" required  />
                 <span id="user-availability-status" style="font-size:12px;"></span> 
                    <span id="span4"></span>
                </div>

                <div class="form-group">
                 <label>Address :</label>
                 <textarea class="form-control" name="address"  id="address" rows="5" value=""></textarea>
                 <span id="user-availability-status" style="font-size:12px;"></span> 
                    <span id="span4"></span>
                </div>

                <div class="form-group">
                 <label>Enter Password</label>
                 <input class="form-control" type="password" name="password" id="pass" autocomplete="off" required  />
                    <span id="span5"></span>
                </div>

                <div class="form-group">
                  <label>Confirm Password </label>
                  <input class="form-control"  type="password" name="confirmpassword" id="con-pass" autocomplete="off" required  />
                    <span id="span6"></span>
                </div>
 
                <center><button type="submit" name="submit"  class="btn btn-danger" id="submit">Register Now </button></center>

               </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

    <script>
          function dis(){
              var fn = document.getElementById('fname').value;
              var fnreg = /^[a-zA-Z]+$/;
              var fname = fnreg.test(fn);
              var ln = document.getElementById('lname').value;
              var lname = fnreg.test(ln);
              
                if(fname==false){
                document.getElementById('span1').innerHTML="Enter name only!";
		    return false;
              }
              
                if(lname==false){
                document.getElementById('span2').innerHTML="Enter name only!";
		    return false;
              }
              
              
              
                var emailno = document.getElementById('email').value;
                var emailreg = /\w+@\w+\.\w{2,3}/;
                var email = emailreg.test(emailno);
              
                if(email==false){
                   document.getElementById('span4').innerHTML="Enter valid email!!";
			 return false;
                }
              
                var password = document.getElementById('pass').value;
                var passreg = /^[^\s]/;
                var pass = passreg.test(password);
              
                if(pass==false){
                   document.getElementById('span5').innerHTML="At the beggining space not allowed...";
			 return false;
                }
              
                var confirm = document.getElementById('con-pass').value;

                if(confirm!=password){
                   document.getElementById('span6').innerHTML="password not matched...";
			 return false;
                }
                alert("ok");
		    return true;
          }    
    
    </script>
        <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>

</body>
</html>

<?php include('include/footer.php');?>

