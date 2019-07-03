<?php
include 'nav.php';
require('conexion.php');

 ?>
 <body>
   <div class="container">
     <h2>Lista de Clientes</h2>
     <div class="row">
       <input type="text" class="form-control" id="myInput" onkeyup="myFunction()"  placeholder="Busqueda...">


     </div>
     <div class="row">
       <div class="col shadow p-3 mb-5 bg-white rounded">
<table id="myTable" class="table table-striped table-dark">
  <thead>
    <tr>
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
  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
       </div>
     </div>
   </div>
 </body>
 </html>
