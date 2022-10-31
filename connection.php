<?php
$host = 'localhost';
$username = 'debian-sys-maint';
$password = 'nqstnSi3ksBEBa32';
$db = 'crud_products';

$isConnecting = mysqli_connect($host, $username, $password, $db);
if (!$isConnecting) {
    echo "ERROR: " . mysqli_connect_error();
}
?>