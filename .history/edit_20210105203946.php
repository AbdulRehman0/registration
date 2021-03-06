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
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Edit</h2>
                    <form method="POST" action="./controllers/UserController.php">
                        
                        
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">name</label>
                                    <input class="input--style-4" type="text" name="name" value="<?php echo $res[0]["name"]?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="input--style-4" id="exampleInputPassword1" name="pass" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="login" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<div class="container">
<div class="card">
  <div class="card-body">
  <form method="POST" action="">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    
    <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>




<?php
include "./templates/footer.php";
?>