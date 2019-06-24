<?php
include 'nav.php';


 ?>

   <body>
     <div class="container">
            <div class="row">
              <div class="col">
                <h5 class="">Agregar nuevo cliente</h5>
                <div class="card-body">
                  <form class="" action="session_guest_check_agregar.php" method="post">
                <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="validationDefault01">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationDefault02">Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="" required>
                </div>
                <div class="col-md-4 mb-3">
                <label for="validationDefaultUsername">Genero</label>
                <select class="custom-select" name="genero">
                  <option value="Hombre">Hombre</option>
                  <option value="Mujer">Mujer</option>
                </select>
                </div>

                </div>
                <div class="form-row">
                <div class="col-md-6 mb-3">
                <label for="validationDefaultUsername">Tipo de Identificacion </label>
                <select class="custom-select" name="idtype">
                  <option value="Pasaporte">Pasaporte</option>
                  <option value="Visa">Visa</option>
                  <option value="Electoral">Electoral</option>
                  <option value="Cedula">Cedula</option>

                </select>
                </div>
                <div class="col-md-3 mb-3">
                <label for="validationDefault04">Numero de ID</label>
                <input type="text" class="form-control" name="idnumber" placeholder="# Identificacion" required>
                </div>
                <div class="col-md-3 mb-3">
                <label for="validationDefault05">Numero telefonico</label>
                <input type="text" class="form-control" name="pnumber" placeholder="Telefono" required>
                </div>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Agregar y continuar</button>
                </form>
              </div>
<?php
            if (!empty($_SESSION['agregoguest'])) {
              echo '<div class="alert alert-success" role="alert">
                Cliente agregado correctamente, seleccionelo de la lista de abajo.
                    </div>';
            unset($_SESSION['agregoguest']);

            }

 ?>


              <hr>
            </div>

          </div>


    </div>




            <div class="container">
                <div class="row">
                  <div class="col-5 mx-auto">
                    <h5>Selecciona un cliente de la lista</h5>
                    <div class="">
                      <form class="" action="session_guest_check_select.php" method="post">
                        <select class="custom-select custom-select" name="id_guest">

                        <?php
                          $sql = "SELECT *  FROM guest";
                          $result = mysqli_query($mysqli, $sql);

                          if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              echo '
                              <option value="'.$row['id_guest'].'">'.$row['nombre'].'</option>




                              ';
                                }

                              }


                               ?>

                        </select>




                    </div>
                  </div>

                </div>
              </div>
        <div class="container">
          <div class="row">
            <div class="col-5 mx-auto">
              <h5><label for="date">Porfavor, ingrese la fecha de salida: </label></h5>

              <input type="date" required class="form-control" name="date" id="date" >
                <br>
              <button class="btn btn-primary btn-block" type="submit">continuar</button>
            </form>

            </div>
          </div>
        </div>
   </body>
 </html>
