<?php
session_start();
error_reporting(0);
 include('include/create.php');
 include('include/Config.php');
 $total1=0;
 $cookie = $_COOKIE['values'];
  $cookie = substr($cookie,0,strlen($cookie)-1);
  $cookie = explode(",",$cookie);
  $count=(int)(count($cookie)/2);
  if(strlen($_SESSION['user'])==0)
  {   
     header('location:index.php');
 }

  if(strlen($_COOKIE['values'])==0){
    echo("<script>alert('First Select Items Wants To Buy!!')</script>");
      header('location:items.php');}

 if(isset($_POST['submit']))
 {
	      $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];

        if(isset($_POST['country'])){
            $country = $_POST['country'];
        }
        if(isset($_POST['state'])){
          $state = $_POST['state'];
        }
        if(isset($_POST['paymentMethod'])){
          $paymentmethod = $_POST['paymentMethod'];
      }
      $cardname = $_POST['cardname'];
      $cardnumber = $_POST['cardnumber'];
      $expiration = $_POST['expiration'];
      $securitycode = $_POST['seacuritycode'];
      

      $sql = "INSERT INTO payment_list(pillgrim_id,payment_mode) values ('101','$paymentmethod') ";
      mysqli_query($con,$sql);

      $sql = "SELECT (payment_id) from payment_list ORDER BY payment_id DESC LIMIT 1;";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $payment_id = $row['payment_id'];
      for ($i =0 ; $i<count($cookie);$i++){
                
        $sql = "SELECT * FROM item_list WHERE item_id=".$cookie[$i].";";
        
        if($result = mysqli_query($con,$sql)){
          $row=mysqli_fetch_assoc($result);
          $total1 += ((float)$row['item_price'] * (float)$cookie[$i+1]);
          $id = $row['item_id'];
          $orders = $cookie[$i+1];
          
          $sql = "INSERT INTO pilgrim_order(payment_id,pilgrim_id,item_id,number_of_item) values ('$payment_id','101','$id','$orders') ";
          mysqli_query($con,$sql);
          $orders = 0;
          
        }
      }
      $sql = "UPDATE  payment_list SET payment_amount = '$total1' WHERE payment_id = '$payment_id'";
      mysqli_query($con,$sql);
      echo("<script>alert('Congratulations $fname,Your Order Successful!!!!')</script>");
      
      ?><script>document.cookie = 'values=;max-age=0'</script>");
      <?php 
      header('location:items.php');
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
<title>CheckOut Page</title>
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
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="./images/mainLogo.png" alt="" width="72" height="57">
      <h2>Checkout form</h2>
      
    </div>
    <form class="needs-validation" novalidate name="signup" method="post">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary  text-custom " >Your cart</span>
          <span class="badge bg-primary rounded-pill"> <?php echo("$count") ?> </span>
        </h4>
        <ul class="list-group mb-3">
          <?php
           
           $total = 0;
              
              for ($i =0 ; $i<count($cookie);$i++){
                
                  $sql = "SELECT * FROM item_list WHERE item_id=".$cookie[$i].";";
                  $result = mysqli_query($con,$sql);
                  $lines = mysqli_num_rows($result);
                  if($lines>0){
                    $count++;
                    echo("<script>alert('$i')</script>");
                    $row=mysqli_fetch_assoc($result);
                    $total += ((float)$row['item_price'] * (float)$cookie[$i+1]);
                    ?>
                    
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">  <?php echo($row['item_name']) ?></h6>
                      <small class="text-muted"><?php echo($row['item_name']) ?></small>
                    </div>
                    <span class="text-muted"><?php echo( $cookie[$i+1].' X '.$row['item_price']) ?></span>
                  </li><?php
                  }
            }
            $total1 = $total;
          ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (INR)</span>
            <strong name="total"><?php echo("$total") ?></strong>
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
              <label for="firstName" class="form-label text-custom" >First name</label>
              <input type="text" name="fname" class="form-control text-custom" id="firstName" placeholder="<?php echo($name[0]); ?>" value="<?php echo($name[0]); ?>" required>
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
              <label for="username" class="form-label text-custom">Aadhar No</label>
              <div class="input-group has-validation">
                
                <input type="text" name="username" class="form-control text-custom" id="username" placeholder="Aadhar No." value="<?php echo($row['pilgrim_adhar']); ?>" required>
              <div class="invalid-feedback">
                  Aadhar no is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label text-custom">Email</label>
              <input type="email" class="form-control text-custom" name="email" id="email" value="<?php echo($row['email']); ?>" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label text-custom">Address</label>
              <input type="text" class="form-control text-custom" name="address1" id="address" value="<?php echo($row['pilgrim_address']); ?>" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="col-md-5">
              <label for="country" class="form-label text-custom">Country</label>
              <select class="form-select text-custom" id="country" name="country" required>
                <option >Choose...</option>
                <option value="india">India</option>
                
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label text-custom">State</label>
              <select name="state" class="form-select text-custom" id="state" required>
                <option value="">Choose...</option>
                <option value="maharashtra">maharashtra</option>
                <option value="gujrat">gujrat</option>
                <option value="bihar">bihar</option>
                <option value="utterpradesh">Uttar pradesh</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" value="creditcard" type="radio" class="form-check-input text-custom" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" value="debitcard" class="form-check-input text-custom" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" value="paypal" class="text-custom form-check-input" required>
              <label class="form-check-label text-custom" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label text-custom">Name on card</label>
              <input type="text" class="form-control text-custom" id="cc-name" placeholder="" name="cardname" required>
              <small class="text-muted ">Full name as displayed on card</small>
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
              <input type="text" class="form-control text-custom" id="cc-cvv" placeholder="" required name="securitycode">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" >Continue to checkout</button>
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