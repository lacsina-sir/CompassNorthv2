<?php
// Database configuration
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "compass_north"; // Make sure this exists

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch client requests
$sql = "SELECT client_name, request_detail, request_date FROM client_requests ORDER BY request_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Requests | Titulo</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
    }
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 220px;
      height: 100vh;
      background-color: #1d3557;
      color: white;
      padding: 20px;
    }
    .sidebar h2 {
      margin-top: 0;
      font-size: 20px;
      text-align: center;
      border-bottom: 1px solid #fff;
      padding-bottom: 10px;
    }
    .sidebar a {
      display: block;
      color: white;
      padding: 10px 0;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #457b9d;
    }
    .main {
      margin-left: 240px;
      padding: 20px;
    }
    .card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    .card h3 {
      margin: 0 0 10px 0;
    }
    .card small {
      color: gray;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Titulo</h2>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="client_requests.php">Client Requests</a>
    <a href="survey_files.php">Survey Files</a>
    <a href="client_updates.php">Client Updates</a>
    <a href="pending_updates.php">Pending Updates</a>
    <a href="settings.php">Settings</a>
    <a href="#">Logout</a>
  </div>

  <div class="main">
    <h1>Client Requests</h1>

    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="card">
          <h3><?= htmlspecialchars($row['client_name']) ?></h3>
          <p>Request: <?= htmlspecialchars($row['request_detail']) ?></p>
          <small>Requested on: <?= htmlspecialchars($row['request_date']) ?></small>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No client requests found.</p>
    <?php endif; ?>

  </div>

</body>
</html>

<?php $conn->close(); ?>
