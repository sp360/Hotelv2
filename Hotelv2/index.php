<?php include 'nav.php'; ?>
  <body>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4"><i class="fas fa-info-circle"></i>
        <small>Status</small>
      </h1>

      <div class="row">

    <?php
    $sql = "SELECT *  FROM rooms";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {

    echo '
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card h-100 ">
        <a href="#"><img class="card-img-top " src="room.jpg" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#" class="text-success">Habitacion '.$row['room_id'].'</a>
          </h4>
          <p class="card-text">'.$row['categoria'].'</p>
          <h6 class="card-text">'.$row['precio']. ' Pesos</h6>
          <h5 class="card-text"><p class="';if($row['estado']=="Disponible"){echo "text-success";}elseif($row['estado']=="Ocupado"){echo "text-danger";}elseif($row['estado']=="Limpiando"){echo "text-primary";}elseif($row['estado']=="Mantenimiento"){echo "text-warning";}
          echo '"</p>'.$row['estado'].'</h5>
          <form action="';if($row['estado']=="Disponible"){echo "sessionindex.php";}elseif ($row['estado']=="Ocupado") {echo "room_status_session.php";}else {echo "room_management.php";} echo '" method="post">
          <input type="text" hidden id="room_id" name="room_id" value="'.$row['room_id'].'">
          <input type="text" hidden id="estado" name="estado" value="'.$row['estado'].'">
          <input type="text" hidden id="categoria" name="categoria" value="'.$row['categoria'].'">
          <input type="text" hidden id="precio" name="precio" value="'.$row['precio'].'">
          <input type="text" hidden id="variabledepaso" name="variabledepaso" value="si">


          <button type="button submit" class="btn btn-light btn-sm btn-block">Info</button>
          </form>
        </div>
      </div>
    </div>';



      }
    } else {
      echo "0 results";
    }

    mysqli_close($mysqli);

     ?>



      </div>
      <!-- /.row -->



    </div>

    <!-- /.container -->
      </body
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
    </html>
