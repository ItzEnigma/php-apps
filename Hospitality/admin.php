<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Enigma" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body></body>
  <h1>Hospitality</h1>
  <div class="logo">
    <img src="hospital.png" alt="hospital" style="width:300px;" />
    <h2>Hospitality Hospital</h2>
  </div>
  <table>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Email</th>
        <th>Reserve Date</th>
        <?php
          require_once "db_inc.php";
          $query = "SELECT * FROM patients";
          $stmt = $pdo->query($query);
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["Patient"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Reserve_Date"] . "</td>";
            echo "</tr>";
          }
          $pdo = null;
        ?>
  </table>
</html>
