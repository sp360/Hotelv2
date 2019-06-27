<?php
session_start( );
require('conexion.php');
$_SESSION['id_guest']=$_POST['id_guest'];
$_SESSION['date']=$_POST['date'];

$fecha = $_SESSION['date'];
$hoy = date("Y-m-d");

$fecha1 = new DateTime($fecha);//fecha inicial
$fecha2 = new DateTime($hoy);

$intervalo=$fecha1->diff($fecha2);

$res=$intervalo->format('%d');

$_SESSION['dias']=$res;
$id_guest=$_SESSION['id_guest'];


$sql = "SELECT * FROM guest where id_guest=$id_guest";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['nombre_guest']=$row['nombre'];
        $_SESSION['genero']=$row['genero'];

        $_SESSION['address']=$row['address'];
        $_SESSION['tipoidentificacion']=$row['tipoidentificacion'];
        $_SESSION['nidentificacion']=$row['nidentificacion'];
        $_SESSION['tel']=$row['tel'];
   echo ' <script type="text/javascript">
  window.location="market.php";
</script>
';
    }
} else {
    echo "0 results";
}
$mysqli->close();


 ?>
