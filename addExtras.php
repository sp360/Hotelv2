<?php
require('conexion.php');
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];


$sql = "INSERT INTO `extra` ( `nombre`, `costo`) VALUES ( '$nombre', $precio)";

if ($mysqli->query($sql) === TRUE) {
   echo ' <script type="text/javascript">
  window.location="extras.php";
</script>
';

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

 ?>
