<?php require('conexion.php');
session_start( );
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Onix Suites</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style >
    #sticky-footer {
flex-shrink: none;
}
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php">Onix Suites</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    <span class="oi oi-info"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-info-circle"></i> Status <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="extras.php"><i class="fas fa-plus"></i> Extras <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-users"></i> Guest
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <h6 class="dropdown-header">What do you want to do? </h6>

         <a class="dropdown-item" href="guest_list.php">Guest List</a>
         <!-- <a class="dropdown-item" href="#">Archived Guest</a> -->

       </div>
     </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bed"></i> Rooms
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- <h6 class="dropdown-header">List of:  </h6>

        <a class="dropdown-item" href="#">Standard</a>
        <a class="dropdown-item" href="#">Family</a>
        <a class="dropdown-item" href="#">Double</a>
        <div class="dropdown-divider"></div> -->
        <h6 class="dropdown-header">Change status of a room</h6>

        <a class="dropdown-item" href="room_management.php">Room Manager</a>
      </div>
    </li>
    <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-arrow-right"></i> Next Checkouts
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <h6 class="dropdown-header">Do you want to see... </h6>

       <a class="dropdown-item" href="#">Upcoming Checkouts</a>
       <a class="dropdown-item" href="#">Unspecified Checkouts</a>

     </div>
   </li>
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-paste"></i> Reports
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <h6 class="dropdown-header">List of... </h6>

      <a class="dropdown-item" href="#">Collection</a>
      <a class="dropdown-item" href="#">Remited collection</a>
    </div>
  </li>
    </ul>

  </div>
</nav>
</head>
