<?php

session_start();
error_reporting(0);
include('../include/Config.php');
include('../include/create.php');
if(strlen($_SESSION['Admin'])==0)
    {   
header('location:../adminLogin.php');
}
else{ 
if(isset($_POST['update']))
{
	$name=$_POST['name'];
    $price=$_POST['price'];
    $avail=$_POST['avail'];
	$id=intval($_GET['itemid']);
	$update_sql = "UPDATE item_list SET item_name='$name', item_price='$price', item_avail='$avail' WHERE item_id='$id'";
	
	if( $_FILES['cover']['size'] > 0 && $_FILES['cover']['type']=='image/png')
        {
		    $tmp_name =$_FILES['cover']['tmp_name'];
		    $local = "../images/";
		    move_uploaded_file($tmp_name,$local.$category.'.png');
		    mysqli_query($con,$update_sql);
	
			echo "<script>alert('Update Sucessfully');</script>";
			header('location:manage-items.php');	
		    }else{
			    echo "<script>alert('Check file properly');</script>";
		}
	}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Khumbh Mela | Manage Categories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../Asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../Asset/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="../Asset/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../Asset/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="../bootstrap-5.1.2-examples/bootstrap-5.1.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
      <!------MENU SECTION START-->
<!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Edit category</h4>
                    </div>
	            </div>
            <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
        <div class="panel panel-info">
        <div class="panel-heading">
            Items Info
        </div>
 
        <div class="panel-body">
        <form role="form" method="post"  enctype="multipart/form-data">
            <?php 
                $id=intval($_GET['itemid']);
                $sql="SELECT * from item_list where item_id='$id'";
                $result = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result))
                    {               
                        ?> 
                        <div class="form-group">
                            <label>Item Name</label>
                            <input class="form-control" type="text" name="name" value="<?php echo htmlentities($row['item_name']);?>" required />
                        </div>
                        <div class="form-group">
                            <label>Item Price</label>
                            <input class="form-control" type="number" name="price" value="<?php echo htmlentities($row['item_price']);?>" required />
                        </div>
                        <div class="form-group">
                            <label>Item available</label>
                            <input class="form-control" type="number" name="avail" value="<?php echo htmlentities($row['item_avail']);?>" required />
                        </div>
                        <div class="form-group">
                            <label>Choose Cover img To Be Upload (.png)</label>
                            <input class="form-control"  id="userfile" type="file" name="cover" />
                        </div>
                        </br>          
            <?php } ?>
                    <button type="submit" name="update" class="btn btn-info">Update </button>

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