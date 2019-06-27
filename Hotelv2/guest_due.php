<?php
include 'nav.php';
$dias=$_SESSION['dias'];
$costoH=$_SESSION['precio'];
$extras=$_SESSION['suma'];
$id_guest=$_SESSION['id_guest'];
$hoy = date("Y-m-d");
if (isset($_SESSION['incorrecto'])) {
  echo '<div class="alert alert-danger" role="alert">
            Incorrecto. El pago ingresado es menor al cargo total.
        </div>';
}
 ?>
 <!DOCTYPE html>

   <body>
     <div class="container">
       <h3>Cargos</h3>
       <form class="" action="session_change.php" method="post">


       <div class="row">
         <div class="col shadow p-3 mb-5 bg-white rounded">
            <div class="mx-auto" style="width: 200px;">
                <p>Onix Suites Hotel</p>
            </div>
            <p>Numero de dias: <?php  echo $dias; ?></p>
            <p>Cargos de habitacion: <span class="badge badge-warning"><?php echo $costoH; ?> X <?php   echo $dias; ?> dias = </span> <?php $totalH=$costoH*$dias; echo $totalH; ?> </p>
            <p>Cargos Extras: <?php echo $extras; ?></p>
            <p><b>CARGO TOTAL: </b><?php echo $totalH+$extras; $_SESSION['cargototal']=$totalH+$extras;  ?></p>
            <select class="custom-select custom-select" name="tipopago">
                <option value="">Efectivo</option>
                <option value="">Tarjeta</option>

            </select>
            <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Pago:</span>
      </div>
      <input type="number" name="pago" required class="form-control <?php if (isset($_SESSION['pago'])) { echo 'bg-danger text-white';} ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php if (isset($_SESSION['pago'])) { echo $_SESSION['pago'];} ?>">
    </div>
         </div>
         <div class="col shadow p-3 mb-5 bg-white rounded">
           <h5>Lista de extras anadidos</h5>
           <div class="table-responsive">
             <table class="table table-sm table-hover">
                <thead>
                  <tr>
                    <th scope="col">Extra</th>
                    <th scope="col">Costo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $hoy = date("Y-m-d", strtotime("-1 day"));
                  if (isset($id_guest)) {
                    $sql = "SELECT guest.id_guest, guest_extras.id_guestextras, guest_extras.id_guest, guest_extras.id_extra,guest_extras.pago,extra.id_extra,extra.nombre,extra.costo from guest inner  JOIN guest_extras on guest.id_guest=guest_extras.id_guest inner JOIN extra on guest_extras.id_extra= extra.id_extra and guest.id_guest=$id_guest and guest_extras.date='$hoy'";
                    $result = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                          <th >".$row['nombre']."</th>
                          <td>".$row['costo']."</td>
                           <td>   <input hidden name='id_guestextras' value='".$row['id_guestextras']."'>  </td>
                        </tr>

                        ";
                          }


                        }else {
                         }
                  }






                   ?>

                </tbody>
              </table>

           </div>
         </div>
         <div class="col ">
           <h6>Detalles</h6>
           <p><b>Informacion de la habitacion:</b></p>
           <p>Seleccionaste la <b>habitacion <?php echo $_SESSION['room_id']; ?></b> con categoria <b> <?php echo $_SESSION['categoria']; ?></b> y el costo por dia es <b><?php echo $_SESSION['precio'];  ?> Pesos</b></p>
           <p><b>Informacion del cliente:</b></p>
           <p>Nombre: <b><?php echo $_SESSION['nombre_guest'];  ?></b></p>
             <p>Genero: <b><?php echo $_SESSION['genero'];  ?></b></p>
               <p>Direccion: <b><?php echo $_SESSION['address'];  ?></b></p>
                 <p>Tipo de identificacion: <b><?php echo $_SESSION['tipoidentificacion'];  ?></b></p>
                   <p>Numero de identificacion: <b><?php echo $_SESSION['nidentificacion'];  ?></b></p>
                     <p>Telefono: <b><?php echo $_SESSION['tel'];  ?></b></p>

         </div>
       </div>
       <button type="submit" class="btn btn-success btn-block">Registrar</button>
     </form>
     </div>
   </body>
 </html>
