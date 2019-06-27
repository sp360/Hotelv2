<?php
session_start( );
$_SESSION['room_id']=$_POST['room_id'];
$_SESSION['categoria']=$_POST['categoria'];
$_SESSION['estado']=$_POST['estado'];
$_SESSION['precio']=$_POST['precio'];
header('Location: room_status.php');



 ?>
