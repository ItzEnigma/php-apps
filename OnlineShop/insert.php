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
    require_once "logic/check_input_insert.php";
    $sql = "INSERT INTO products (name, price, img) VALUES (:product, :price, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['product' => $name, 'price' => $price, 'image' => $image_up]);

    header("Location: index.php?inserted=true");
    if (move_uploaded_file($image_location, "images/" . $image_name)) {
        echo "<script>alert('Image uploaded successfully')</script>";
    } else {
        echo "<script>alert('Image not uploaded')</script>";
    }
    die();
} else {
    header("Location: index.php?error=true");
    die();
}
