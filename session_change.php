<?php
session_start( );
require('conexion.php');
$_SESSION['pago']=$_POST['pago'];
$_SESSION['tipopago']=$_POST['tipopago'];
$tipopago=$_SESSION['tipopago'];
$pago=$_SESSION['pago'];
$cargo=$_SESSION['cargototal'];
$checkout=$_SESSION['date'];
$id_guest=$_SESSION['id_guest'];
$room_id=$_SESSION['room_id'];
$cambio=$pago-$cargo;
if ($pago<$cargo) {
  $_SESSION['incorrecto']=1;
  header('Location: guest_due.php');
}else {
///INSERTAR TABLE CHECKS////
  $hoy = date("Y-m-d");

  $sql = "INSERT INTO `checks` ( `checkin`, `checkout`, `id_guest`) VALUES ('$hoy', '$checkout', '$id_guest')";

  if ($mysqli->query($sql) === TRUE) {
///// TERMINA INSERSION DE CHECKS, SI SALE BIEN ENTONCES INSERTARA ROOM///
          ///////////////////////////////
          $sql = "INSERT INTO `roomguest` (`room_id`, `id_guest`) VALUES ('$room_id', '$id_guest')";

          if ($mysqli->query($sql) === TRUE) {
            ///////////////TERMINA INSERSION DE ROOMGUEST, EMPIEZA INSERCION DE PAGO
            $sql = "INSERT INTO `pago` (`total`, `pagocon`, `fecha`, `id_guest`, `cambio`) VALUES ('$cargo', '$tipopago', '$hoy', '$id_guest', '$cambio')
";
              if ($mysqli->query($sql) === TRUE) {

                //////modificacion de parametro estado en tabla room
                $sql = "UPDATE rooms SET estado='Ocupado' WHERE room_id=$room_id";

                if (mysqli_query($mysqli, $sql)) {

                  $_SESSION['cambio']=$cambio;

                  header('Location: changue.php');

                } else {
                    echo "Error updating record: " . mysqli_error($mysqli);
                }

                mysqli_close($mysqli);


              }else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
              }





          } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
          }

  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();


}
 ?>
