<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['user']);
unset($_SESSION['Admin']);
session_destroy(); // destroy session
//header("location:C:\xampp\htdocs\project 1\PHP\Admin\index.php"); 
?>
<script>
 window.location.replace("index.php");
</script>

