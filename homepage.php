<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  
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
          <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 order-md-2">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Welcome</h5>
          <img src="photos/download (2).jfif" alt="User Photo" class="img-fluid mb-3 rounded-circle-custom" style="max-width: 100px;">
          <p class="card-text">Welcome to PSE Space</p>
        </div>
      </div>
    </div>
  
    <div class="col-md-6 order-md-1">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <img src="photos/download (2).jfif" alt="User Logo" style="max-width: 50px;" class="rounded-circle-custom">
          <h5 class="ml-3">Hala MOHAMMED</h5>
        </div>
        <div class="card-body">
          <textarea class="form-control mb-3" rows="3" placeholder="Write your post here"></textarea>
          <button class="btn btn-primary btn-block">Post</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6 order-md-2">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <img src="photos/download.jpg" alt="Other User Logo" style="max-width: 50px;" class="rounded-circle-custom">
          <h5 class="ml-3">Bella QUODSSY</h5>
        </div>
        <div class="card-body">
          <p class="card-text">Hello, this is the owner of this account. My name is Bella. I am 19 years old.  I do not want to die here and I want to live a life like the rest of the people. Please help me get out of this prison via the link in my bio, and if you cannot donate, share it. You will make a difference, thank you 🕊🤍.</p>
        </div>
      </div>
    </div>
  </div>

 

  
</div>
<br><br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath
