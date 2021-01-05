<?php 
include "../includes/config.php";
include "../models/UserModel.php";

$db=connectdb();
$user = new User($db);
if (isset($_POST["registartion"])){
    
    if(userExists($_POST["email"])){
        header("Location: ../registration.php?error=1&msg=user already exists");
        die;
    }
    if($_POST["pass1"] != $_POST["pass2"]){
        header("Location: ../registration.php?error=2&msg=password does not match");
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
    if($result){
        header("Location: ../login.php?error=0&msg=User has been added");die;
    }
die;
}
if(isset($_POST["login"])){
    $postEmail=$_POST["email"];
    $postPass=$_POST["pass"];
    $result= $user->getUserByEmail($postEmail);
    print_r($result[0]["password"]);
    if($result){
        if(password_verify($postEmail, $result[0]["password"])){
            echo "logged in";
            die;
        }
    }
    echo "password or user name is incorrect";
    die;


}

function userExists($email){
    global $user;
    $result = $user->getUserByEmail($email);
    print_r($result);
    if(count($result)==0){
        return false;
    }
    return true;
}

?>