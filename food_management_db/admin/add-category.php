<?php
include("../partials/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `categories` (`name`, `description`) VALUES (?, ?)";
    $statement = $conn->prepare($sql);

    if ($statement) {
        $statement->bind_param("ss", $name, $description);
        $statement->execute();
        $statement->close();
        $conn->close();
        header("Location: manage-categories.php");
        exit();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }
}
?>
