<?php
session_start();
error_reporting(0);
 include('include/create.php');
 include('include/Config.php');
 if(strlen($_SESSION['user'])==0)
 {   
    header('location:index.php');
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
<title>Items Page</title>
</head>


<body>
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">Items:-</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->  
<div>
  <form>
  <div class="input-group mb-3">
    <div class="input-group-text">
        Search Here
    </div>
      <input type="text" class="form-control" id="searchbox" onkeypress="search(document.getElementById('searchbox').value)" aria-label="Search Here">
</div>
  </form>
</div>         
<main>



  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
       $sql = "";
        if (strlen($_COOKIE['search'])){
          $sql = "SELECT * FROM item_list WHERE item_name LIKE '%".$_COOKIE['search']."'" ;
        }
        else
          $sql = "SELECT * FROM item_list";
        $result = mysqli_query($con,$sql);
          
          while($row=mysqli_fetch_assoc($result))
          {
            $imgsrc = "./images/".$row['item_name'].".png";
            ?>   
          
          <div class="col">
          <div class="card shadow-sm">
          <img src="<?php echo($imgsrc); ?>" class="bd-placeholder-img card-img-top" width="100%" alt="Unavailable" height="225" focusable="false" />
            

            <div class="card-body">
              <p class="card-text"><?php echo($row['item_name']);?></p>
              <div class="d-flex justify-content-between align-items-center">
                <?php if($row['item_avail']==0)
                        {
                            ?>
                              <button disable readonly class="btn btn-info btn-lg" > Out Of Stock</button>
                              <span id="<?php echo("Order".$row['item_name'] ) ?>"> 
                                0
                              </span>          
                            <?php
                        }
                        else{
                            ?>
                            <button class="btn btn-info btn-lg" onClick="add('<?php echo("Avail".$row['item_name'] ) ?>','<?php echo("Price".$row['item_name'] ) ?>','<?php echo("Order".$row['item_name'] ) ?>')"> Add to Card</button>
                    
                            <span id="<?php echo("Order".$row['item_name'] ) ?>"> 
                                0
                            </span>          
                            <?php
                        }
                
                ?>  
                    
                <h3 id="<?php echo("Price".$row['item_name'] ) ?>" class="text-muted"><?php echo("Price $ ".$row['item_price']); ?></h3>
                <h3 id="<?php echo("Avail".$row['item_name'] ) ?>" class="text-muted"><?php echo('Avail '.$row['item_avail']); ?></h3>
              </div>
            </div>
          </div>
        </div>
          
          <?php
          }
        
        ?>        
        
      </div>
      <h4><span id ="total">0</span></h4>
        <center style="margin=10px 10px 10px 10px">
            <button class="btn btn-info btn-lg" onClick="submit()" type="submit" > Submit</button>
        </center>
    </div>
  </div>
        
</main>
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
 function add(avail,price,order){
   
    var avail = (document.getElementById(avail).innerHTML).split(" ")[1];
    var amount = (document.getElementById(price).innerHTML).split(" ")[2];

    // Validation
    var val = document.getElementById(order).innerHTML = parseInt(document.getElementById(order).innerHTML)+1 ;
    document.getElementById('total').innerHTML = parseFloat(amount) + parseFloat(document.getElementById('total').innerHTML);
    


	 }

   function submit(){
     document.cookie = "values=;max-age=0"
     
     var count=0;
     var str = "values="
     <?php
    $sql = "SELECT * FROM item_list";
          $result = mysqli_query($con,$sql);
          
          while($row=mysqli_fetch_assoc($result))
          {?>
            
            var quantity =  document.getElementById('<?php echo('Order'.$row['item_name'] ) ?>').innerHTML;
            
            if (parseInt(quantity) != 0  ){
            str += "<?php echo($row['item_id']) ?>,"+quantity+","
            count++;
            }
            <?php
          }
          ?>
          alert(str);
          document.cookie = str+";";

          if(count!=0){
            window.location.href = "checkout.php";
          }
          else{
            alert("First Selects Items Want To Buy!!!")
            window.location.href = "items.php";
          }

          
          
   }
   function search(text){
     document.cookie = "search=;max-age=0"
     document.cookie = "search="+text+";"
     location.reload();
   }
  </script>
<?php 

include('include/footer.php');?>