<?php
  require_once 'includes/config_session_inc.php';
  require_once 'includes/login_view_inc.php';
  require_once 'includes/signup_view_inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form class="login_form" action="includes/login_inc.php" method="POST">
      <div class="login">
        <h3>Login</h3>
        <input
          type="text"
          class="input_area"
          id="user_name"
          name="user_name"
          required
          placeholder="User Name"
        />
        <input
          type="password"
          class="input_area"
          id="pass_word"
          name="pass_word"
          required
          placeholder="Password"
        />
        <!-- An element to toggle between password visibility -->
        <div class="show_password">
          <input type="checkbox" onclick="showPassword()" />
          <p>Show Password</p>
        </div>
        <input class="submit" type="submit" value="Login" />
      </div>
    </form>
    <div class="output_msg_login">
      <?php
        check_login_errors();
      ?>
    </div>
    <form class="Sign_form" action="includes/signup_inc.php" method="POST">
      <div class="sign">
        <h3>Sign Up</h3>
        <input
          type="text"
          class="input_area"
          id="user_name"
          name="user_name"
          required
          placeholder="User Name"
        />
        <input
          type="password"
          class="input_area"
          id="pass_word"
          name="pass_word"
          required
          placeholder="Password"
        />
        <input
          type="text"
          class="input_area"
          id="email"
          name="email"
          required
          placeholder="Email"
          pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
        />
        <input class="submit sign_submit" type="submit" value="Sign Up" />
      </div>
    </form>
    <div class="output_msg">
      <?php
        check_signup_errors();
      ?>
    </div>
  </body>
</html>

<script>
  function showPassword() {
    var x = document.getElementById("pass_word");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
