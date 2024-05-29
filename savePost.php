<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['id_post'];
    $new_content = $_POST['new_content'];

    if (!empty($new_content)) {
        $stmt = $conn->prepare("UPDATE posts SET content = :content WHERE id_post = :id_post");
        $stmt->bindParam(':content', $new_content);
        $stmt->bindParam(':id_post', $post_id);
        $stmt->execute();
    }

    header("Location: profil.php");
    exit();
} else {
    header("Location: profil.php");
    exit();
}
?>
