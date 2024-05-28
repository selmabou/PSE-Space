<?php

session_start();
include('connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


    if(isset($_POST['id_post']) && isset($_POST['new_content'])) {
        $post_id = $_POST['id_post'];
        $new_content = $_POST['new_content'];

        $stmt = $conn->prepare("UPDATE posts SET content = :content WHERE id_post = :id");
        $stmt->bindParam(':content', $new_content);
        $stmt->bindParam(':id', $post_id);
        $stmt->execute();

        header("Location: profil.php");
        exit(); 
    } else {
        echo "error";
    }

?>