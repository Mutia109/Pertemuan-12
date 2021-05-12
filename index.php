<?php
require "inc.koneksi.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 9</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- My Css -->
    <link rel="stylesheet" href="./style.css">

</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="navbar-brand" href="index.php?p=home">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php? p=login">Login <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=register">Register</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=employeelist">EmployeeList</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=projectlist">ProjectList</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <div class=main>
      <?php
        $pages_dir = 'pages';
        if(!empty($_GET['p'])){
          $pages = scandir($pages_dir, 0);
          unset($pages[0], $pages[1]);
          $p = $_GET['p'];
          if(in_array($p.'.php', $pages)){
            include($pages_dir.'/'.$p.'.php');
          } 
          else {
            echo 'Halaman tidak ditemukan! :(';
          }
        } 
        else {
          include($pages_dir.'/home.php');
        }
      ?>
    </div>
    
    <div class = "footer">
      <p>@Mutiara2021</p>
    </div>

  </body>
</html>