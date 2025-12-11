<?php
   include 'config.php';
  
if( isset($_GET["id"]) ){
    $id = $_GET['id'];
    $sql = "DELETE FROM foods WHERE id = '$id'";

    $conn->query($sql);
}
header("Location: items_index.php");
exit;


?>