<?php 
include "../includes/config.php";
include "../models/UserModel.php";

$db=connectdb();
$user = new User($db);
if (isset($_POST)){
    
    print_r($user->getUserByEmail($_POST["email"]));
    
}

function userExists($email){
    global $user;
}

?>