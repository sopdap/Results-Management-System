<?php
include "../resources/connection.php";
if(isset($_POST['id'])){
  mysqli_query($con, "UPDATE `users` SET `user_status` = '1' WHERE `user_id` ='".$_POST['id']."'");
  echo 1;
}
?>