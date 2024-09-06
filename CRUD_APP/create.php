<?php
require_once 'logic/db.inc.php';
$title = "Add User";
$name = "";
$email = "";
$password = "";
$confirm_password = "";
$phone = "";
$btn_title = "Save";
$edit = false;

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['mobile'];
    $btn_title = "Update";
    $title = "Edit User";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toaster.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/icons.js"></script>
</head>

<body>

    <div cass="container">
        <div class="wrapper p-1 m-1">
            <div class="d-flex p-2 justify-content-between">
                <h1><?php echo $title; ?></h1>
                <div><a href="index.php"><i class="add" data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="index.php" method="POST">
                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required
                        <?php
                        if (isset($name)) {
                            echo 'value="' . $name . '"';
                        } ?>>
                </div>
                <div class="form-group p-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                        <?php
                        if (isset($email)) {
                            echo 'value="' . $email . '"';
                        } ?>>
                </div>
                <div class="form-group p-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required
                        <?php
                        if (isset($password)) {
                            echo 'value="' . $password . '"';
                        } ?>>
                </div>
                <div class="form-group p-2">
                    <label for="Confirm Password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required
                        <?php
                        if (isset($confirm_password)) {
                            echo 'value="' . $confirm_password . '"';
                        } ?>>
                </div>
                <div class="form-group p-2">
                    <label for="mobile">Phone</label>
                    <input type="tel" name="mobile" id="mobile" class="form-control" required placeholder="e.g. 01164960000"
                        <?php
                        if (isset($phone)) {
                            echo 'value="' . $phone . '"';
                        } ?>>
                </div>
                <?php
                if (isset($id)) {
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                }
                ?>
                <div class="form-group p-2">
                    <input type="submit" name="save" class="btn btn-primary" value="<?php echo $btn_title; ?>"></inpu>
                </div>
                <script>
                    feather.replace();
                </script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.js"></script>
                <script src="js/toaster.js"></script>
</body>

</html>