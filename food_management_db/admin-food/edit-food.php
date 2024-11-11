<?php
include("../partials/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $sql = "UPDATE `food` SET `name`=?, `quantity`=?, `expiry_date`=? WHERE `food_id`=?";

    $id = intval($_GET["id"]);
    $name = $_POST['name'];
    $quantity = intval($_POST['quantity']);
    $expiry_date = $_POST['expiry_date'];

    $stat = $conn->prepare($sql);
    $stat->bind_param("sisi", $name, $quantity, $expiry_date, $id);
    $stat->execute();

    // Close the statement and connection
    $stat->close();
    $conn->close();

    // Redirect to manage-food.php after updating
    header("location:manage-food.php");
    exit();
}
?>
