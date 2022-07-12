<!-- 
    /index.php
    this file is the main page of the admin area
-->

<?php
    session_start();
    if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){ // check if the user is logged in
        header("Location: ./login/");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Dreaming City</title>
  <style>
      @import url('./index.css');
  </style>
</head>
<body>

  <nav>
    <a href="index.php">Menu</a>
    <a href="./login/index.php?logout=true">Logout</a>
  </nav>

  <section class="animated-nav-grid">
    <div class="card"></div>
    <a href="./gebruikersbeheer/" class="card">Users</a>
    <a href="./cms/" class="card">Pages</a>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <a href='./msg' class="card">Messages</a>
    <a href="./explorer/" class="card">Files</a>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <a href="./supply/" class="card">Vehicles</a>
  </section>  

</body>
</html>