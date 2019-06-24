<?php
session_start( );
require('conexion.php');
$checkout=$_POST['date'];
$id_guest=$_SESSION['id_guest'];
echo $checkout;

$sql = "UPDATE checks SET checkout='$checkout' WHERE id_guest=$id_guest";

if ($mysqli->query($sql) === TRUE) {
  header('Location: room_status.php');
} else {
    echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();

 ?>
