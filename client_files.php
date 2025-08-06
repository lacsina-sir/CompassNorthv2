<!-- BAGONG CODE, SAMPLE FILE  -->
<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'compass_north';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];
$sql = "SELECT project, file_name, uploaded_date, status FROM survey_files WHERE user_id = ? ORDER BY uploaded_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$surveyFiles = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Survey Files | Titulo</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f6f9;
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

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      font-size: 26px;
    }

    .search-box input {
      padding: 8px;
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .file-list {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .file-card {
      background: white;
      padding: 15px;
      border-left: 5px solid #1d3557;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .file-card h3 {
      margin: 0 0 5px;
      font-size: 18px;
    }

    .file-card p {
      margin: 0;
      font-size: 14px;
      color: #555;
    }

    .file-card small {
      color: #999;
    }
  </style>
</head>

<body>

  <div class="topnav">
    <div class="brand">Titulo Client Portal</div>
    <div class="nav-links">
      <a href="client_dashboard.php">Dashboard</a>
      <a href="client_files.php">Files</a>
      <a href="client_profile.php">Profile</a>
      <a href="client_chat.php">Chats</a>
      <a href="client-side_tracking.php">Tracking</a>
      <a href="index.php">Logout</a>
    </div>
  </div>

  <div class="main">
    <div class="header">
      <h1>Survey Files</h1>
      <div class="search-box">
        <input type="text" placeholder="Search survey files...">
      </div>
    </div>

    <div class="file-list">
      <?php foreach ($surveyFiles as $file): ?>
        <div class="file-card">
          <h3>Project: <?= htmlspecialchars($file['project']) ?></h3>
          <p>
            File: <?= htmlspecialchars($file['file_name']) ?><br>
            <small>Uploaded: <?= htmlspecialchars($file['uploaded_date']) ?> | Status:
              <?= htmlspecialchars($file['status']) ?></small>
          </p>

        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>

</html>