<?php
if($_SESSION["session_id"]!=true){ session_destroy(); header("Location: login.php");die;}

if($_SESSION["role_id"]==1){

}elseif($_SESSION["role_id"]==2){

}

?>