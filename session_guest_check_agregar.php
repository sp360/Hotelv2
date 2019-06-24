<?php
session_start( );
require('conexion.php');

                                    $_SESSION['nombre']=$_POST['nombre'];
                                    $nombre=$_SESSION['nombre'];
                                    $_SESSION['direccion']=$_POST['direccion'];
                                    $direccion=$_SESSION['direccion'];
                                    $_SESSION['genero']=$_POST['genero'];
                                    $genero=$_SESSION['genero'];
                                    $_SESSION['idtype']=$_POST['idtype'];
                                    $idtype=$_SESSION['idtype'];
                                    $_SESSION['idnumber']=$_POST['idnumber'];
                                    $idnumber=$_SESSION['idnumber'];
                                    $_SESSION['pnumber']=$_POST['pnumber'];
                                    $pnumber=$_SESSION['pnumber'];
                                    $_SESSION['agregoguest']="Agregado";
$sql = "INSERT INTO `guest` (`nombre`, `address`, `genero`, `tipoidentificacion`, `nidentificacion`, `tel`) VALUES ( '$nombre', '$direccion', '$genero', '$idtype', '$idnumber', '$pnumber')";

if ($mysqli->query($sql) === TRUE) {
   echo ' <script type="text/javascript">
  window.location="guest_check.php";
</script>
';} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();


 ?>
