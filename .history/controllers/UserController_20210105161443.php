<?php 
include "../includes/config.php";
include "../models/UserModel.php";

$db=connectdb();
if (isset($_POST)){
    $user = new User($db);
    print_r($user->getUserByEmail($_POST["email"]));
    
}

?>