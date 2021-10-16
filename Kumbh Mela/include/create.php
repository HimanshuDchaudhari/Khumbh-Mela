<div class="navbar navbar-inverse set-radius-zero" >

        <div class="container">
        <div class="container d-flex flex-wrap">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
      
                </button>
                <?php if($_SESSION['Admin']){ ?>
                  <a class="navbar-brand" >
                    <img src="../images/mainLogo.png" height="60" width="250" />
                </a>
                <?php }else {?>
                  <a class="navbar-brand" >
                    <img src="./images/mainLogo.png" height="60" width="250" />
                </a>
                 
                 <?php 
                }
                    ?>
                
            </div>
</div>
<?php if($_SESSION['user'])
{
?>
            <div class="container d-flex flex-row-reverse">
            
                <center>   <span style="font-size:18px"><?php echo $_SESSION['user'];?></span></center>
            </div>
                   
            <?php }?>
            <?php if($_SESSION['Admin'])
{
?>
            <div class="container d-flex flex-row-reverse">
            
                <center>   <span style="font-size:18px"><?php echo "Admin Panel";?></span></center>
            </div>
                   
            <?php }?>

        </div>
    </div>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['user'])
{
?>    
<section class="menu-section">
<div class="container d-flex flex-row-reverse">
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="font-size: 0.4cm; font-weight:bold">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link px-lg-5" href="items.php">Shop <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link px-lg-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu px-lg-5 " style="font-size: 0.4cm; font-weight:bold" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user-forget-password.php">Change Password</a>
          <a class="dropdown-item" href="profile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="getpayments.php">Payments</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link px-lg-5" href="receipt.php">Book Slot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-lg-5" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link danger btn btn-outline-danger btn-lg px-4 px-lg-5" href="logout.php">Log Out</a>
      </li>
    </ul>
    
  </div>
</nav>    
</div>  
</section>
    <?php }
    else if ($_SESSION['Admin']){
        ?>
       <section class="menu-section">
<div class="container d-flex flex-row-reverse">
<nav class="navbar navbar-expand-lg navbar-light bg-light " style="font-size: 0.4cm; font-weight:bold">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link px-lg-5" href="dashboard.php">Dashboard</a>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link px-lg-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Item
        </a>
        <div class="dropdown-menu px-lg-5 " style="font-size: 0.4cm; font-weight:bold" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="addItems.php">Add Items</a>
          <a class="dropdown-item" href="manage-items.php">Manage-Items</a>
        </div>
      
      <li class="nav-item dropdown">
        <a class="nav-link px-lg-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Slots
        </a>
        <div class="dropdown-menu px-lg-5 " style="font-size: 0.4cm; font-weight:bold" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="manage-ghat.php">Manage-Ghat</a>
          <a class="dropdown-item" href="manage-slot.php">manage-Slots</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="getpayments.php">Manage-Ghat and Time</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link px-lg-5" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link danger btn btn-outline-danger btn-lg px-4 px-lg-5" href="../logout.php">Log Out</a>
      </li>
    </ul>
    
  </div>
</nav>    
</div>  
</section>
        <?php

    }
    
    
    else { ?>
        <section class="menu-section">
    
    <div class="container d-flex flex-row-reverse">
      
      <ul class="nav py-3 px-3" style="font-size: 0.4cm; font-weight:bold">
      <li class="nav-item"><a href="adminLogin.php" class="nav-link link-dark px-2">Admin Login</a></li>
        <li class="nav-item me-2"><a href="index.php" class="nav-link link-dark px-2">User Login</a></li>
        <li class="nav-item"><a href="signup.php" class="nav-link link-dark px-2">User Sign up</a></li>
      </ul>
    </div>
  
  
    </section>

    <?php } ?>
