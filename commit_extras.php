<?php
require ('conexion.php');
$id_extra=$_POST['id_extra'];
$modificador=$_POST['modificador'];
$nombre=$_POST['nombre'];
$costo=$_POST['costo'];



$sql = "UPDATE extra SET nombre='$nombre', costo=$costo WHERE id_extra='$id_extra'";

if (mysqli_query($mysqli, $sql)) {
   echo ' <script type="text/javascript">
  window.location="extras.php";
</script>
';
} else {
    echo "Error updating record: " . mysqli_error($mysqli);
}
echo "Prueba";
mysqli_close($mysqli);

 ?>
