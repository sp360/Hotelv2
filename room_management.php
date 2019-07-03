<?php include 'nav.php';
 ?>

<main role="main" class="container">

    <h3><i class="fas fa-list-ul"></i> Room Management</h3>
    <hr>


    <div class="container">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" id="myInput" onkeyup="myFunction()"  placeholder="Busqueda...">

          <table id="myTable" class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Room</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Estado</th>
      <th scope="col">Cambiar Estado</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT *  FROM rooms";
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo '

      <tr>
        <th scope="row">'.$row['room_id'].'</th>
        <td>'.$row['categoria'].'</td>
        <td>'.$row['precio'].'</td>
        <td>'.$row['estado'].'</td>
        <td><form action="modificar.php" method="post"><input hidden id="room_id" name="room_id" value="'.$row['room_id'].'"><input hidden id="modificador" name="modificador" value="Disponible"><button type="button submit" class="btn btn-success btn-block  btn-sm">Disponible</button></form>
            <form action="modificar.php" method="post"><input hidden id="room_id" name="room_id" value="'.$row['room_id'].'"><input hidden id="modificador" name="modificador" value="Limpiando"><button type="button submit" class="btn btn-primary btn-block btn-sm">Limpiando</button></form>
            <form action="modificar.php" method="post"><input hidden id="room_id" name="room_id" value="'.$row['room_id'].'"><input hidden id="modificador" name="modificador" value="Mantenimiento"><button type="button submit" class="btn btn-warning  btn-block btn-sm">Mantenimiento</button></form>

      </td>

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
        <div class="col shadow p-3 mb-5 bg-white rounded">
            <h4>Agregar Habitaciones</h4>
            <form class="" action="addroom.php" method="post">
                <div class="col">
                  <input type="text" required class="form-control" id="categoria" name="categoria" placeholder="Categoria">

                </div>
                <div class="col">
                  <input type="number" required class="form-control" id="precio" name="precio" placeholder="Precio ">

                </div>
              <hr>
              <button type="submit" class="btn btn-success btn-block">Agregar</button>

            </form>


        </div>
      </div>
    </div>

</main>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
