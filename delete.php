<?php 
    include('header.php');
    include('db.php'); 

    $id = (int)$_GET['id'];
    $query = "DELETE FROM users WHERE Id=$id";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed");
    }

    header("Location: index.php");
    exit(); 
?>
