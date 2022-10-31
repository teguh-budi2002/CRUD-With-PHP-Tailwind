<?php
require 'connection.php';
$id = $_GET['id'];
try {
    $sql = "DELETE FROM products WHERE id='$id'";
    $query = mysqli_query($isConnecting, $sql);
    header("location:index.php?deleted-product");
} catch (\Throwable $th) {
    return "ERROR";
}
?>