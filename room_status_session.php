<?php
session_start( );
require('conexion.php');
$_SESSION['room_id']=$_POST['room_id'];
$room_id=$_SESSION['room_id'];
$_SESSION['categoria']=$_POST['categoria'];
$_SESSION['estado']=$_POST['estado'];
$_SESSION['precio']=$_POST['precio'];
// header('Location: room_status.php');


$sql = "SELECT * FROM roomguest where room_id=$room_id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['id_guest']=$row['id_guest'];
        header('Location: room_status.php');

    }

} else {
    echo "0 results";
}
$mysqli->close();



 ?>
