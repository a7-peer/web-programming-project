<?php
include("../partials/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `foods` WHERE food_id=$id";
    $result = $conn->query($sql);
    $conn->close();
    header("location:manage-food.php");
    exit();
}