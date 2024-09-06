<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppinz Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="js/jQuery.js"></script>
    <script src="js/toaster.js"></script>
    <script src="js/icons.js"></script>
    <script src="functions.js"></script>
</head>

<body class="prod-page">
    <?php
    if (isset($_GET['deleted'])) {
        echo "<script>toastr.success('Product Deleted Successfully')</script>";
    } else if (isset($_GET['updated'])) {
        echo "<script>toastr.success('Product Updated Successfully')</script>";
    } else if (isset($_GET['error'])) {
        echo "<script>toastr.error('Error Occured')</script>";
    }
    ?>
    <div class="wrapper p-1 m-1">
        <div class="d-flex p-2 justify-content-center">
            <h1>ShoppinZ Products</h1>
            <div><a href="index.php"><i class="add" data-feather="corner-down-left"></i></a></div>
        </div>

    </div>
    <div style="margin-top:-20px;">
        <hr>
    </div>
    <?php
    require_once "logic/db.inc.php";
    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    foreach ($products as $product) {
        echo "
        <div class='cards'>
            <div class='card' style='width: 18rem;'>
                <img src='$product[img]' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title' style='text-align:center;'>$product[name]</h5>
                    <p class='card-text'>$$product[price]</p>
                    <hr style=margin-top:-10px;>
                    <div class='card-buttons'>
                        <a href='edit.php?id=$product[id]' class='btn btn-primary'>Edit Product</a>
                        <a onclick='confirm_delete($product[id])' class='btn btn-rmv' style='margin-left:16px;'>Delete Product</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    ?>

    <script>
        feather.replace();
    </script>

</body>

</html>