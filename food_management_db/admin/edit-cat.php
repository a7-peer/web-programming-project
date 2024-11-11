<?php
include("../partials/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $sql = "UPDATE `categories` SET `name`=?, `description`=? WHERE category_id=?";

    $id = $_GET["id"];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $stat=$conn->prepare($sql);
    $stat->bind_param("ssi",$name,$description,$id);
    $stat->execute();
    $stat->close();
    $conn->close();
    header("location:manage-categories.php");
    exit();
}

