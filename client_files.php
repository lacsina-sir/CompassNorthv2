<?php
// Dummy data - eventually replace this with DB calls
$surveyFiles = [
  [
    "project" => "Subdivision Survey",
    "file" => "subdivision_plan.pdf",
    "uploaded" => "July 25, 2025",
    "status" => "Signed & Ready for Pickup"
  ],
  [
    "project" => "Topographic Survey",
    "file" => "topo_data_sheet.docx",
    "uploaded" => "July 23, 2025",
    "status" => "Processing"
  ],
  [
    "project" => "Title Verification",
    "file" => "land_title_101.jpg",
    "uploaded" => "July 20, 2025",
    "status" => "Awaiting Approval"
  ]
];
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
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
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
      <a href="dashboard.php">Dashboard</a>
      <a href="survey-files.php">Files</a>
      <a href="profile.php">Profile</a>
      <a href="chats.php">Chats</a>
      <a href="updates.php">Updates</a>
      <a href="logout.php">Logout</a>
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
            File: <?= htmlspecialchars($file['file']) ?><br>
            <small>Uploaded: <?= htmlspecialchars($file['uploaded']) ?> | Status: <?= htmlspecialchars($file['status']) ?></small>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>
</html>
