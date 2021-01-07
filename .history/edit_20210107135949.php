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
                        
                    <input  type="hidden" name="id" value="<?php echo $_GET['id'];?>" required>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="name" value="<?php echo $res[0]["name"]?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label class="label">Phone</label>
                                    <input class="input--style-4" type="tel" name="phone" value="<?php echo $res[0]["phone"]?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Old Password</label>
                                    <input type="password" class="input--style-4" id="exampleInputPassword1" name="old-pass" placeholder="Password" >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" class="input--style-4" id="exampleInputPassword1" name="new-pass" placeholder="Password" >
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="update" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>





<?php
include "./templates/footer.php";
if(isset($_GET["msg"])){
    echo "<script>$(document).ready(function(){alert('".$_GET["msg"]."');window.location.replace('edit.php?id=".$_GET["id"]."');});</script>";
    // header("Location: edit.php?id=".$_GET["id"]);
}
?>