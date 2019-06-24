<?php
require('conexion.php');
$catego=$_POST['categoria'];
$precio=$_POST['precio'];


$sql = "INSERT INTO `rooms` ( `categoria`, `precio`, `estado`) VALUES ( '$catego', $precio, 'Disponible')";

if ($mysqli->query($sql) === TRUE) {
   echo ' <script type="text/javascript">
  window.location="https://www.hotelonixsuites.com/Hotelv2/room_management.php";
</script>
';
    
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

 ?>
