<?php
// Sample DB connection (replace with your actual DB credentials)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "titulo";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch client updates
$sql = "SELECT title, status, last_updated FROM client_updates ORDER BY last_updated DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Dashboard | Titulo</title>
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

    .updates-section {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .update-card {
      background: white;
      border-left: 5px solid #1d3557;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .update-card h3 {
      margin: 0 0 5px;
      font-size: 18px;
    }

    .update-card p {
      margin: 0;
      font-size: 14px;
      color: #555;
    }
  </style>
</head>
<body>

  <div class="topnav">
    <div class="brand">Titulo Client Portal</div>
    <div class="nav-links">
      <a href="client_dashboard.php">Dashboard</a>
      <a href="client_files.html">Files</a>
      <a href="client_profile.html">Profile</a>
      <a href="client_chat.html">Chats</a>
      <a href="client-side_tracking.php">Updates</a>
      <a href="#">Logout</a>
    </div>
  </div>

  <div class="main">
    <div class="header">
      <h1>Welcome, Client!</h1>
      <div class="search-box">
        <input type="text" placeholder="Search your updates...">
      </div>
    </div>

    <div class="updates-section">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="update-card">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p>Status: <?= htmlspecialchars($row['status']) ?><br>
              <small>Last update: <?= htmlspecialchars($row['last_updated']) ?></small>
            </p>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No updates found.</p>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>

<?php $conn->close(); ?>
