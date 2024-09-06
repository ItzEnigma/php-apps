<?php
require_once("logic/db.inc.php");

$action = false;
if (isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = "0";
    if ($_POST['mobile']) {
        $mobile = trim($_POST['mobile']);
    }
    if (empty($name) || empty($email) || empty($password)) {
        $action = "empty";
    }

    if ($_POST['password'] != $_POST['confirm_password']) {
        $action = "password";
    }

    if ($action == false) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "UPDATE users SET name = :name, email = :email, password = :password, mobile = :mobile WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'mobile' => $mobile, 'id' => $id]);
            $action = "user_updated";
        } else {
            $sql = "INSERT INTO users (name, email, password, mobile) VALUES (:name, :email, :password, :mobile)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'mobile' => $mobile]);
            $action = "user_added";
        }
    }

    unset($_POST["save"]);
}
if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $action = "user_deleted";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="js/jQuery.js"></script>
    <script src="js/toaster.js"></script>
    <script src="js/icons.js"></script>
    <script src="notifications.js"></script>
</head>

<body>
    <?php
    if ($action == "user_added") {
        echo "<script>toastr.success('User Added Successfully')</script>";
    } elseif ($action == "user_updated") {
        echo "<script>toastr.success('User Updated Successfully')</script>";
    } elseif ($action == "user_deleted") {
        echo "<script>toastr.success('User Deleted Successfully')</script>";
    } elseif ($action == "empty") {
        echo "<script>errorNotification();</script>";
    } elseif ($action == "password") {
        echo "<script>toastr.error('Password Does Not Match')</script>";
    } elseif ($action == "undefined") {
        echo "<script>toastr.error('An error occured')</script>";
    }
    ?>
    <div cass="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between wrapper p-2 m-2">
                    <h1>CRUD App</h1>

                    <a href="create.php">
                        <i class="add" data-feather="user-plus"></i>
                    </a>
                </div>
                <table class="table table-striped">
                    <thead class="thead-color">
                        <tr>
                            <th class="ID">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'logic/db.inc.php';
                        $sql = "SELECT * FROM users";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td class='ID'>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['mobile'] . "</td>";
                            echo "<td>";
                            echo "<div class=''>";
                            $uId = $row["id"];
                            echo "<a onclick='edit($uId)'><i class='text-primary clickable' data-feather='edit'></i></a>";
                            echo "<a onclick='confirm_delete($uId)'><i class='text-danger actions clickable' data-feather='trash-2'></i></a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            feather.replace();
        </script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>