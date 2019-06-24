<?php
include 'nav.php';
$id_guest=$_SESSION['id_guest'];
$suma=0;

 ?>
<body>
    <div class="container-fluid">
      <h1>Informacion de cuenta</h1>
        <div class="row">
            <div class="col-lg-5 col-md-12 shadow p-3 mb-5 bg-white rounded mr-3">
                <div class="mx-auto" style="width: 400px;">
                  <h5> <?php
                  $sql = "SELECT * FROM guest where id_guest=$id_guest";
                  $result = $mysqli->query($sql);

                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          $_SESSION['nombre']=$row['nombre'];
                          $_SESSION['address']=$row['address'];
                          $_SESSION['genero']=$row['genero'];
                          $_SESSION['tipoidentificacion']=$row['tipoidentificacion'];
                          $_SESSION['nidentificacion']=$row['nidentificacion'];
                          $_SESSION['tel']=$row['tel'];


                      }

                  } else {
                      echo "0 results";
                  }
                   echo "Habitacion ".$_SESSION['room_id'].' '.$_SESSION['categoria'].' - '.$_SESSION['nombre']; ?></h5>
                </div>
                <div class="mx-auto" style="width: 120px;">
                  <p><?php echo $_SESSION['precio'].'/por dia'; ?></p>

                </div>
                <?php
                $sql = "SELECT * FROM checks where id_guest=$id_guest";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $_SESSION['checkin']=$row['checkin'];
                        $_SESSION['checkout']=$row['checkout'];

                    }
                    echo "<p><b>Checkin: </b>".$_SESSION['checkin']."</p>";
                    echo "<p><b>Checkout: </b>".$_SESSION['checkout']."</p>";


                } else {
                    echo "0 results";
                }
                 ?>
                 <br>
                 <b><h2>Lista de extras:</h2></b>
                 <div class="table-responsive">
                   <table class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Extra</th>
                          <th scope="col">Costo</th>
                          <th scope="col">Accion</th>

                        </tr>
                      </thead>
                      <tbody>
                 <?php

                 if (isset($id_guest)) {
                   $sql = "SELECT guest.id_guest, guest_extras.id_guestextras, guest_extras.id_guest, guest_extras.id_extra,guest_extras.pago,extra.id_extra,extra.nombre,extra.costo from guest inner  JOIN guest_extras on guest.id_guest=guest_extras.id_guest inner JOIN extra on guest_extras.id_extra= extra.id_extra and guest.id_guest=$id_guest ";
                   $result = mysqli_query($mysqli, $sql);

                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row

                     while($row = mysqli_fetch_assoc($result)) {
                       echo "
                         <form  action='accionarTablaRem_stat.php' method='post'>
                       <tr>
                         <th >".$row['nombre']. "";
if ($row['pago']==0) {echo '<p class="text-danger">No Pagado</p>' ;}
                         echo "</th>
                         <td>".$row['costo']."</td>
                      ";
                         if ($row['pago']==0) {echo  "   <td><button type='button ' class='btn btn-sm btn-danger'>-</button></td>" ;}

                        echo "
                        <td>   <input hidden name='id_guestextras' value='".$row['id_guestextras']."'>  </td>
                       </tr>
                       </form>
                       ";
                       if ($row['pago']==0) {
                         $suma+=$row['costo'];



                       }
                         }


                       }else {

                        }
                 }






                  ?>
                </tbody>
              </table>

            </div>



        </div>
        <div class="col-lg-3 col-md-12">
          <h3>Extras</h3>
          <div class="col shadow p-3 mb-5 bg-white rounded mr-3">
            <h5>Agregar Extras</h5>
            <div class="table-responsive">
              <table class="table table-sm table-hover">
                 <thead>
                   <tr>
                     <th scope="col">Extra</th>
                     <th scope="col">Costo</th>
                     <th scope="col">Agregar</th>
                   </tr>
                 </thead>
                 <tbody>

                   <?php
                   $sql = "SELECT *  FROM extra ";
                   $result = mysqli_query($mysqli, $sql);

                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {

                       echo "
                       <form  action='accionarTablaAdd_stat.php' method='post'>

                       <tr>
                         <th >".$row['nombre']."</th>
                         <td>".$row['costo']."</td>
                         <td>   <input hidden name='id_extra' value='".$row['id_extra']."'>  </td>

                         <td><button type='submit ' class='btn btn-sm btn-dark'>+</button></td>
                       </tr>

                         </form>
                       ";
                         }
                       }





                    ?>

                  </form>

                 </tbody>
               </table>

            </div>
            <hr>
            <h4>Cambiar fecha de salida</h4>
            <form class="" action="cambiarcheckout.php" method="post">
              <input type="date" required class="form-control" name="date" id="date" >
                <br>
              <button class="btn btn-primary btn-block" type="submit">Guardar</button>

            </form>

          </div>
        </div>



        <div class="col-lg-2 col-md-12">
          <h3>Cuenta</h3>
          <div class="col shadow p-3 mb-5 bg-white rounded mr-3">

            <?php if ($suma>0) {
              echo '
            <h4>Total sin pagar: '.$suma.'</h4>

              ';
              $_SESSION['suma']=$suma;

            } ?>
            <form class="" action="pagar_room_status.php" method="post">
              <input type="number" <?php if($suma<=0){echo "disabled";  $_SESSION['suma']=0; } ?>value="0"  class="form-control" name="pago" id="pago" >

                <br>
              <button class="btn btn-primary btn-block" type="submit">Check Out</button>

            </form>
            <?php if (isset($_SESSION['validacion'])) {
              unset($_SESSION['validacion']);
              echo '<div class="alert alert-danger" role="alert">
                          Ingrese una cantidad igual o mayor a la del total.
                     </div>';
            } ?>
          </div>
        </div>



    </div>
</body>
</html>
