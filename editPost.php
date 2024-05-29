<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id_post = :id_post");
    $stmt->bindParam(':id_post', $post_id);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo "Post not found";
        exit();
    }
} else {
    header("Location: profil.php");
    exit();
}


$stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->query("SELECT * FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Post</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .rounded-circle-custom {
      border-radius: 50%;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="photos/logo2.jfif" alt="Logo" height="30"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php"><i ></i> PSE Space</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php"><i ></i>Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="profil.php"><i ></i> Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <img src="photos/download.jpg" alt="User Logo" class="rounded-circle-custom" style="max-width: 50px;"> <?php echo $user['name']; ?>
          </div>
          <div class="card-body">
            <form action="savePost.php" method="post">
              <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>">
              <textarea class="form-control mb-3 text text-dark" name="new_content" rows="3"><?php echo htmlspecialchars($post['content']); ?></textarea>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
