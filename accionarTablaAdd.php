<?php
session_start( );
require('conexion.php');
$_SESSION['id_extra']=$_POST['id_extra'];
$id_guest=$_SESSION['id_guest'];
$id_extra=$_SESSION['id_extra'];
$hoy = date("Y-m-d", strtotime("-1 day"));

$sql = "INSERT INTO `guest_extras` ( `id_guest`, `id_extra`, `pago`, `date`) VALUES ( '$id_guest', '$id_extra', 0, '$hoy')";

if ($mysqli->query($sql) === TRUE) {
  echo ' <script type="text/javascript">
  window.location="market.php";
</script>
';

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();




 ?>
