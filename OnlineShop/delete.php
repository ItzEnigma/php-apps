<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once "logic/db.inc.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    header("Location: products.php?deleted=true");
    die();
} else {
    header("Location: products.php?error=true");
    die();
}
