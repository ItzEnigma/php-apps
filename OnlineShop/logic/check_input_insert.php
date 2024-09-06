<?php

if (empty($_POST['product']) || empty($_POST['price']) || empty($_FILES['image'])) {
    header("Location: index.php?error=true");
    die();
}

if (is_price($_POST['price']) || is_image($_FILES['image']['name'])) {
    header("Location: index.php?error=true");
    die();
}

function is_image($image)
{
    $result = false;
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $result = true;
    }
    return $result;
}

function is_price($price)
{
    $result = false;
    if (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
        $result = true;
    }
    return $result;
}
