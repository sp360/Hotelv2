<?php include 'nav.php';
 ?>

<main role="main" class="container shadow p-3 mb-5 bg-white rounded">

    <h3><i class="fas fa-list-ul"></i> Extras</h3>
    <hr>


    <div class="container">
      <div class="row">
        <div class="col">

          <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Costo</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql = "SELECT *  FROM extra";
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo '

      <tr>
        <th scope="row">'.$row['nombre'].'</th>
        <td>'.$row['costo'].'</td>
        <td><form action="modificar_extras.php" method="post"><input hidden id="id_extra" name="id_extra" value="'.$row['id_extra'].'"><button type="button submit" class="btn btn-success btn-block  btn-sm"><i class="fas fa-edit"></i></button></form>

      </td>

      </tr>


      ';
        }
      }

   ?>
  </tbody>
</table>

        </div>
        <div class="col shadow p-3 mb-5 bg-white rounded">
            <h4>Agregar Extras</h4>
            <form class="" action="addExtras.php" method="post">
                <div class="col">
                  <input type="text" required class="form-control" id="categoria" name="nombre" placeholder="Nombre">

                </div>
                <div class="col">
                  <input type="number" required class="form-control" id="precio" name="precio" placeholder="Costo ">

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
