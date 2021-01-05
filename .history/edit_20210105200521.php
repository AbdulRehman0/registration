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
if($_SESSION["session_role"]==1){
    $res = $user->getAllUsers(); 
}elseif($_SESSION["session_role"]==2){
    $res = $user->getUserByID($_SESSION["id"]);
}else{
    
}

include "./templates/header.php";
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">designation</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($res as $row): if($row["role_id"]==1) $des="Admin"; else $des="Editor"?>
    <tr>
    <td><?php echo $row["name"];?></td>
    <td><?php echo $row["email"];?></td>
    <td><?php echo $des;?></td>
    <td><a href="./controllers/edit.php?id=<?php echo $row["id"]?>" class="float-left"><span>Edit<span></a><?php if($_SESSION['session_role']==1 && $row["id"]!=$_SESSION['id']):?><a href="./controllers/UserController.php?id=<?php echo $row["id"]?>&func=deleteUser" class="center"><span>Delete<span></a><?php endif;?></td>
    </tr>
    <?php endforeach;?>
    
  </tbody>
</table>



<?php
include "./templates/footer.php";
?>