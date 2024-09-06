<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppingz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <script src="js/jQuery.js"></script>
    <script src="js/toaster.js"></script>
</head>

<body>
    <?php
    if (isset($_GET['inserted'])) {
        echo "<script>toastr.success('Product Inserted Successfully')</script>";
    } else if (isset($_GET['error'])) {
        echo "<script>toastr.error('Error Occured')</script>";
    }
    ?>
    <div class="login">
        <h1>ShoppingZ</h1>
        <form method="post" action="insert.php" enctype="multipart/form-data">
            <input type="text" name="product" placeholder="Product Name" required="required" />
            <input type="text" name="price" placeholder="Price" required="required" />
            <div class="img-class">
                <label style="height:30px" for=" image">Select Image</label>
                <input class="img" type="file" name="image" required="required" />
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-large">Upload</button>
            <a class="link-products" href="products.php">View Products</a>
            <hr>
            <p style="text-align:center; font-weight:bold; user-select: none;">&#169; Developed By Enigma</p>
        </form>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>