<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect submitted data
  $adminName = $_POST['adminName'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // You can later save this to a database.
  // For now, just show a message.
  $message = "Changes saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Settings | Titulo</title>
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
    .card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      max-width: 600px;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px 20px;
      background-color: #1d3557;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #457b9d;
    }
    .success {
      background-color: #d4edda;
      color: #155724;
      padding: 10px;
      border: 1px solid #c3e6cb;
      border-radius: 5px;
      margin-bottom: 15px;
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
    <h1>Settings</h1>

    <div class="card">
      <?php if (!empty($message)): ?>
        <div class="success"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>

      <form method="POST" action="">
        <label for="adminName">Admin Name</label>
        <input type="text" id="adminName" name="adminName" placeholder="Enter your name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Change Password</label>
        <input type="password" id="password" name="password" placeholder="Enter new password" required>

        <button type="submit">Save Changes</button>
      </form>
    </div>
  </div>

</body>
</html>
