<?php 
include "../includes/config.php";
include "../models/UserModel.php";

$db=connectdb();
$user = new User($db);
if (isset($_POST)){
    
    if(userExists($_POST["email"])){
        header("Location: registration.php?error=1&msg=user already exists");
        die;
    }
    if($_POST["pass1"] != $_POST["pass2"]){
        header("Location: registration.php?error=2&msg=password does not match");
        die;
    }
    $pass=password_hash($_POST["pass1"],PASSWORD_DEFAULT);
    $data=array(
        "name"=>$_POST["full-name"],
        "email"=>$_POST["email"],
        "role_id"=>$_POST["designation"],
        "password"=>$pass
    );
    $result=$user->insertUser($data);
    print_r($result);


    
    
}

function userExists($email){
    global $user;
    $result = $user->getUserByEmail($email);
    if(count($result)==0){
        return false;
    }
    return true;
}

?>