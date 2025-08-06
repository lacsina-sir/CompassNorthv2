<?php
// Database configuration
$host = "localhost";
$dbname = "compass_north";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Example: Fetch total requests (placeholder)
$totalRequests = 0;
$surveysCompleted = 0;
$pendingApprovals = 0;

try {
  $stmt = $pdo->query("SELECT COUNT(*) FROM client_requests");
  $totalRequests = $stmt->fetchColumn();

  $stmt = $pdo->query("SELECT COUNT(*) FROM survey_files WHERE status = 'Completed'");
  $surveysCompleted = $stmt->fetchColumn();

  $stmt = $pdo->query("SELECT COUNT(*) FROM client_updates WHERE status = 'Pending'");
  $pendingApprovals = $stmt->fetchColumn();
} catch (PDOException $e) {
  // Use defaults (0) if table not found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | Titulo</title>
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

    .main h1 {
      margin-bottom: 20px;
    }

    .search-bar {
      margin-bottom: 20px;
    }

    .search-bar form {
      display: flex;
      gap: 10px;
    }

    .search-bar input[type="text"] {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .search-bar button {
      padding: 10px 20px;
      background-color: #1d3557;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .search-bar button:hover {
      background-color: #457b9d;
    }

    .card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Titulo</h2>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="client_request.php">Client Requests</a>
    <a href="client_updates.php">Client Updates</a>
    <a href="survey_files.php">Survey Files</a>
    <a href="pending_updates.php">Pending Updates</a>
    <a href="settings.php">Settings</a>
    <a href="index.php">Logout</a>
  </div>

  <div class="main">
    <h1>Welcome, Admin</h1>

    <!-- Search Bar -->
    <div class="search-bar">
      <form action="search.php" method="GET">
        <input type="text" name="transaction_id" placeholder="Search by Transaction Number" required />
        <button type="submit">Search</button>
      </form>
    </div>

    <!-- Example Cards with PHP values -->
    <div class="card">
      <h3>Total Requests</h3>
      <p><?= $totalRequests ?> this month</p>
    </div>

    <div class="card">
      <h3>Surveys Completed</h3>
      <p><?= $surveysCompleted ?> approved</p>
    </div>

    <div class="card">
      <h3>Pending Client Approvals</h3>
      <p><?= $pendingApprovals ?> surveys need confirmation</p>
    </div>
  </div>

</body>
</html>
