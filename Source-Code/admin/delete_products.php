<?php
require('includes/connection_db.php');

$query = "DELETE FROM products WHERE product_id = {$_GET['id']}";
mysqli_query($conn, $query);

header("location:manage_products.php");

 ?>