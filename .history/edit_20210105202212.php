<?php
include "./includes/config.php";
include "./models/UserModel.php";

session_start();
print_r($_SESSION);
if($_SESSION["session_id"]!=1){ session_destroy(); header("Location: login.php");die;}

$db=connectdb();

$user = new User($db);

if(isset($_GET["id"])){
    $res = $user->getAllUsers(); 
}else{
    session_destroy(); header("Location: login.php");die;
}


include "./templates/header.php";
?>





<?php
include "./templates/footer.php";
?>