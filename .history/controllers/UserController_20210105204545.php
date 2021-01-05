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
        "password"=>$pass,
        "phone"=$_POST["phone"]
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
    print_r($result);
    if($result){
        if(password_verify($postPass, $result[0]["password"])){
            session_start();
            $_SESSION["session_id"]=true;
            $_SESSION["name"]=$result[0]["name"];
            $_SESSION["email"]=$result[0]["email"];
            $_SESSION["id"]=$result[0]["id"];
            $_SESSION["session_role"]=$result[0]["role_id"];
            header("Location: ../dashboard.php");
            die;
        }
    }
    echo "password or user name is incorrect";
    die;


}

if(isset($_GET["id"]) && isset($_GET["func"])){
    if(function_exists($_GET["func"])){
        call_user_func($_GET["func"],$_GET["id"]);
    }
    header("Location: ../dashboard.php");
}

function userExists($email){
    global $user;
    $result = $user->getUserByEmail($email);
    
    if(count($result)==0){
        return false;
    }
    return true;
}
function deleteUser($id){
    global $user;
    $user->deleteUserByID($id);
}

?>