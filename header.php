<?php
date_default_timezone_set("Europe/Istanbul");
 include_once "admin/config/config.php"; 
    if(empty($_SESSION['title'])){

      $ayarlar=DB::get("SELECT * FROM ayar");
      foreach ($ayarlar as $ayar) {
          $_SESSION[$ayar->ad]=$ayar->tur;
      }
      
    }
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$_SESSION['description'];?>" >
    <meta name="keywords" content="<?=$_SESSION['keywords'];?>" >
    <meta name="author" content="<?=$_SESSION['author'];?>" >

    <title> <?=$_SESSION['title'];?> </title>,

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/round-about.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- SwettAlert -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <style>
      .back{
            background: linear-gradient(to right,#eeaeca,#94bbe9, #94bbe9,#eeaeca);
      } 
      .buttonOy{
            background: linear-gradient(to right,#3f5efb,#fc466b, #ae46fc,#eeaeca);
      }
      .btn-success{
            background: linear-gradient(to right,#12c5ce,#2c8dff);
      }

           

      
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark back fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Cumhur Başkanlığı Seçim Anketi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="#">Ana Sayfa
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>  -->

          </ul>
        </div>
      </div>
    </nav>
