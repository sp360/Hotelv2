<?php
require('conexion.php');
session_start( );

$pago=$_POST['pago'];
if ($pago==="0") {
  // code...
  $pago=0;
}
$suma=$_SESSION['suma'];
$scambio=$pago-$suma;
$id_guest=$_SESSION['id_guest'];
$id_room=$_SESSION['room_id'];

if ($pago<$suma) {
  // code...
  $_SESSION['validacion']="no";
  header('Location: room_status.php');
}else {
  $sql = "SELECT * FROM pago where id_guest=$id_guest";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $stotal=$row['total'];
          $cambiotpago=$row['cambio'];


      }
      $total=$stotal+$suma;
      $cambio=$scambio+$cambiotpago;



      $sql = "UPDATE pago SET total=$total, cambio=$cambio WHERE id_guest=$id_guest";

      if ($mysqli->query($sql) === TRUE) {


        $sql = "UPDATE guest_extras SET pago=1 WHERE id_guest=$id_guest";

        if ($mysqli->query($sql) === TRUE) {




          $sql = "DELETE FROM roomguest WHERE id_guest=$id_guest";

if ($mysqli->query($sql) === TRUE) {


  $sql = "UPDATE rooms SET estado='Disponible' WHERE room_id=$id_room";

  if ($mysqli->query($sql) === TRUE) {

      session_destroy();
    header('Location: index.php');
  } else {
      echo "Error updating record: " . $mysqli->error;
  }







} else {
    echo "Error deleting record: " . $mysqli->error;
}



       } else {
            echo "Error updating record: " . $mysqli->error;
        }











     } else {
          echo "Error updating record: " . $mysqli->error;
      }


  } else {
      echo "0 results";
  }
  $mysqli->close();



}

 ?>
