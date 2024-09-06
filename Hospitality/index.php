<?php
  require_once 'config_session_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Enigma" />
    <title>Hospitality</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body></body>
  <h1>Hospitality</h1>
  <div class="logo">
    <img src="hospital.png" alt="hospital" />
    <h2>Hospitality Hospital</h2>
  </div>
  <h3 class="fill">Fill the form below to reserve a room</h3>
  <form class="form" action="logic.php" method="POST">
    <input
      class="inp"
      type="text"
      name="username"
      placeholder="Username"
      required
    />
    <input class="inp" type="text" name="email" placeholder="Email" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"/>
    <input
      class="inp"
      type="date"
      name="resv_date"
      placeholder="Reserve Date"
      required
    />
    <button class="inp but" type="submit">Reserve</button>
  </form>
  <div class="output_msg">
    <?php
      if (isset($_SESSION["errors"])) {
         echo "<style>.output_msg {visibility: visible;}</style>";
          $errors = $_SESSION["errors"];
          foreach ($errors as $error) {
              echo "<p class='error'>$error</p>";
          }
          unset($_SESSION["errors"]);
      }
      ?>
    </div>
</html>
