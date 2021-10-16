<?php 
session_start();
error_reporting(0);
include('include/Config.php');
include('include/create.php');

if(strlen($_SESSION['user'])==0)
{
  header("location:index.php");
}

    if(isset($_POST['update']))
        {
            
            $email = $_SESSION['user'];
            $sql = "SELECT pilgrim_id FROM pilgrim WHERE email='$email'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            $pilgrim_id = $row['pilgrim_id'];

            $sql = "SELECT * FROM receipts_list WHERE pilgrim_id='$pilgrim_id'";
            $result = mysqli_query($con,$sql);

            if (mysqli_num_rows($result)==1){
                echo("<script>alert('Dear $email, You Can book Only one Ticket!')</script>");    
                header('location:items.php');
            }

            $count = $_POST['count'];
            
            for($i=1 ;$i<=$count;$i++){
                $fullname = $_POST['fullName'.$i];
                $adhar = $_POST['adharNo'.$i];
                $relation = $_POST['relation'.$i];
            
                $sql = "INSERT INTO traveller_list (name,adhar,relationship,pilgrim_id) values ('$fullname','$adhar','$relation','$pilgrim_id') ";
                mysqli_query($con,$sql);
            

            }
            $slot_ghat_id = $_POST['ghat_no'];
            $no_of_pilgrim = (int)$count+1;
            
            $sql = "INSERT INTO receipts_list ( pilgrim_id, slot_ghat_id, no_of_pligrim) VALUES ( '$pilgrim_id', '$slot_ghat_id', '$no_of_pilgrim');";
            mysqli_query($con,$sql) or die("something");
        

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
<style>
.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}
.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}
.innerfrom{
    margin-left : 32px;
}
</style>
</head>


<body>        
<div class="content-wrapper">
         <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12"> `
                    <h4 class="header-line">Receipt</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                           Receipt
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
                                    <input class="form-control" readonly type="text" name="fullanme" value="<?php echo htmlentities($row['pilgrim_name']);?>" autocomplete="off" required />
                                </div>


                                <div class="form-group">
                                    <label>Aadhar No :</label>
                                    <input class="form-control" readonly type="text" name="adharNo" maxlength="11" value="<?php echo htmlentities($row['pilgrim_adhar']);?>" autocomplete="off" required />
                                </div>
                                        
                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($row['email']);?>"  autocomplete="off" required readonly />
                                </div>

                                <div class="form-group">
                                    <label>Enter Address</label>
                                    <textarea class="form-control" readonly name="address"  id="address" rows="5" value=""><?php echo htmlentities($row['pilgrim_address']);?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Select Ghat</label>
                                    <?php 
                                        $sql = "SELECT a.id,a.curr_capacity, b.slot_time , c.ghat_no
                                        FROM slot_ghat a
                                       INNER JOIN slot_list b ON b.slot_id = a.slot_id
                                       INNER JOIN ghat_list c ON c.ghat_no = a.ghat_id
                                       ORDER BY c.ghat_no;";
                                        $result = mysqli_query($con,$sql);

                                        ?><select style="font-size:15px" name="ghat_no" id="ghat_no"  class="form-control" ><?php
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                          
                                            <option value="<?php echo $row['id'] ?>"><?php echo 'Ghat No :'.$row['ghat_no'].' --> Time: '.$row['slot_time'].' -->capacity: '.$row['curr_capacity'] ?>  </option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                </div>

                                <div class="form-group" >
                                    <label>With:-</label>
                                        <div class="form-group innerform" id="inputspace">
                                            
                                            
                                            
                                        </div>
                                            <hr class="innerfrom"  style="border-top:3px dotted #bbb" >
                                        
                                    <input type="button"  class="btn btn-primary innerfrom" onclick="add()" id="submit" value="+ Add"/>
                                    <input type="text" style="border:0px" name="count" id="count" readonly value="0" />
                                </div>
                                

                                <button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div></body>
                <script>
                    var count = 0;
                 function add()
		        {
                        var fields =[
                            [ 'Enter Name :','form-group innerfrom', 'text', 'fullName'  ],
                            [ 'Enter Aadhar No :','form-group innerfrom', 'number', 'adharNo'   ],
                            [ 'Relation :','form-group innerfrom', 'text', 'relation'  ]
                        ]
                        count++;
                        document.getElementById('count').value = count;
                        outerEle = document.createElement('DIV');
                        outerEle.setAttribute('class','form-group innerfrom'); 
                        var brk = document.createElement('hr');    
                        brk.setAttribute('class','innerfrom'); 
                        for (var i=0 ;l1 = fields.length; i<l1,i++){
                            
                            var innerelement = document.createElement('INPUT');
                            var innerlabel = document.createElement('label');
                            

                            innerlabel.setAttribute('class','innerfrom');
                            
                            
                            
                                innerlabel.textContent = fields[i][0];
                                
                                innerelement.setAttribute('class',fields[i][1]); 
                                innerelement.setAttribute('type',fields[i][2]);
                                innerelement.setAttribute('name', (fields[i][3])+count); 
                                 
                                var add = document.getElementById('inputspace');
                                
                                add.appendChild(outerEle); 
                                outerEle.appendChild(innerlabel); 
                                outerEle.appendChild(innerelement); 
                            
                        }
                        
                        add.appendChild(brk); 
                            
                 }
                </script>

              <script>
		//   function go(events){
        //     document.cookie = "slot=;max-age=0"
		// 	      var index = document.getElementById('ghat_no').selectedIndex;
        //             document.cookie = "slot="+index+";";
        //             location.reload();
			    
		// 	  }
		  </script>
             <script src="Asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="Asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="Asset/js/custom.js"></script>

</html>
<?php 
include('footer.php');


?>