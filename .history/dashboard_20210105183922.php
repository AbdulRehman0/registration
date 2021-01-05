<?php
include "./includes/config.php";
include "./models/UserModel.php";
session_start();
print_r($_SESSION);
if($_SESSION["session_id"]!=1){ session_destroy(); header("Location: login.php");die;}

$db=connectdb();

$user = new User($db);


if($_SESSION["session_role"]==1){
    $res = $user->getAllUsers(); 
}elseif($_SESSION["session_role"]==2){
    $res = $user->getUserByID($_SESSION["id"]);
}else{
    session_destroy(); header("Location: login.php");die;
}
?>