<?php
include("../partials/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `categories` WHERE category_id=$id";
    $result = $conn->query($sql);
    $conn->close();
    header("location:manage-categories.php");
    exit();
}