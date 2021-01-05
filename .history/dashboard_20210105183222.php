<?php
include "/includes/config.php";
include "/models/UserModel.php";

if($_SESSION["session_id"]!=true){ session_destroy(); header("Location: login.php");die;}

$db=connectdb();

$user = new User($db);


if($_SESSION["role_id"]==1){
    $res = $user->getAllUsers(); 
}elseif($_SESSION["role_id"]==2){
    
}else{
    session_destroy(); header("Location: login.php");die;
}

?>