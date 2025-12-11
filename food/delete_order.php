<?php
   include 'config.php';
  
if( isset($_GET["id"]) ){
    $id = $_GET['id'];
    $sql = "DELETE FROM orders WHERE id = '$id'";

    $conn->query($sql);
}
header("Location: orders.php");
exit;


?>