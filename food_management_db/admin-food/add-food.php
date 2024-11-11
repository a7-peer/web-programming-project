<?php
include("../partials/conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'] ;
    $stmt = $conn->prepare("INSERT INTO `foods`( `name`, `category_id`, `quantity`, `expiry_date`) VALUES (?,?,?,?)");
    $stmt->bind_param("siis", $name, $category_id, $quantity, $expiry_date);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("location:manage-food.php");
    exit();
}
?>
