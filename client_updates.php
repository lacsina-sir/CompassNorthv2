<?php
// DB connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "compass_north";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pending_updates WHERE is_done = 0 ORDER BY last_updated DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pending Updates | Titulo</title>
  <link rel="stylesheet" href="style.css" />
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

    .search-bar input {
      padding: 10px;
      width: 300px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 15px;
    }

    .card h3 {
      margin: 0 0 10px;
    }

    .card p {
      margin: 5px 0;
    }

    .card .actions {
      margin-top: 10px;
    }

    .card button {
      padding: 8px 12px;
      background-color: #1d3557;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 5px;
    }

    .card button:hover {
      background-color: #457b9d;
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
    <a href="pending_updates.php" style="background-color: #457b9d;">Pending Updates</a>
    <a href="settings.php">Settings</a>
    <a href="index.php">Logout</a>
  </div>

  <div class="main">
    <h1>Pending Updates</h1>

    <div class="search-bar">
      <input type="text" placeholder="Search pending updates...">
    </div>

    <?php if ($result && $result->num_rows > 0): ?>
      <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>Client Name</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['client_name']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
              <td><?= date('F j, Y', strtotime($row['last_updated'])) ?></td>
              <td>
                <form method="post" action="update_pending_status.php" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" name="edit">Edit</button>
                  <button type="submit" name="mark_done">Mark as Done</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No pending updates found.</p>
    <?php endif; ?>

  </div>

</body>
</html>

<?php $conn->close(); ?>
