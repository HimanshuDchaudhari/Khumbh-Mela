<?php
session_start();
error_reporting(0);
 include('include/create.php');
 include('include/Config.php');
 $total1=0;
 $cookie = $_COOKIE['values'];
  
  $cookie = explode(",",$cookie);
  $count=(int)(count($cookie)/2);
if($_SESSION['user']!=''){
$_SESSION['user']='';
}

  

 if(isset($_POST['submit']))
 {
	      $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        if(isset($_POST['paymentMethod'])){
          $paymentmethod = $_POST['paymentMethod'];
      }

      $amount = $_POST['amount'];
      $msg = $_POST['message'];
      $sql = "INSERT INTO donation_list(donation_pil_id,donation_amount,donation_mode,donation_message) values ('101','$amount','$paymentmethod','$msg') ";
      mysqli_query($con,$sql);

      
      
      echo("<script>alert('Thanks You So Much For Your Constribution !!!!')</script>");
      
      header('location:donation.php');
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
    
    <link href="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/checkout/form-validation.css" rel="stylesheet">
<meta charset="utf-8">
<title>Login Page</title>
<style>
      .bd-placeholder-img {
        font-size: 6.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 8.5rem;
        }
      }
      .text-custom {
        font-size: 0.4cm;
      }
      .text-custom-heading {
        font-size: 0.6cm;
      }
    </style>
</head>


<body>
<div class="content-wrapper">
<div class="container-xxl">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="container-xxl">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="./images/mainLogo.png" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      
    </div>
    <form class="needs-validation" novalidate name="signup" method="post">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary  text-custom " >Donation Amount</span>
          <span class="badge bg-primary rounded-pill"> * </span>
        </h4>
        <ul class="list-group mb-3">
          
                    
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0" > Amount</h6>
                      <small class="text-muted">Message </small>
                    </div>
                    <span class="text-muted" id ="AmountDisplay">0.0</span>
                  </li>
          
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (INR)</span>
            <strong name="total" id="totalAmount">0.0</strong>
          </li>
        </ul>

        
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-custom-heading">Billing address</h4>
        <?php 
          $sql = "SELECT * FROM pilgrim WHERE email = 'himanshu2346@gmail.com';";
          $result = mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($result);
          $name = explode(" ",$row['pilgrim_name']);
        ?>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label text-custom">First name</label>
              <input type="text" name="fname" class="form-control text-custom" id="firstName" placeholder="" value="<?php echo($name[0]); ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label text-custom">Last name</label>
              <input type="text" name="lname" class="form-control text-custom" id="lastName" placeholder="" value="<?php echo($name[1]); ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="text-custom form-label">Addhar Card</label>
              <div class="input-group has-validation">
                
                <input type="text" name="username" class="form-control text-custom" value="<?php echo($row['pilgrim_adhar']); ?>" id="username" placeholder="Addhar Card" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-custom">Email</label>
              <input type="email" class="form-control text-custom" name="email" value="<?php echo($row['email']); ?>" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="form-group">
            <label for="email" class="form-label text-custom">Message</label>
                    <textarea class="form-control" name="message"  id="message" rows="5"></textarea>
            </div>

          <hr class="my-4">
          <div class="col-sm-12">
              <label for="amount" class="form-label text-custom">Enter Amount</label>
              <input type="number" name="amount" class="form-control text-custom" id="amount" placeholder="" value="" required onblur="document.getElementById('AmountDisplay').innerHTML=document.getElementById('totalAmount').innerHTML = document.getElementById('amount').value">
              <div class="invalid-feedback">
                Amount is required.
              </div>
            </div>
          <h4 class="mb-3 text-custom">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" value="creditcard" type="radio" class="form-check-input text-custom" checked required>
              <label class="form-check-label text-custom" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" value="debitcard" class="form-check-input text-custom" required>
              <label class="form-check-label text-custom" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" value="paypal" class="form-check-input text-custom" required>
              <label class="form-check-label text-custom" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label text-custom">Name on card</label>
              <input type="text" class="form-control text-custom" id="cc-name" placeholder="" name="cardname" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="text-custom form-label">Credit card number</label>
              <input type="text" class="form-control text-custom" id="cc-number" placeholder="" required name="cardnumber">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label text-custom">Expiration</label>
              <input type="text" class="form-control text-custom" id="cc-expiration" placeholder="" required name="expiration">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label text-custom">CVV</label>
              <input type="text" class="form-control " id="cc-cvv" placeholder="" required name="securitycode">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" >Donate</button>
        </form>
      </div>
    </div>
  </main>
</div>
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
    <script src="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="./bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/checkout/form-validation.js"></script>

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