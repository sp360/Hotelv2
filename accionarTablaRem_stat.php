<?php
session_start( );
require('conexion.php');

$_SESSION['id_guestextras']=$_POST['id_guestextras'];
$id_guestextras=$_SESSION['id_guestextras'];

$sql = "DELETE FROM guest_extras WHERE id_guestextras=$id_guestextras";

if ($mysqli->query($sql) === TRUE) {
  header('Location: room_status.php');

} else {
    echo "Error deleting record: " . $mysqli->error;
}

$mysqli->close();


 ?>
