<?php
include 'nav.php';

 ?>
 <body>
   <div class="container">
     <div class="row">
      <div class="col">
        <div class=" mx-auto" style="width: 200px;">
          <form class="" action="unset.php" method="post">

           <h2>Cambio:</h2>
           <h1><?php echo $_SESSION['cambio'].' Pesos'; ?></h1>

        </div>
        <div class=" mx-auto" >
          <p>Porfavor, dar click en el boton "Regresar"</p>

        </div>
        <button type="submit" class="btn btn-success btn-block">Regresar</button>

        </form>
      </div>
     </div>
   </div>
 </body>
 </html>
