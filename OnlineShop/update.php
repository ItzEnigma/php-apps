<?php
/* Checkings is yet to be added !!! */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product'];
    $price = $_POST['price'];
    $img = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up   = "images/" . $image_name;  // The path to store the uploaded image

    require_once "logic/db.inc.php";
    require_once "logic/check_input_update.php";
    $sql = "UPDATE products SET name = :name , price = :price, img = :img WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'price' => $price, 'img' => $image_up, 'id' => $_GET['id']]);
    if (move_uploaded_file($image_location, "images/" . $image_name)) {
        echo "<script>alert('Image uploaded successfully')</script>";
    } else {
        echo "<script>alert('Image not uploaded')</script>";
    }

    header("Location: products.php?updated=true");
    die();
} else {
    header("Location: products.php?error=true");
    die();
}
