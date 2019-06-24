<?php
include 'nav.php';
require('conexion.php');

 ?>
 <body>
   <div class="container">
     <h2>Lista de Clientes</h2>
     <div class="row">
       <div class="col shadow p-3 mb-5 bg-white rounded">
         <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Genero</th>
      <th scope="col">Tipo de identificacion</th>
      <th scope="col"># identificacion</th>
      <th scope="col">Telefono</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT *  FROM guest";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo '

        <tr>
          <td>'.$row['id_guest'].'</th>
          <td>'.$row['nombre'].'</td>
          <td>'.$row['address'].'</td>
          <td>'.$row['genero'].'</td>
          <td>'.$row['tipoidentificacion'].'</td>
          <td>'.$row['nidentificacion'].'</td>
          <td>'.$row['tel'].'</td>

        
        </tr>


        ';
          }
        }

     ?>
    </tbody>
  </table>
       </div>
     </div>
   </div>
 </body>
 </html>
