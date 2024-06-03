<?php
session_start();
require_once 'connection.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $conn->query("SELECT * FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
      padding-top: 70px; 
    }

    .rounded-circle-custom {
      border-radius: 50%;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="homepage.php"><img src="photos/logo2.jfif" alt="Logo" height="30"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php"><i class="fas "></i> PS Space</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php"><i class="fas "></i> Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="profil.php"><i class="fas "></i> Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
</nav>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-5 order-md-2">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">PS SPACE 🔻</h5>
          <img src="photos/pse.jfif" alt="User Photo" class="img-fluid mb-3 rounded-circle-custom" style="max-width: 100px;">
          <p class="card-text">Hello <?php echo $user['name']; ?>, welcome to PS Space</p>
        </div>
      </div>
    </div>
    

<div class="col-md-7 order-md-1">
    <form action="submitPost.php" method="post">
        <div class="card-header d-flex align-items-center">
          <img src="photos/pse.jfif" alt="User Logo" style="max-width: 50px;" class="rounded-circle-custom">
          <h5 class="ml-3"><?php echo $user['name']; ?></h5>
        </div>
        <textarea name="post_content" class="form-control mb-3" rows="3" placeholder="Write your post here"></textarea>
        <button type="submit" class="btn btn-primary btn-block">Post</button>
    </form>   

    <?php foreach ($posts as $post): ?>
        <div class="row mt-3">
        <div class="col-md-12 order-md-1">
        <div class="card">
            <div class="card-header d-flex align-items-center">
              <img src="photos/pse.jfif" alt="Other User Logo" style="max-width: 50px;" class="rounded-circle-custom">
              <h5 class="ml-3"><?php echo $user['name']; ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $post['content']; ?></p>
                <small><?php echo htmlspecialchars($post['datepub']); ?></small>
            </div>
        </div>
        </div>
  </div>
    <?php endforeach; ?>
</div>

<br><br>
<br><br>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>