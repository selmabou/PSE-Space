<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_post'])) {
    $post_id = $_POST['id_post'];

    $sql = "DELETE FROM posts WHERE id_post = :post_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':post_id', $post_id);
    
    if ($stmt->execute()) {
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du post.";
    }
} else {
    header("Location: profil.php");
    exit();
}
?>