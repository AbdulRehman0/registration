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

include "./templates/header.php";
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



<?php
include "./templates/footer.php";
?>