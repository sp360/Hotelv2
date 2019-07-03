<?php
include 'nav.php';
$id_guest=$_SESSION['id_guest'];

 ?>
 <body>
    <div class="container">
      <div class="row">
        <div class="col-4 shadow p-3 mb-5 bg-white rounded mr-3">
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
                     <form  action='accionarTablaAdd.php' method='post'>

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

        </div>
        <div class="col shadow p-3 mb-5 bg-white rounded mr-3">
          <h5>Lista de extras anadidos</h5>
          <div class="table-responsive">
            <table class="table table-sm table-hover">
               <thead>
                 <tr>
                   <th scope="col">Extra</th>
                   <th scope="col">Costo</th>
                   <th scope="col">Quitar</th>

                 </tr>
               </thead>
               <tbody>
                 <?php
                 $hoy = date("Y-m-d", strtotime("-1 day"));
                 echo $hoy;


                 if (isset($id_guest)) {
                   $sql = "SELECT * FROM guest JOIN guest_extras on guest.id_guest=guest_extras.id_guest JOIN extra ON guest_extras.id_extra=extra.id_extra AND guest.id_guest=$id_guest AND guest_extras.date='$hoy' and guest_extras.pago!=1";
                   $result = mysqli_query($mysqli, $sql);

                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     $suma=0;
                     while($row = mysqli_fetch_assoc($result)) {
                       echo "
                      <form  action='accionarTablaRem.php' method='post'>
                       <tr>
                         <th >".$row['nombre']."</th>
                         <td>".$row['costo']."</td>
                         <td><button type='button ' class='btn btn-sm btn-danger'>-</button></td>
                          <td>   <input hidden name='id_guestextras' value='".$row['id_guestextras']."'>  </td>
                       </tr>
                       </form>

                       ";
                       $suma+=$row['costo'];
                         }
                         $_SESSION['suma']=$suma;
                         echo "</table>";
                         echo '

                                  <div class="mx-auto" style="width: 200px;">
                                  Total: '.$suma.'
                                  </div>
                              ';

                       }else {
                         $_SESSION['suma']=0;

                         echo "</table>";

                         echo '

                                  <div class="mx-auto" style="width: 200px;">
                                  Total: 0
                                  </div>
                              ';
                        }
                 }






                  ?>

               </tbody>
             </table>


          </div>
        </div>
      </div>
      <div class="row">
          <form class="" action="guest_due.php" method="post">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Continuar</button>

          </form>
      </div>
    </div>






  </body>
  </html>
