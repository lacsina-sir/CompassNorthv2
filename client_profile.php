<?php
// Example PHP data; replace with database fetch later
$clientName = "Juan Dela Cruz";
$clientEmail = "juan@example.com";
$clientContact = "0917-123-4567";
$clientAddress = "123 San Agustin St, Gapan City, Nueva Ecija";
$accountCreated = "July 1, 2025";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Profile | Titulo</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
    }

    .topnav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background-color: #1d3557;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 40px;
      z-index: 1000;
    }

    .topnav .brand {
      font-size: 20px;
      font-weight: bold;
    }

    .topnav .nav-links {
      display: flex;
      gap: 20px;
    }

    .topnav .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .topnav .nav-links a:hover {
      text-decoration: underline;
    }

    .main {
      padding: 100px 40px 40px;
    }

    .profile-container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }

    .profile-container h2 {
      margin-top: 0;
      color: #1d3557;
    }

    .profile-info {
      margin-top: 20px;
    }

    .profile-info p {
      margin: 10px 0;
      font-size: 16px;
    }

    .label {
      font-weight: bold;
      color: #333;
    }

    .edit-btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #1d3557;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .edit-btn:hover {
      background-color: #2d517f;
    }

    .change-pass {
      margin-top: 20px;
    }

    .change-pass a {
      text-decoration: none;
      color: #1d3557;
      font-weight: bold;
    }

    .change-pass a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Top Navigation -->
  <div class="topnav">
    <div class="brand">Titulo Client Portal</div>
    <div class="nav-links">
      <a href="client_dashboard.php">Dashboard</a>
      <a href="client_files.php">Files</a>
      <a href="client_profile.php">Profile</a>
      <a href="client_chat.php">Chats</a>
      <a href="client-side_tracking.php">Updates</a>
      <a href="#">Logout</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="profile-container">
      <h2>Your Profile</h2>

      <div class="profile-info">
        <p><span class="label">Name:</span> <?= htmlspecialchars($clientName) ?></p>
        <p><span class="label">Email:</span> <?= htmlspecialchars($clientEmail) ?></p>
        <p><span class="label">Contact:</span> <?= htmlspecialchars($clientContact) ?></p>
        <p><span class="label">Address:</span> <?= htmlspecialchars($clientAddress) ?></p>
        <p><span class="label">Account Created:</span> <?= htmlspecialchars($accountCreated) ?></p>
      </div>

      <button class="edit-btn">Edit Profile</button>

      <div class="change-pass">
        <a href="#">Change Password</a>
      </div>
    </div>
  </div>

</body>
</html>
