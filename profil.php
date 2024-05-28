<?php 
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$stmt = $conn->query("SELECT * FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Interface</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .rounded-circle-custom {
      border-radius: 50%;
    }

    body {
      padding-top: 70px; 
    }
  </style>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#"><img src="photos/logo2.jfif" alt="Logo" height="30"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
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
    </div>
  </nav>


  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
        <div class="card-header text-center">
          <img src="photos/download (2).jfif" alt="User Photo" class="img-fluid mb-3 rounded-circle-custom" style="max-width: 150px;">
          <h5 class="card-title">Hala MOHAMMED</h5>
        </div>
        <div class="card-body">
          <p class="card-text">She/Her 🔻</p>
          <p class="card-text"> تلك حياتنا نمْسي ونصبح عليها، ليس لدينا رفاهية هرُوبك </p>
          <p class="card-text"><a href="#">@halamohammed</a></p>
          
        </div>
      </div>
    </div>

    <div class="col-md-8">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <img src="photos/download (2).jfif" alt="User Logo" class="rounded-circle-custom" style="max-width: 50px;">
            <h5 class="ml-3">Hala MOHAMMED</h5>
        </div>
        <div class="card-body">
            <form action="addPost.php" method="post">
                <textarea class="form-control mb-3" rows="3" placeholder="Write your post here" name="post_content"></textarea>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>

    <?php foreach ($posts as $post): ?>
      <div class="card mt-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <img src="photos/download (2).jfif" alt="Other User Logo" class="rounded-circle-custom" style="max-width: 50px;">
                <span>Hala MOHAMMED</span>
            </div>
            <div class="d-flex justify-content-end">
                <form action="deletePost.php" method="post">
                    <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>"> 
                    <button type="submit" class="btn btn-sm btn-danger mr-2">Delete</button>
                </form>

                <a href="update.php" class="btn btn-sm btn-primary">Edit</a>
                
            </div>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo $post['content']; ?></p>
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
