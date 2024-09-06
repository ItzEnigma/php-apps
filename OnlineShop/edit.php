<?php
require_once 'logic/db.inc.php';
$title = "Edit Product";
$name = "";
$price = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Location: products.php?error=true");
        die();
    }
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $price = $row['price'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login">
        <h1>Update Product</h1>
        <form method="post" <?php echo "action='update.php?id=$id'"  ?> enctype="multipart/form-data">
            <input type="text" name="product" placeholder="Product Name" required="required"
                <?php
                if (isset($name)) {
                    echo 'value="' . $name . '"';
                }
                ?> />
            <input type="text" name="price" placeholder="Price" required="required"
                <?php
                if (isset($price)) {
                    echo 'value="' . $price . '"';
                }
                ?> />
            <div class="img-class">
                <label style="height:30px" for=" image">Select Image</label>
                <input class="img" type="file" name="image" required="required" />
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-large">Update</button>
            <a class="link-products" href="products.php">Back to Products</a>
            <hr>
            <p style="text-align:center; font-weight:bold; user-select: none;">&#169; Developed By Enigma</p>
        </form>
    </div>
</body>

</html>