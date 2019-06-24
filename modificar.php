<?php
require ('conexion.php');
$room_id=$_POST['room_id'];
$modificador=$_POST['modificador'];


$sql = "UPDATE rooms SET estado='$modificador' WHERE room_id='$room_id'";

if (mysqli_query($mysqli, $sql)) {
   echo ' <script type="text/javascript">
  window.location="https://www.hotelonixsuites.com/Hotelv2/room_management.php";
</script>
';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
echo "Prueba";
mysqli_close($mysqli);

 ?>
