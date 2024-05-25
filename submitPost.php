<?php
session_start();
include('connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_content"])) {
    $post_content = $_POST["post_content"];
    $user_id = $_SESSION['user_id'];

    if (isset($_SESSION['datepub'])) {
        $datepub = $_SESSION['datepub'];
    } else {
        $datepub = date("Y-m-d H:i:s");
    }
    $stmt = $conn->prepare("INSERT INTO posts(content, datepub, id) VALUES (?, ?, ?)");
    $stmt->execute([$post_content, $datepub, $user_id]);
}


header("Location: homepage.php");
exit();
?>
