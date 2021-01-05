<?php
include "./includes/config.php";
include "./models/UserModel.php";

session_start();
// print_r($_SESSION);
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
<div class="container">
<div class="card">
  <div class="card-body">
  <form>
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $res[0]["name"]?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>




<?php
include "./templates/footer.php";
?>